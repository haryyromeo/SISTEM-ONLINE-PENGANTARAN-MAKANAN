<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Seller</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #ffcc00, #ffeb3b);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background: #fff;
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #ffb300;
            margin-bottom: 25px;
        }

        .input-group {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            color: #555;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-top: 5px;
            resize: none;
        }

        .btn-register {
            background-color: #ffb300;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-register:hover {
            background-color: #ffa000;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .registerSeller-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .registerSeller-link a {
            color: #ffb300;
            text-decoration: none;
            font-weight: 600;
        }

        .registerSeller-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h2>Register Seller</h2>

        {{-- Pesan error --}}
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        {{-- Form Registrasi --}}
        <form action="{{ route('registerSellerPost') }}" method="POST">
            @csrf
            <div class="input-group">
                <label>Nama Toko / Seller</label>
                <input type="text" name="nama_seller" required>
            </div>

            <div class="input-group">
                <label>Alamat</label>
                <textarea name="alamat_seller" rows="3" required></textarea>
            </div>

            <div class="input-group">
                <label>No. Telepon</label>
                <input type="text" name="telp_seller" required>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email_seller" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button class="btn-register" type="submit">Daftar</button>
        </form>

        <div class="registerSeller-link">
            Sudah punya akun? <a href="{{ route('loginSeller') }}">Masuk di sini</a>
        </div>
    </div>
</body>

</html>
