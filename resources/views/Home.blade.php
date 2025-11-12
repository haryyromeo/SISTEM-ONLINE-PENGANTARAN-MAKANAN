<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Makanku</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #ffeb99, #ffd54f);
            color: #4b3b00;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Background dekorasi lembut */
        .bg-decor {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            z-index: 0;
        }

        .bg1 {
            top: 15%;
            left: 10%;
            background: #fff176;
        }

        .bg2 {
            bottom: 15%;
            right: 10%;
            background: #ffb300;
        }

        .bg3 {
            top: 60%;
            left: 40%;
            background: #ffca28;
        }

        .content {
            text-align: center;
            z-index: 1;
            animation: fadeIn 1s ease;
        }

        h1 {
            font-size: 2.6rem;
            margin-bottom: 10px;
            font-weight: 600;
            letter-spacing: 1px;
            color: #6d4c00;
        }

        p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 40px;
        }

        .role-container {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
        }

        .role-card {
            background: rgba(255, 255, 255, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.4);
            border-radius: 20px;
            padding: 30px 40px;
            width: 200px;
            backdrop-filter: blur(10px);
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .role-card::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.25) 0%, transparent 70%);
            transform: scale(0);
            transition: all 0.4s ease;
            z-index: 0;
        }

        .role-card:hover::before {
            transform: scale(1);
        }

        .role-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.4);
        }

        .role-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #6d4c00;
            z-index: 1;
            position: relative;
        }

        .role-card img {
            width: 60px;
            margin-bottom: 10px;
            transition: transform 0.4s;
            z-index: 1;
            position: relative;
        }

        .role-card:hover img {
            transform: scale(1.15);
        }

        footer {
            margin-top: 60px;
            font-size: 14px;
            opacity: 0.8;
            z-index: 1;
            color: #5c4500;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }

            .role-card {
                width: 160px;
                padding: 25px;
            }

            .role-card img {
                width: 50px;
            }
        }
    </style>
</head>

<body>
    <div class="bg-decor bg1"></div>
    <div class="bg-decor bg2"></div>
    <div class="bg-decor bg3"></div>

    <div class="content">
        <h1>🍳 Selamat Datang di <span style="color:#ff9800;">Makanku</span></h1>
        <p>Pilih peran Anda untuk masuk ke sistem pemesanan makanan</p>

        <div class="role-container">
            <div class="role-card" onclick="window.location.href='{{ route('login') }}'">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" alt="Customer" />
                <h3>Customer</h3>
            </div>

            <div class="role-card" onclick="window.location.href='{{ route('login.driver') }}'">
                <img src="https://cdn-icons-png.flaticon.com/512/2830/2830307.png" alt="Driver" />
                <h3>Driver</h3>
            </div>

            <div class="role-card" onclick="window.location.href='{{ route('login.seller') }}'">
                <img src="https://cdn-icons-png.flaticon.com/512/2921/2921822.png" alt="Seller" />
                <h3>Seller</h3>
            </div>
        </div>

</body>

</html>