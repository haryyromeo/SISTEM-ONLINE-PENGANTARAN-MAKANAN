<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Seller | FoodMate</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;
      background: url("{{ asset('images/latar6.jpg') }}") no-repeat left center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      padding-right: 8%;
    }

    .register-container {
      margin-right: 60px;
      background: rgba(255, 214, 170, 0.85);
      backdrop-filter: blur(8px);
      border-radius: 30px;
      width: 400px;
      padding: 15px 30px;
      text-align: center;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.8s ease;
      border: 1px solid rgba(255, 210, 170, 0.5);
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

    h2 {
      color: #e67e22;
      margin-bottom: 25px;
      font-weight: 600;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .input-group {
      position: relative;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #e67e22;
    }

    input,
    textarea {
      width: 100%;
      padding: 12px 12px 12px 38px;
      border-radius: 10px;
      border: 1px solid #f5cba7;
      background: rgba(255, 255, 255, 0.9);
      font-size: 14px;
      transition: all 0.3s ease;
    }

    textarea {
      height: 65px;
      resize: none;
    }

    input:focus,
    textarea:focus {
      border-color: #e67e22;
      outline: none;
      box-shadow: 0 0 6px rgba(230, 126, 34, 0.3);
      background: #fffdf9;
    }

    button {
      background-color: #ff7043;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s ease;
      font-weight: 500;
    }

    button:hover {
      background-color: #ff5722;
      transform: scale(1.03);
    }

    .errors {
      color: red;
      text-align: left;
      margin-bottom: 10px;
      font-size: 13px;
    }

    .login-link,
    .home-link {
      margin-top: 15px;
      font-size: 14px;
    }

    a {
      color: #e67e22;
      text-decoration: none;
      font-weight: 600;
    }

    a:hover {
      text-decoration: underline;
    }

    @media (max-width: 900px) {
      body {
        justify-content: center;
        padding: 0 20px;
        background-position: center;
      }

      .register-container {
        width: 50%;
      }
    }
  </style>
</head>

<body>

  <div class="register-container">
    <h2>Daftar Seller</h2>

    @if ($errors->any())
      <div class="errors">
        <ul style="margin-left: 18px;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session('success'))
      <div class="success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('registerSellerPost') }}" method="POST">
      @csrf

      <div class="input-group">
        <i class="fa fa-store"></i>
        <input type="text" name="nama_seller" placeholder="Nama Toko / Seller"
               value="{{ old('nama_seller') }}" required />
      </div>

      <div class="input-group">
        <i class="fa fa-location-dot"></i>
        <textarea name="alamat_seller" placeholder="Alamat" required>{{ old('alamat_seller') }}</textarea>
      </div>

      <div class="input-group">
        <i class="fa fa-phone"></i>
        <input type="text" name="telp_seller" placeholder="Nomor Telepon"
               value="{{ old('telp_seller') }}" required />
      </div>

      <div class="input-group">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email_seller" placeholder="Email"
               value="{{ old('email_seller') }}" required />
      </div>

      <div class="input-group">
        <i class="fa fa-lock"></i>
        <input type="password" name="password_seller" placeholder="Password" required />
      </div>

      <div class="input-group">
        <i class="fa fa-lock"></i>
        <input type="password" name="password_seller_confirmation" placeholder="Konfirmasi Password" required />
      </div>

      <button type="submit">Daftar</button>
    </form>

    <div class="login-link">
      Sudah punya akun? <a href="{{ route('loginSeller') }}">Masuk di sini</a>
    </div>

    <div class="home-link">
      Kembali ke <a href="{{ url('/Home') }}">Beranda</a>
    </div>
  </div>

</body>

</html>
