<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | FoodMate</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: url("{{ asset('images/latar.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            color: #4b3b00;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 8%;
        }

        .content {
            background: rgba(255, 255, 255, 0);
            border-radius: 20px;
            padding: 40px 50px;
            width: 580px;
            text-align: center;
            animation: fadeIn 1s ease;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            font-weight: 600;
            color: #d35400;
        }

        h1 span {
            background: linear-gradient(45deg, #ff6a00, #ffb347);
            -webkit-background-clip: text;
            color: transparent;
            font-weight: 800;
            font-size: 3.2rem;
        }

        p {
            font-size: 1rem;
            color: #6e5c04ff;
            margin-bottom: 15px;
            margin-top: 15px;
        }

        .role-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            gap: 15px;
            align-items: center;
        }

        .role-card {
            flex: 1;
            border-radius: 12px;
            padding: 20px 15px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            gap: 10px;
        }

        .role-card.customer {
            background: rgba(255, 243, 205, 0);
            border: 1px solid rgba(255, 218, 106, 0);
        }

        .role-card.customer:hover {
            background: #ffe08a;
        }

        .role-card.driver {
            background: rgba(255, 243, 205, 0);
            border: 1px solid rgba(255, 218, 106, 0);
        }

        .role-card.driver:hover {
            background: #ffe08a;
        }

        .role-card.seller {
            background: rgba(255, 243, 205, 0);
            border: 1px solid rgba(255, 218, 106, 0);
        }

        .role-card.seller:hover {
            background: #ffe08a;
        }

        .role-card img {
            width: 45px;
            height: 45px;
        }

        .role-card h3 {
            font-size: 1rem;
            color: #4b3b00;
            font-weight: 500;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            body {
                justify-content: center;
                padding: 20px;
                background-position: left center;
            }

            .content {
                width: 90%;
                padding: 30px;
            }

            .role-container {
                flex-direction: column;
            }

            .role-card {
                width: 100%;
                flex-direction: row;
                justify-content: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>Selamat Datang di <span>FoodMate</span></h1>
        <p>Pilih peran Anda untuk masuk</p>

        <div class="role-container">

            <div class="role-card customer" onclick="window.location.href='{{ route('login') }}'">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" alt="Customer" />
                <h3>Customer</h3>
            </div>

            <div class="role-card driver" onclick="window.location.href='{{ route('loginDriver') }}'">
                <img src="https://cdn-icons-png.flaticon.com/512/2830/2830307.png" alt="Driver" />
                <h3>Driver</h3>
            </div>

            <div class="role-card seller" onclick="window.location.href='{{ route('loginSeller') }}'">
                <img src="https://cdn-icons-png.flaticon.com/512/2921/2921822.png" alt="Seller" />
                <h3>Seller</h3>
            </div>

        </div>
    </div>
</body>

</html>