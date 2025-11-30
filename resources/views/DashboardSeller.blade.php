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
            background-color: #fffaf5;
            margin: 0;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            height: 100vh;
            background-color: #ff8c42;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 30px 0;
        }

        .sidebar h4 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 20px;
            margin: 5px 15px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #ffb385;
        }

        /* TOPBAR */
        .topbar {
            margin-left: 230px;
            background-color: #fff;
            padding: 15px 30px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar .user {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .topbar img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* CONTENT */
        .content {
            margin-left: 230px;
            padding: 30px;
        }

        .menu-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* CARD MENU SELLER */
        .menu-card {
            background: #fff;
            border-radius: 18px;
            padding: 25px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .menu-card:hover {
            transform: scale(1.05);
            background-color: #fff1e3;
        }

        .menu-card img {
            width: 65px;
            margin-bottom: 15px;
        }

        footer {
            margin-left: 230px;
            text-align: center;
            padding: 15px;
            color: #888;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4>🍜 Seller Panel</h4>

        <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('sellerMenu') }}"><i class="fas fa-hamburger"></i> Daftar Menu</a>
        <a href="#"><i class="fas fa-clock"></i> Pesanan Baru</a>
        <a href="#"><i class="fas fa-check"></i> Pesanan Selesai</a>
        <a href="#"><i class="fas fa-user"></i> Profil</a>

        <!-- LOGOUT -->
        <a href="#" onclick="document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>

        <a href="{{ route('seller.profile') }}"
   class="bg-white shadow-md p-4 rounded-lg hover:bg-gray-100">
    <h3 class="text-lg font-bold">Profil</h3>
    <p class="text-gray-600 text-sm">Lihat & edit informasi akun</p>
</a>


        <form id="logout-form" action="{{ route('logoutSeller') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- TOPBAR -->
    <div class="topbar">
        <h5>Selamat Datang, <strong>{{ $seller->nama_seller }}</strong> 👋</h5>

        <div class="user">
            <span>Seller Aktif</span>
            <img src="{{ asset('images/default.jpg') }}" alt="Profil">
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="menu-title">📌 Menu Aksi Seller</div>

        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <<a href="{{ route('sellerMenu') }}" style="text-decoration:none; color:inherit;">
                    <div class="menu-card">
                         <img src="https://cdn-icons-png.flaticon.com/512/3480/3480758.png">
                        <h5>Daftar Menu</h5>
                    </div>
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
