<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | PesanMakan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fffaf5;
            margin: 0;
        }

        /* === SIDEBAR === */
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
            color: #fff;
        }

        /* === TOPBAR === */
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
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* === CONTENT === */
        .content {
            margin-left: 230px;
            padding: 30px;
        }

        .search-bar input {
            border-radius: 25px;
            padding: 10px 20px;
            border: 1px solid #ddd;
            width: 100%;
            max-width: 400px;
        }

        /* === CARD === */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.04);
        }

        .card img {
            border-radius: 20px 20px 0 0;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            text-align: center;
        }

        .price {
            font-weight: 600;
            color: #ff5722;
        }

        .btn-order {
            background-color: #ff5722;
            color: #fff;
            border-radius: 12px;
            width: 100%;
            font-weight: 600;
            padding: 8px 0;
            transition: 0.3s;
            border: none;
        }

        .btn-order:hover {
            background-color: #e64a19;
        }

        footer {
            margin-left: 230px;
            text-align: center;
            padding: 15px;
            color: #888;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>🍽 GowFood</h4>
        <a href="#" class="active"><i class="fas fa-home"></i> Home</a>
        <a href="#"><i class="fas fa-wallet"></i> Payout</a>
        <a href="#"><i class="fas fa-cog"></i> Settings</a>
        <a href="#"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        <a href="#"><i class="fas fa-question-circle"></i></a>
        <a href="#"><i class="fas fa-question-circle"></i></a>
        <a href="#"><i class="fas fa-question-circle"></i> Help</a>
    </div>

    <!-- Topbar -->
    <div class="topbar">
        <div>
            <h5>Selamat Datang!</h5>
        </div>
        <div class="user">
            <span>💰 Rp 32.000 | VIP Member</span>
            <img src="{{ asset('images/jisoo.jpg') }}" alt="Jisoo">
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>🍔 Rekomendasi Hari Ini</h4>
            <form class="search-bar">
                <input type="text" placeholder="Cari makanan favoritmu...">
            </form>
        </div>

        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src="{{ asset('images/burger.jpg') }}" alt="Burger">
                    <div class="card-body">
                        <h6>Burger Juicy</h6>
                        <p class="price">Rp 25.000</p>
                        <button class="btn-order">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src="{{ asset('images/nasigoreng.jpg') }}" alt="Nasi Goreng">
                    <div class="card-body">
                        <h6>Nasi Goreng Spesial</h6>
                        <p class="price">Rp 20.000</p>
                        <button class="btn-order">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src="{{ asset('images/pizza.jpg') }}" alt="Pizza">
                    <div class="card-body">
                        <h6>Pizza Mozarella</h6>
                        <p class="price">Rp 35.000</p>
                        <button class="btn-order">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src="{{ asset('images/roti.jpg') }}" alt="Roti">
                    <div class="card-body">
                        <h6>Pizza Mozarella</h6>
                        <p class="price">Rp 35.000</p>
                        <button class="btn-order">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src="{{ asset('images/klepon.jpg') }}" alt="Klepon">
                    <div class="card-body">
                        <h6>Pizza Mozarella</h6>
                        <p class="price">Rp 35.000</p>
                        <button class="btn-order">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src="{{ asset('images/kopi.jpg') }}" alt="Kopi">
                    <div class="card-body">
                        <h6>Kopi Susu Gula Aren</h6>
                        <p class="price">Rp 18.000</p>
                        <button class="btn-order">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        © 2025 PesanMakan | All Rights Reserved
    </footer>
</body>

</html>