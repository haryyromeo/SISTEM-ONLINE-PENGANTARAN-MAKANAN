<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Delivery;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


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
        $driver = Driver::findOrFail($driverId);
        $delivery = Delivery::findOrFail($deliveryId);

        $delivery->id_driver = $driverId;

        $delivery->save();

        return back()->with('success', 'Driver ditugaskan untuk pengiriman.');
    }

    public function showLoginForm()
    {
        return view('driver.login');
    }

    public function logout()
    {
        // Hapus session driver
        Session::forget('driver');

        // Redirect ke halaman login
        return redirect('/loginDriver')->with('success', 'Berhasil logout');
    }


    public function showRegisterDriver()
    {
        return view('registerDriver'); // arahkan ke halaman form register
    }

    public function registerDriver(Request $request)
    {
        $request->validate([
            'nama_driver' => 'required|string|max:255',
            'email_driver' => 'required|email|unique:drivers,email_driver',
            'password_driver' => 'required|min:6',
            'telp_driver' => 'required|string|max:20',
        ]);

        $driver = new Driver();
        $driver->nama_driver = $request->nama_driver;
        $driver->email_driver = $request->email_driver;
        $driver->password_driver = Hash::make($request->password_driver);
        $driver->telp_driver = $request->telp_driver;
        $driver->status_driver = 'Aktif';
        $driver->save();

        return redirect()->route('loginDriver')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}