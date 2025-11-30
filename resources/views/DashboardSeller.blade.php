<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Seller | Warung Mie Ayam</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #fff7ef;
            margin: 0;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background-color: #ff8c42;
            color: white;
            padding-top: 35px;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h4 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 12px;
            margin: 8px 18px;
            font-size: 15px;
            transition: 0.25s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #ffa86c;
        }

        /* ===== TOPBAR ===== */
        .topbar {
            margin-left: 240px;
            background-color: #ffffff;
            padding: 15px 35px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar .user {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            text-decoration: none;
            color: inherit;
        }

        .topbar img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ff8c42;
        }

        /* ===== ONLINE INDICATOR ===== */
        .online-wrapper {
            position: relative;
        }

        .online-indicator {
            position: absolute;
            width: 13px;
            height: 13px;
            background: #2ecc71;
            border-radius: 50%;
            border: 2px solid white;
            bottom: 2px;
            right: 2px;
            animation: pulse 1.3s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.9);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(0.9);
            }
        }

        /* ===== CONTENT ===== */
        .content {
            margin-left: 240px;
            padding: 35px;
        }

        .menu-card {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            background: #fff1e3;
        }

        .menu-card img {
            width: 65px;
            margin-bottom: 15px;
        }

        footer {
            margin-left: 240px;
            text-align: center;
            padding: 15px;
            color: #777;
            margin-top: 40px;
        }
    </style>

</head>

<body>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">
        <h4>🍜 Seller Panel</h4>

        <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>

        <a href="{{ route('sellerMenu') }}">
            <i class="fas fa-hamburger"></i> Daftar Menu
        </a>

        <a href="#"><i class="fas fa-clock"></i> Pesanan Baru</a>

        <a href="#"><i class="fas fa-check"></i> Pesanan Selesai</a>

        <a href="{{ route('seller.profile') }}"><i class="fas fa-user"></i> Profil</a>

        <a href="#" onclick="document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logoutSeller') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>

    <!-- ===== TOPBAR ===== -->
    <div class="topbar">
        <h5>Selamat Datang, <strong>{{ $seller->nama_seller }}</strong> 👋</h5>

        <a href="{{ route('seller.profile') }}" class="user">
            <span>Seller Aktif</span>

            <div class="online-wrapper">
                <img src="{{ $seller->foto_seller ? asset('sellers/'.$seller->foto_seller) : asset('default/default-profile.png') }}">
                <span class="online-indicator"></span>
            </div>
        </a>
    </div>

    <!-- ===== CONTENT ===== -->
    <div class="content">
        <h4 class="mb-4" style="font-weight:600;">📌 Menu Aksi Seller</h4>

        <div class="row g-4">

            <div class="col-md-3 col-sm-6">
                <a href="{{ route('sellerMenu') }}" style="text-decoration:none; color:inherit;">
                    <div class="menu-card">
                        <img src="https://cdn-icons-png.flaticon.com/512/3480/3480758.png">
                        <h5>Daftar Menu</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="menu-card">
                    <img src="https://cdn-icons-png.flaticon.com/512/860/860824.png">
                    <h5>Pesanan Baru</h5>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="menu-card">
                    <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png">
                    <h5>Pesanan Selesai</h5>
                </div>
            </div>

        </div>
    </div>

    <footer>
        © 2025 Warung Mie Ayam | Seller Dashboard
    </footer>

</body>

</html>
