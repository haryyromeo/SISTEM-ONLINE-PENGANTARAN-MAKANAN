<?php 
namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use App\Models\Seller; 
use App\Models\Menu;
use Illuminate\Support\Facades\Hash; 

class SellerController extends Controller 
{ 
    public function showRegisterSeller() {
        return view('RegisterSeller');
    }

    public function registerSeller(Request $request) {
        $request->validate([
            'nama_seller' => 'required|string|max:255',
            'alamat_seller' => 'required|string|max:255',
            'telp_seller' => 'required|string|max:15',
            'email_seller' => 'required|string|email|max:255|unique:sellers,email_seller',
            'password_seller' => 'required|string|min:8|confirmed',
        ]);

        Seller::create([
            'nama_seller' => $request->nama_seller,
            'alamat_seller' => $request->alamat_seller,
            'telp_seller' => $request->telp_seller,
            'email_seller' => $request->email_seller,
            'password_seller' => Hash::make($request->password_seller),
        ]);

        return redirect()->route('loginSeller')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function dashboard() {
        $sellerId = session('seller_id');
        if (!$sellerId) {
            return redirect()->route('loginSeller')->with('error', 'Silakan login terlebih dahulu.');
        }

        $seller = Seller::find($sellerId);
        if (!$seller) {
            session()->forget('seller_id');
            return redirect()->route('loginSeller')->with('error', 'Akun tidak ditemukan.');
        }

        return view('DashboardSeller', compact('seller'));
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/loginSeller')->with('success', 'Berhasil logout!');
    }

    public function menuList() {
        $seller = Seller::find(session('seller_id'));
        $menus = Menu::where('id_seller', $seller->id_seller)->get();
        return view('menulist', compact('seller', 'menus'));
    }

    public function addMenu() {
        $seller = Seller::find(session('seller_id'));
        return view('addmenu', compact('seller'));
    }

    public function storeMenu(Request $request) {
        $seller = Seller::find(session('seller_id'));

        $request->validate([
            'nama_menu' => 'required',
            'harga'     => 'required|numeric',
            'stok'      => 'required|numeric',
            'gambar_menu' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $gambarNama = null;
        if ($request->hasFile('gambar_menu')) {
            $gambar = $request->file('gambar_menu');
            $gambarNama = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images/menu'), $gambarNama);
        }

        Menu::create([
            'id_customer' => null,
            'id_seller'   => $seller->id_seller,
            'nama_menu'   => $request->nama_menu,
            'harga_menu'  => $request->harga,
            'stok_menu'   => $request->stok,
            'gambar_menu' => $gambarNama,
        ]);

        return redirect()->route('sellerMenu')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function editMenu($id) {
        $menu = Menu::findOrFail($id);
        return view('editmenu', compact('menu'));
    }

    public function updateMenu(Request $request, $id) {
        $menu = Menu::findOrFail($id);

        $menu->nama_menu = $request->nama_menu;
        $menu->harga_menu = $request->harga;
        $menu->stok_menu = $request->stok;

        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/menu'), $filename);

            $menu->gambar_menu = $filename;
        }

        $menu->save();

        return redirect()->route('sellerMenu')->with('success', 'Menu berhasil diperbarui!');
    }

    public function deleteMenu($id) {
        $menu = Menu::findOrFail($id);

        if ($menu->gambar_menu && file_exists(public_path('images/menu/'.$menu->gambar_menu))) {
            unlink(public_path('images/menu/'.$menu->gambar_menu));
        }

        $menu->delete();

        return back()->with('success', 'Menu berhasil dihapus!');
    }
}
