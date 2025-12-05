<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | FoodMate</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fffaf5; margin: 0; }
        .sidebar { position: fixed; top: 0; left: 0; width: 230px; height: 100vh; background-color: #ff8c42; color: #fff; display: flex; flex-direction: column; padding: 30px 0; }
        .sidebar a { color: white; padding: 12px 25px; text-decoration: none; display: flex; gap: 10px; border-radius: 20px; margin: 5px 15px; transition: .3s; }
        .sidebar a.active, .sidebar a:hover { background-color: #ffb385; }
        .topbar { margin-left: 230px; background-color: #fff; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 6px rgba(0,0,0,.1); }
        .content { margin-left: 230px; padding: 30px; }
        .card { border-radius: 20px; border: none; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .card img { border-radius: 20px 20px 0 0; height: 200px; object-fit: cover; }
        .btn-order { background-color: #ff5722; color: #fff; border: none; width: 100%; font-weight: 600; border-radius: 10px; }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4 class="text-center">FoodMate</h4>
        <a href="#" class="active">🏠 Beranda</a>
        <a href="{{ route('customer.listOrder') }}">📦 Pesanan</a>
        <a href="#">💳 Pembayaran</a>
        <a href="#">⚙ Pengaturan</a>
        <a href="{{ url('/logout') }}">🚪 Keluar</a>
    </div>

    <!-- TOPBAR -->
    <div class="topbar">
        <h5>Selamat Datang, {{ session('customer.nama_customer') }}!</h5>
        <div class="user d-flex align-items-center gap-2">
            <img src="{{ asset('images/jisoo.jpg') }}" width="40" height="40" style="border-radius:50%">
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="d-flex justify-content-between mb-4">
            <h4>🍽 Semua Menu</h4>
        </div>

        <div class="row">
            @forelse ($menus as $menu)
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/menu/' . $menu->gambar_menu) }}"
                             alt="{{ $menu->nama_menu }}"
                             class="card-img-top"
                             height="160"
                             style="object-fit: cover;">

                        <div class="card-body text-center">
                            <h5>{{ $menu->nama_menu }}</h5>
                            <p class="text-danger fw-bold">
                                Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}
                            </p>
                            <a href="{{ route('customer.detailMenu', $menu->id_menu) }}"
                               class="btn btn-warning w-100">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Menu belum tersedia.</p>
            @endforelse
        </div>
    </div>

</body>
</html>
