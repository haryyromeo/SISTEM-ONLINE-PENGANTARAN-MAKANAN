<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Anda | FoodMate</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fffaf5;
        }
        .card-order {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border: none;
        }
        .card-order img {
            border-radius: 15px 15px 0 0;
            height: 150px;
            object-fit: cover;
        }
        .btn-checkout {
            background-color: #28a745;
            color: #fff;
            border-radius: 12px;
            font-weight: 600;
        }
        .btn-checkout:hover {
            background-color: #218838;
        }
    </style>
</head>
<body class="p-4">

<div class="container mt-4">
    <h3 class="mb-4">🛒 Pesanan Anda</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($orders) > 0)
        @foreach($orders as $order)
        <div class="card card-order">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('images/menu/' . ($order->menu->gambar_menu ?? 'default.jpg')) }}" class="img-fluid" alt="{{ $order->menu->nama_menu ?? 'Menu' }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $order->menu->nama_menu ?? '-' }}</h5>
                        <p class="card-text mb-1">Harga: Rp {{ number_format($order->total_harga / $order->jumlah,0,',','.') }}</p>
                        <p class="card-text mb-1">Jumlah: {{ $order->jumlah }}</p>
                        <p class="card-text mb-1">Subtotal: Rp {{ number_format($order->total_harga,0,',','.') }}</p>
                        <p class="card-text mb-1">Alamat: {{ $order->alamat }}</p>
                        <p class="card-text mb-1">Biaya Pengiriman: Rp {{ number_format($order->biaya_pengiriman,0,',','.') }}</p>
                        <p class="card-text mb-1">Biaya Layanan: Rp {{ number_format($order->biaya_layanan,0,',','.') }}</p>
                        <p class="card-text fw-bold">Total Keseluruhan: Rp {{ number_format($order->total_keseluruhan,0,',','.') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="card p-3 mb-3">
            <h5 class="mb-3">💳 Metode Pembayaran</h5>
            <form action="{{ route('customer.checkout') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Pilih Metode Pembayaran:</label>
                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer Bank</option>
                        <option value="ewallet">e-Wallet</option>
                    </select>
                </div>

                <input type="hidden" name="total" value="{{ $grandTotal }}">
                <button type="submit" class="btn btn-checkout w-100">Bayar Sekarang</button>
            </form>
        </div>

        <h5 class="text-end mb-4">Grand Total: <span class="fw-bold">Rp {{ number_format($grandTotal,0,',','.') }}</span></h5>
    @else
        <p class="text-center">Belum ada pesanan.</p>
    @endif

    <a href="{{ route('customer.DashboardCustomer') }}" class="btn btn-secondary w-100">Kembali</a>
</div>

</body>
</html>
