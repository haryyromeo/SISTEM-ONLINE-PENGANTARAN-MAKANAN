<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu | FoodMate</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fffaf5;
        }
        .card {
            border-radius: 20px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }
        .card img {
            border-radius: 20px 20px 0 0;
            height: 200px;
            object-fit: cover;
        }
        .btn-order {
            background-color: #ff5722;
            color: #fff;
            border: none;
            width: 100%;
            border-radius: 12px;
            font-weight: 600;
        }
        .btn-order:hover {
            background-color: #e64a19;
        }
        .form-control {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <img src="{{ asset('images/menu/' . $menu->gambar_menu) }}" class="img-fluid rounded mb-3" alt="{{ $menu->nama_menu }}">

        <div class="card-body text-center">
            <h4 class="mb-3">{{ $menu->nama_menu }}</h4>
            <p>Harga: <strong>Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}</strong></p>
            <p>Stok: {{ $menu->stok_menu ?? '-' }}</p>

            <!-- Form pesan menu -->
            <form action="{{ route('customer.pesanMenu', $menu->id_menu) }}" method="POST" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" value="1" min="1" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Pengiriman</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat" required>
                </div>
                <button type="submit" class="btn btn-order">Pesan Sekarang</button>
            </form>

            <a href="{{ route('customer.DashboardCustomer') }}" class="btn btn-secondary mt-3 w-100">Kembali ke Dashboard</a>
        </div>
    </div>
</div>

</body>
</html>
