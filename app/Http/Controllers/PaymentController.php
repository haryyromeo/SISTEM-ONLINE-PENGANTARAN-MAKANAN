<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\DetailOrder;
use App\Models\Order;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $validatedData = $request->validate([
            'id_detailorder' => 'required|integer|exists:Detail order,id_detailorder',
            'metode_pemb' => 'required|string',
            'total_harga' => 'required|numeric',
            'ongkos_kirim' => 'required|numeric',
            'diskon' => 'nullable|numeric',
        ]);

        // 1. Simpan Payment
        $payment = Payment::create($validatedData);

        // 2. Update status Order utama
        $detailOrder = DetailOrder::find($validatedData['id_detailorder']);
        $order = $detailOrder->order; // Ambil order masternya
        $order->status_order = 'Processed';
        $order->save();

        return redirect()->route('order.track', ['orderId' => $order->id_order])
                         ->with('success', 'Pembayaran berhasil.');
    }
    
    // ... fungsi lainnya ...
}