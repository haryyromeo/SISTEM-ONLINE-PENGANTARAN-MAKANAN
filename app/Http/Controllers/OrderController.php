<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'id_menu' => 'required|integer|exists:Menu,id_menu',
            'total_orderan' => 'required|integer|min:1',
        ]);
        
        $menu = Menu::find($request->id_menu);
        $customer = Auth::guard('customer')->user();

        // 1. Buat 'Order' (tabel master)
        $order = Order::create([
            'id_menu' => $menu->id_menu, // Sesuai ERD, order terikat 1 menu
            'id_customer' => $customer->id_customer,
            'tanggal_order' => now(),
            'status_order' => 'Pending',
        ]);

        // 2. Buat 'DetailOrder' (tabel detail)
        $detailOrder = DetailOrder::create([
            'id_menu' => $menu->id_menu,
            'id_order' => $order->id_order,
            'total_orderan' => $request->total_orderan,
        ]);

        // 3. Arahkan ke pembayaran
        return redirect()->route('payment.show', ['detailOrderId' => $detailOrder->id_detailorder]);
    }
    
    // ... fungsi cancelOrder dan trackOrder ...
}