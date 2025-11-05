<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Delivery;

class DriverController extends Controller
{

    public function getDriverDetails($driverId)
    {
        // 1. Ambil detail driver
        $driver = Driver::findOrFail($driverId);
        // 2. Kembalikan objek driver
        return view('driver.detail', ['driver' => $driver]); // (Contoh)
    }

    public function updateDriverStatus(Request $request, $driverId)
    {
        // 1. Temukan driver
        $driver = Driver::findOrFail($driverId);
        
        // 2. Perbarui status driver
        $driver->status_driver = $request->input('status'); // Misal: 'Aktif', 'Cuti'
        
        // 3. Simpan ke database
        $driver->save();

        return back()->with('success', 'Status driver diperbarui.');
    }

    public function assignDeliveryToDriver($driverId, $deliveryId)
    {
        // 1. Temukan driver dan pengiriman
        $driver = Driver::findOrFail($driverId);
        $delivery = Delivery::findOrFail($deliveryId);
        
        // 2. Tetapkan pengiriman ke driver
        $delivery->id_driver = $driverId;
        
        // 3. Simpan perubahan
        $delivery->save();

        // (Catatan: Algoritma ini duplikat dengan 'assignDriverToDelivery'
        // di DeliveryPanel[cite: 1769]. Hati-hati dalam implementasi rute.)
        
        return back()->with('success', 'Driver ditugaskan untuk pengiriman.');
    }
}