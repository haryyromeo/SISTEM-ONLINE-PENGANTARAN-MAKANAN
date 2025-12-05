<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Pesanan Saya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h3>📦 Riwayat / Pesanan Saya</h3>

  @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

  <div class="list-group">
    @forelse($orders as $order)
      <div class="list-group-item">
        <div class="d-flex justify-content-between">
          <div>
            <strong>{{ $order->menu->nama_menu ?? 'Menu dihapus' }}</strong>
            <div>Jumlah: {{ $order->jumlah }}</div>
            <div>Total: Rp {{ number_format($order->total_harga,0,',','.') }}</div>
            <div>Tanggal: {{ $order->tanggal_order }}</div>
            <div>Status: <span class="badge bg-secondary">{{ $order->status_order }}</span></div>
          </div>
          <div class="text-end">
            <!-- Tambahkan tombol cancel / detail bila dibutuhkan -->
          </div>
        </div>
      </div>
    @empty
      <div class="alert alert-info">Belum ada pesanan.</div>
    @endforelse
  </div>
</div>
</body>
</html>
