<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Seller</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #FF9966, #FF5E62);
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 450px;
            background: #fff;
            padding: 10px 10px;
            border-radius: 20px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.18);
            text-align: center;
        }

        h2 {
            color: #FF5E62;
            margin-bottom: 25px;
            font-size: 26px;
        }

        .input-group {
            position: relative;
            margin-bottom: 18px;
            width: 90%;
        }

        .input-group i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #FF5E62;
        }

        input,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ddd;
            border-radius: 12px;
            font-size: 15px;
            outline: none;
            background: #fff;
            color: #444;
        }

        textarea {
            resize: none;
            height: 80px;
            padding-top: 12px;
        }

        .btn-register {
            width: 100%;
            padding: 14px;
            background: #FF5E62;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .btn-register:hover {
            background: #ff4147;
        }

        .link {
            margin-top: 15px;
            font-size: 14px;
        }

        .link a {
            color: #FF5E62;
            font-weight: 600;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <h2>Register Seller</h2>

        {{-- Pesan Error --}}
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('registerSellerPost') }}" method="POST">
            @csrf

            <div class="input-group">
                <i>🏪</i>
                <input type="text" name="nama_seller" placeholder="Nama Toko / Seller" required>
            </div>

            <div class="input-group">
                <i>📍</i>
                <textarea name="alamat_seller" placeholder="Alamat" required></textarea>
            </div>

            <div class="input-group">
                <i>📞</i>
                <input type="text" name="telp_seller" placeholder="No. Telepon" required>
            </div>

            <div class="input-group">
                <i>✉️</i>
                <input type="email" name="email_seller" placeholder="Email" required>
            </div>

            <div class="input-group">
                <i>🔒</i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button class="btn-register" type="submit">Daftar</button>
        </form>

        <div class="link">
            Sudah punya akun? <a href="{{ route('loginSeller') }}">Masuk di sini</a>
        </div>

        <div class="link">
            Kembali ke <a href="{{ url('/Home') }}">Beranda</a>
        </div>
    </div>

</body>

</html>