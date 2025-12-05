<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h3 class="mb-4">🍽 Pilih Menu Untuk Dipesan</h3>

    <div class="row">
        @foreach ($menus as $menu)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/menu/' . $menu->gambar_menu) }}" class="card-img-top" height="160" style="object-fit: cover;">
                    <div class="card-body text-center">
                        <h5>{{ $menu->nama_menu }}</h5>
                        <p class="text-danger fw-bold">Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}</p>
                        <a href="#" class="btn btn-warning w-100">Pesan</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
