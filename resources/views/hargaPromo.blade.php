<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Harga & Promo | Seller</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to bottom right, #f7f9ff, #eef2ff);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 92%;
            margin: 40px auto;
        }

        .header-box {
            background: white;
            padding: 25px 30px;
            border-radius: 14px;
            box-shadow: 0px 4px 16px rgba(0,0,0,0.12);
            border-left: 6px solid #4caf50;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-box h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .btn-back {
            background: #6c757d;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            gap: 5px;
            align-items: center;
        }

        .btn-back:hover {
            background: #5a6268;
        }

        .promo-box {
            margin-top: 25px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0px 4px 14px rgba(0,0,0,0.1);
            border-top: 5px solid #ff8c42;
        }

        .card h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .price {
            margin-top: 10px;
            font-size: 25px;
            font-weight: 700;
            color: #28a745;
        }

        .old-price {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
        }

        .promo-tag {
            background: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 13px;
            display: inline-block;
            margin-top: 8px;
        }

        .desc {
            margin-top: 12px;
            font-size: 15px;
            color: #555;
        }

        .btn-edit {
            margin-top: 15px;
            display: inline-block;
            padding: 8px 15px;
            background: #f0ad4e;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-edit:hover {
            background: #d9953c;
        }

    </style>
</head>

<body>

<div class="container">

    <!-- Header -->
    <div class="header-box">
        <h2>💸 Harga & Promo Menu – {{ $seller->nama_seller }}</h2>

        <a href="{{ route('DashboardSeller') }}" class="btn-back">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Card Promo -->
    <div class="promo-box">

        @foreach($menus as $menu)
        <div class="card">

            <h3>{{ $menu->nama_menu }}</h3>

            <div class="price">
                Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}
            </div>

            @if($menu->harga_promo)
            <div class="old-price">
                Harga Normal: Rp {{ number_format($menu->harga_normal, 0, ',', '.') }}
            </div>

            <div class="promo-tag">
                🌟 Promo: Rp {{ number_format($menu->harga_promo, 0, ',', '.') }}
            </div>
            @endif

            <p class="desc">
                {{ $menu->deskripsi ?? 'Tidak ada deskripsi.' }}
            </p>

            <a href="{{ route('seller.editPromo', $menu->id_menu) }}" class="btn-edit">
                <i class="fa fa-edit"></i> Kelola Promo
            </a>

        </div>
        @endforeach

    </div>

</div>

</body>
</html>
