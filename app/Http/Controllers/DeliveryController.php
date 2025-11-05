<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;

class DeliveryController extends Controller
{

    public function updateDeliveryStatus(Request $request, $deliveryId)
    {
        // 1. Temukan pengiriman
        $delivery = Delivery::findOrFail($deliveryId);
        
        // 2. Perbarui status pengiriman
        $delivery->status_delivery = $request->input('status'); // 'On the way' atau 'Delivered' [cite: 1385]
        $delivery->waktu_delivery = now();
        $delivery->save();

        // Jika sudah 'Delivered', update juga order utama
        if ($request->input('status') == 'Delivered') {
            $order = $delivery->order;
            $order->status_order = 'Completed'; // [cite: 1361]
            $order->save();
        }

        return back()->with('success', 'Status pengiriman diperbarui.');
    }

    public function assignDriverToDelivery($deliveryId, $driverId)
    {
        // 1. Temukan data pengiriman dan driver
        $delivery = Delivery::findOrFail($deliveryId);
        // (Driver::findOrFail($driverId) // bisa ditambahkan validasi)

        // 2. Tetapkan driver ke pengiriman
        $delivery->id_driver = $driverId;
        
        // 3. Simpan ke database
        $delivery->save();

        return back()->with('success', 'Driver berhasil ditugaskan.');
    }

    public function confirmDelivery($deliveryId)
    {
        // 1. Periksa apakah pengiriman telah selesai
        $delivery = Delivery::findOrFail($deliveryId);

        if ($delivery->status_delivery == 'Delivered') {
            // 2. Tandai pengiriman sebagai berhasil
            // (Logika ini sudah ada di updateDeliveryStatus, 
            // jadi mungkin ini untuk konfirmasi dari sisi Pelanggan)
            $order = $delivery->order;
            $order->status_order = 'Completed';
            $order->save();
            return back()->with('success', 'Pengiriman dikonfirmasi.');
        }

        return back()->with('error', 'Pengiriman belum selesai.');
    }
}