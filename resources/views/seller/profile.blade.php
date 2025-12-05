<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profil Seller | Warung Mie Ayam</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #fff4eb, #ffe3d1);
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
        }

        /* TOP NAV */
        .top-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .btn-back {
            text-decoration: none;
            color: #ff8c42;
            font-weight: 600;
            font-size: 15px;
            transition: 0.2s;
        }

        .btn-back:hover {
            color: #ff6f00;
        }

        /* CARD PROFIL */
        .profile-container {
            max-width: 900px;
            margin: 50px auto;
        }

        .profile-card {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 25px;
            padding: 50px 40px;
            box-shadow: 
                8px 8px 20px rgba(0, 0, 0, 0.12),
                -4px -4px 15px #ffffff;
            backdrop-filter: blur(15px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.18);
        }

        /* FOTO PROFIL */
        .profile-img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #ffb98a;
            box-shadow: 
                5px 5px 15px rgba(0, 0, 0, 0.15),
                -3px -3px 10px #fffaf5;
            transition: transform 0.3s ease;
        }

        .profile-img:hover {
            transform: scale(1.05);
        }

        h2 {
            margin: 10px 0 4px 0;
            font-weight: 700;
        }

        p {
            margin: 0;
            color: gray;
        }

        h3 {
            margin-top: 40px;
            color: #ff8c42;
            font-weight: 700;
            border-bottom: 2px solid #ffb98a;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* GRID INFORMASI */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .info-box {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            padding: 20px 18px;
            box-shadow: inset 2px 2px 6px rgba(0,0,0,0.08),
                        inset -2px -2px 6px #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.12);
        }

        .label {
            font-size: 13px;
            font-weight: 600;
            color: #ff8c42;
            margin-bottom: 6px;
        }

        .value-box {
            font-weight: 500;
            color: #444;
            display: flex;
            align-items: center;
        }

        .value-box i {
            margin-right: 8px;
            color: #ff8c42;
        }

        /* BUTTON EDIT */
        .btn-edit {
            background: #ff8c42;
            color: white;
            padding: 14px 30px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(255, 140, 66, 0.4);
        }

        .btn-edit:hover {
            background: #ffa766;
            box-shadow: 0 6px 14px rgba(255, 140, 66, 0.55);
        }

        .edit-container {
            text-align: right;
            margin-top: 35px;
        }

        @media (max-width: 480px) {
            .profile-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- TOP NAV -->
    <div class="top-nav">
        <h2>Profil Seller</h2>
        <a href="{{ route('DashboardSeller') }}" class="btn-back"><i class="fa fa-arrow-left"></i> Kembali ke dashboard</a>
    </div>

    <!-- CONTENT -->
    <div class="profile-container">
        <div class="profile-card">
            <!-- FOTO PROFIL -->
            <div style="text-align: center;">
                <img src="{{ $seller->foto_seller ? asset('sellers/'.$seller->foto_seller) : asset('default/default-profile.png') }}"
                     class="profile-img" alt="Foto Profil">

                <h2>{{ $seller->nama_seller }}</h2>
                <p>{{ $seller->email_seller }}</p>
            </div>

            <h3>Informasi Akun</h3>

            <div class="grid">
                <div class="info-box">
                    <div class="label">Nama Seller</div>
                    <div class="value-box"><i class="fa fa-user"></i> {{ $seller->nama_seller }}</div>
                </div>

                <div class="info-box">
                    <div class="label">Email</div>
                    <div class="value-box"><i class="fa fa-envelope"></i> {{ $seller->email_seller }}</div>
                </div>

                <div class="info-box">
                    <div class="label">Nomor HP</div>
                    <div class="value-box"><i class="fa fa-phone"></i> {{ $seller->telp_seller }}</div>
                </div>

                <div class="info-box">
                    <div class="label">Alamat</div>
                    <div class="value-box"><i class="fa fa-map-marker-alt"></i> {{ $seller->alamat_seller }}</div>
                </div>
            </div>

            <div class="edit-container">
                <a href="{{ route('seller.profile.edit') }}">
                    <button class="btn-edit"><i class="fa fa-edit"></i> Edit Profil</button>
                </a>
            </div>

        </div>
    </div>
</body>

</html>
