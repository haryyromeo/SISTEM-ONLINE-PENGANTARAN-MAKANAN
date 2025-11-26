<?php 
namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use App\Models\Seller; 
use Illuminate\Support\Facades\Hash; 

class SellerController extends Controller 
{ 
    // Tampilkan form registrasi seller 
public function showRegisterSeller() 
{ 
    return view('RegisterSeller'); 
} 
// Proses registrasi seller 
public function registerSeller(Request $request) { 
    // Validasi input 
    $request->validate([ 'nama_seller' => 'required|string|max:255', 
                        'alamat_seller' => 'required|string|max:255', 
                        'telp_seller' => 'required|string|max:15', 
                        'email_seller' => 'required|string|email|max:255|unique:sellers,email_seller', 
                        'password_seller' => 'required|string|min:8|confirmed', ]); 
                        
// Simpan data seller 
Seller::create([ 'nama_seller' => $request->nama_seller, 
                'alamat_seller' => $request->alamat_seller, 
                'telp_seller' => $request->telp_seller, 
                'email_seller' => $request->email_seller, 
                'password_seller' => Hash::make($request->password_seller), // PASSWORD SESUAI FIELD 
                ]); 
return redirect()->route('loginSeller')->with('success', 'Registrasi berhasil! Silakan login.'); 
} 
// Halaman dashboard seller 
public function dashboard() { 
// Cek session login seller 
$sellerId = session('seller_id'); 

if (!$sellerId) { 
    return redirect()->route('loginSeller')->with('error', 'Silakan login terlebih dahulu.'); 
} 
$seller = Seller::find($sellerId);
 if (!$seller) { session()->forget('seller_id'); 
    return redirect()->route('loginSeller')->with('error', 'Akun tidak ditemukan.'); 
} 
return view('DashboardSeller', compact('seller')); } 
public function logout(Request $request)
{
    $request->session()->forget('seller_id');
    $request->session()->flush();

    return redirect('/loginSeller')->with('success', 'Berhasil logout!');
}
}
