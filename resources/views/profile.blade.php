<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profil Seller | Warung Mie Ayam</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #fff4eb, #ffe3d1);
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
        }

        /* TOP NAV */
        .top-nav {
            background: #ffffffaa;
            backdrop-filter: blur(10px);
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .btn-back {
            text-decoration: none;
            color: #ff8c42;
            font-weight: 600;
            font-size: 15px;
            transition: .2s;
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
            background: rgba(255, 255, 255, 0.9);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 
                8px 8px 20px rgba(0, 0, 0, 0.12),
                -4px -4px 15px #ffffff;
            backdrop-filter: blur(12px);
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* FOTO PROFIL */
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #ffb98a;
            box-shadow: 
                5px 5px 15px rgba(0, 0, 0, 0.15),
                -3px -3px 10px #fffaf5;
        }

        /* LABEL */
        .label {
            font-size: 14px;
            font-weight: 600;
            color: #ff8c42;
            margin-bottom: 4px;
        }

        .value-box {
            background: #ffffff;
            padding: 14px 18px;
            border-radius: 14px;
            box-shadow: inset 2px 2px 6px rgba(0,0,0,0.1),
                        inset -2px -2px 6px #fff;
            font-weight: 500;
            color: #444;
        }

        /* BUTTON EDIT */
        .btn-edit {
            background: #ff8c42;
            color: white;
            padding: 14px 28px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: .3s;
            box-shadow: 0 4px 10px rgba(255, 140, 66, 0.4);
        }

        .btn-edit:hover {
            background: #ffa766;
            box-shadow: 0 6px 14px rgba(255, 140, 66, 0.55);
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        h2 {
            margin: 0;
        }
    </style>

</head>

<body>

    <!-- TOP NAV -->
    <div class="top-nav">
        <h2 class="fw-bold">Profil Seller</h2>
        <a href="{{ route('DashboardSeller') }}" class="btn-back">← Kembali ke Dashboard</a>
    </div>

    <!-- CONTENT -->
    <div class="profile-container">
        <div class="profile-card">

            <!-- FOTO PROFIL -->
            <div style="text-align: center;">
                <img src="{{ $seller->foto_seller ? asset('sellers/'.$seller->foto_seller) : asset('default/default-profile.png') }}"
                     class="profile-img" alt="Foto Profil">

                <h2 style="margin-top: 18px; font-weight: 700;">{{ $seller->nama_seller }}</h2>
                <p style="color: gray; margin-top: -5px;">{{ $seller->email_seller }}</p>
            </div>

            <h3 style="margin-top: 35px; color:#ff8c42; font-weight:700;">Informasi Akun</h3>

            <div class="grid">
                <div>
                    <div class="label">Nama Seller</div>
                    <div class="value-box">{{ $seller->nama_seller }}</div>
                </div>

                <div>
                    <div class="label">Email</div>
                    <div class="value-box">{{ $seller->email_seller }}</div>
                </div>

                <div>
                    <div class="label">Nomor HP</div>
                    <div class="value-box">{{ $seller->telp_seller }}</div>
                </div>

                <div>
                    <div class="label">Alamat</div>
                    <div class="value-box">{{ $seller->alamat_seller }}</div>
                </div>
            </div>

            <div style="text-align: right; margin-top: 35px;">
                <a href="{{ route('seller.profile.edit') }}">
                    <button class="btn-edit">Edit Profil</button>
                </a>
            </div>

        </div>
    </div>

</body>

</html>
