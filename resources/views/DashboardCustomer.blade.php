<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | GowFood</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        /* ===== CONTENT WRAPPER ===== */
        .content {
            padding-bottom: 80px;
        }

        /* ====== Bottom Navigation ===== */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: white;
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #ddd;
            padding: 8px 0;
        }

        .bottom-nav div {
            text-align: center;
            color: #777;
            font-size: 12px;
            cursor: pointer;
        }

        .bottom-nav .active {
            color: #ff6a00;
        }

        .bottom-nav i {
            font-size: 20px;
        }

        /* ====== Header Saya ====== */
        .header {
            background: linear-gradient(to bottom, #ff6a00, #ff8c42);
            padding: 30px 20px;
            color: white;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile i {
            font-size: 45px;
            margin-right: 15px;
        }

        /* ===== Menu Card ===== */
        .menu-card {
            background: white;
            border-radius: 12px;
            margin: 15px;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .menu-item {
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f0f0f0;
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .menu-label {
            display: flex;
            align-items: center;
        }

        .menu-label i {
            font-size: 20px;
            margin-right: 15px;
            color: #ff6a00;
        }

        /* ===== Dummy Content for Testing ===== */
        .section {
            display: none;
            padding: 20px;
        }

        .active-section {
            display: block;
        }
    </style>
</head>

<body>

    <!-- ===================== CONTENT AREA ===================== -->
    <div class="content">

        <!-- ===================== BERANDA ===================== -->
        <div id="beranda" class="section active-section">
            <h2 style="padding: 10px;">Beranda</h2>
            <p style="padding: 10px;">Ini adalah halaman beranda seperti ShopeeFood.</p>
        </div>

        <!-- ===================== PESANAN SAYA ===================== -->
        <div id="pesanan" class="section">
            <h2 style="padding: 10px;">Pesanan Saya</h2>
            <p style="padding: 10px;">Riwayat dan pesanan berlangsung muncul di sini.</p>
        </div>

        <!-- ===================== SAYA ===================== -->
        <div id="saya" class="section">

            <div class="header">
                <div class="profile">
                    <i class="fas fa-user-circle"></i>
                    <div>
                        <strong>cicinggumbe</strong><br>
                        <small>Profil Pengguna</small>
                    </div>
                </div>
            </div>

            <div class="menu-card">
                <div class="menu-item">
                    <div class="menu-label">
                        <i class="fas fa-heart"></i> Favorit
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>

                <div class="menu-item">
                    <div class="menu-label">
                        <i class="fas fa-credit-card"></i> Metode Pembayaran
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>

                <div class="menu-item">
                    <div class="menu-label">
                        <i class="fas fa-map-marker-alt"></i> Alamat
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>

            <div class="menu-card">


                <div class="menu-item">
                    <div class="menu-label">
                        <i class="fas fa-question-circle"></i> Pusat Bantuan
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>

        </div>

    </div>

    <!-- ===================== BOTTOM NAV ===================== -->
    <div class="bottom-nav">
        <div onclick="showSection('beranda')" id="nav-beranda" class="active">
            <i class="fas fa-home"></i><br> Beranda
        </div>

        <div onclick="showSection('pesanan')" id="nav-pesanan">
            <i class="fas fa-receipt"></i><br> Pesanan Saya
        </div>

        <div onclick="showSection('saya')" id="nav-saya">
            <i class="fas fa-user"></i><br> Saya
        </div>
    </div>

    <!-- ===================== JAVASCRIPT ===================== -->
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(sec => sec.classList.remove('active-section'));
            document.getElementById(sectionId).classList.add('active-section');

            document.querySelectorAll('.bottom-nav div').forEach(nav => nav.classList.remove('active'));
            document.getElementById('nav-' + sectionId).classList.add('active');
        }
    </script>

</body>

</html>