<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // Dashboard customer (bisa redirect / view beranda customer)

public function dashboard()
{
    $customerId = session('id_customer');

    if (!$customerId) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu!');
    }

    // Ambil semua menu
    $menus = Menu::all();

    // Ambil pesanan customer (pending)
    $orders = Order::with('menu')
        ->where('id_customer', $customerId)
        ->where('status_order', 'pending')
        ->get();

    $grandTotal = 0;
    foreach ($orders as $order) {
        $order->biaya_layanan = 500;
        $order->biaya_pengiriman = $order->biaya_pengiriman ?? 10000;
        $order->total_keseluruhan = $order->total_harga + $order->biaya_pengiriman + $order->biaya_layanan;

        $grandTotal += $order->total_keseluruhan;
    }

    return view('customer.DashboardCustomer', compact('menus', 'orders', 'grandTotal'));
}



    // Halaman daftar menu (customer.pesanan)
    public function pilihMenu()
    {
        $menus = Menu::orderBy('created_at','desc')->get();
        return view('customer.pilih_menu', compact('menus'));
    }

    // Detail menu sebelum pesan (form)
    public function detailMenu($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        return view('customer.detail_menu', compact('menu'));
    }

    // Proses pesan menu (simpan order)
  public function pesanMenu(Request $request, $id_menu)
{
    $customerId = session('id_customer') ?? auth()->guard('customer')->id();

    $request->validate([
        'jumlah'  => 'required|integer|min:1',
        'alamat'  => 'required|string|max:255' // tambahan alamat
    ]);

    $menu = Menu::findOrFail($id_menu);

    // simpan order
    $order = Order::create([
        'id_customer'   => $customerId,
        'id_menu'       => $menu->id_menu,
        'jumlah'        => $request->jumlah,
        'alamat'        => $request->alamat,
        'total_harga'   => ($menu->harga_menu * $request->jumlah),
        'biaya_pengiriman' => 10000, // contoh
        'biaya_layanan'    => 500,
        'total_keseluruhan' => ($menu->harga_menu * $request->jumlah) + 10000 + 500,
        'tanggal_order' => Carbon::now()->toDateString(),
        'status_order'  => 'pending'
    ]);

    // update stok menu
    if ($menu->stok_menu !== null) {
        $menu->stok_menu = max(0, $menu->stok_menu - $request->jumlah);
        $menu->save();
    }

    // Redirect ke halaman detail pesanan baru
    return redirect()->route('customer.detailOrder', $order->id_order)
                     ->with('success', 'Pesanan berhasil dibuat!');
}

    // List pesanan milik customer
    public function listOrder()
{
    $customerId = session('id_customer') ?? auth()->guard('customer')->id();
    if (!$customerId) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $orders = Order::with('menu', 'seller')
        ->where('id_customer', $customerId)
        ->orderBy('tanggal_order', 'desc')
        ->get();

    $grandTotal = 0;
    foreach ($orders as $order) {
        $grandTotal += $order->total_keseluruhan;
    }

    return view('customer.list_order', compact('orders', 'grandTotal'));
}
public function checkout(Request $request)
{
    $customerId = session('customer_id');

    if (!$customerId) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $request->validate([
        'metode_pembayaran' => 'required|string',
        'total' => 'required|numeric'
    ]);

    // Simpan informasi pembayaran (misal di tabel Payment)
    // Contoh sederhana:
    // Payment::create([...]);

    // Update status semua order customer menjadi 'paid'
    Order::where('customer_id', $customerId)
        ->where('status_order', 'pending')
        ->update(['status_order' => 'paid']);

    return redirect()->route('customer.listOrder')
        ->with('success', 'Pembayaran berhasil! Terima kasih telah memesan.');
}
public function detailOrder($id_order)
{
    $order = Order::with('menu', 'seller')->findOrFail($id_order);

    return view('customer.detail_order', compact('order'));
}
}
