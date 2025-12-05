<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $customerId = session('customer_id');

        if (!$customerId) {
            return redirect('/loginCustomer')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil semua menu dari seller mana pun (untuk dipesan)
        $menus = Menu::all();

        return view('customer.pilih_menu', compact('menus'));
    }
}
