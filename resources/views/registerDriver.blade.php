<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Driver | FoodMate</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff9966, #ff5e62);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #ff5e62;
            margin-bottom: 25px;
            font-weight: 600;
        }

        /* INPUT WRAPPER (IKON + INPUT) */
        .input-group {
            position: relative;
            margin-bottom: 25px;
            text-align: left;
        }

        .input-group input {
            width: 85%;
            padding: 14px 12px 14px 42px; /* ruang untuk ikon */
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            background: none;
            transition: 0.3s;
        }

        .input-group label {
            position: absolute;
            top: 14px;
            left: 42px;
            color: #888;
            font-size: 14px;
            pointer-events: none;
            transition: 0.3s;
            background: white;
            padding: 0 4px;
        }

        /* IKON */
        .input-group i {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #ff5e62;
            font-size: 16px;
        }

        /* Saat input fokus */
        .input-group input:focus {
            border-color: #ff5e62;
            box-shadow: 0 0 5px rgba(211, 11, 71, 0.4);
            outline: none;
        }

        /* Saat floating */
        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: -8px;
            left: 38px;
            font-size: 12px;
            color: #ff5e62;
        }

        .btn-register {
            background-color: #ff5e62;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            font-weight: 600;
            cursor: pointer;
            font-size: 15px;
            transition: 0.25s;
        }

        .btn-register:hover {
            background-color: #ff5e62;
            transform: translateY(-2px);
        }

        .error {
            background: #ffebee;
            color: #c62828;
            padding: 8px;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .link {
            margin-top: 15px;
            font-size: 14px;
        }

        .link a {
            color: #ff5e62;
            text-decoration: none;
            font-weight: 600;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <h2>Register Driver</h2>

        @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('registerDriverPost') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="nama_driver" required placeholder=" ">
                <label>Nama Lengkap</label>
            </div>

            <!-- Telepon -->
            <div class="input-group">
                <i class="fa-solid fa-phone"></i>
                <input type="text" name="telp_driver" required placeholder=" ">
                <label>No. Telepon</label>
            </div>

            <!-- Email -->
            <div class="input-group">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email_driver" required placeholder=" ">
                <label>Email</label>
            </div>

            <!-- Password -->
            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password_driver" required placeholder=" ">
                <label>Password</label>
            </div>

            <button class="btn-register" type="submit">Daftar</button>
        </form>

        <div class="link">
            Sudah punya akun?
            <a href="{{ url('/loginDriver') }}">Masuk di sini</a>
        </div>

        <div class="link">
            Kembali ke <a href="{{ url('/Home') }}">Beranda</a>
        </div>
    </div>

</body>

</html>
