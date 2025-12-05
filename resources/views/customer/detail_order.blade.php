<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan | FoodMate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">

<div class="container">
    <h3 class="mb-4">🛒 Detail Pesanan Anda</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Menu</th>
            <td>{{ $order->menu->nama_menu ?? '-' }}</td>

        </tr>
        <tr>
    <th>Seller</th>
    <td>{{ $order->seller->nama_seller ?? '-' }}</td>
</tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $order->jumlah }}</td>
        </tr>
        <tr>
            <th>Alamat Pengiriman</th>
            <td>{{ $order->alamat }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>Rp {{ number_format($order->total_harga,0,',','.') }}</td>
        </tr>
        <tr>
            <th>Biaya Pengiriman</th>
            <td>Rp {{ number_format($order->biaya_pengiriman,0,',','.') }}</td>
        </tr>
        <tr>
            <th>Biaya Layanan</th>
            <td>Rp {{ number_format($order->biaya_layanan,0,',','.') }}</td>
        </tr>
        <tr>
            <th>Total Keseluruhan</th>
            <td>Rp {{ number_format($order->total_keseluruhan,0,',','.') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($order->status_order) }}</td>
        </tr>
    </table>

    <a href="{{ route('customer.dashboardCustomer') }}" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>

</body>
</html>
