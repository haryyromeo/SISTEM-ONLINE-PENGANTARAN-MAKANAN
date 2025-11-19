<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Driver | FoodMate</title>

    <!-- Modern Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #ff9966, #ff5e62);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: #fff;
            width: 380px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            text-align: center;
            animation: fadeIn 0.8s ease;
        }

        .login-container h2 {
            color: #ff5e62;
            font-weight: 600;
            margin-bottom: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .input-group {
            position: relative;
            margin-bottom: 18px;
            text-align: left;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #ff5e62;
        }

        .input-group input {
            width: 85%;
            padding: 12px 12px 12px 40px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #ff5e62;
            box-shadow: 0 0 6px rgba(255, 179, 0, 0.4);
            outline: none;
        }

        .btn-login {
            background: #ff5e62;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn-login:hover {
            background: #ff5e62;
            transform: scale(1.03);
        }

        .registerDriver-link,
        .Home-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .registerDriver-link a,
        .Home-link a {
            color: #ff5e62;
            text-decoration: none;
            font-weight: 600;
        }

        .registerDriver-link a:hover,
        .Home-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login Driver</h2>

        <form action="{{ route('loginDriver') }}" method="POST">
            @csrf

            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email_driver" placeholder="Email" required />
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password_driver" placeholder="Password" required />
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>

        <div class="registerDriver-link">
            Belum punya akun? <a href="{{ url('/registerDriver') }}">Daftar di sini</a>
        </div>

        <div class="Home-link">
            Kembali ke <a href="{{ url('/Home') }}">Beranda</a>
        </div>
    </div>

</body>

</html>
