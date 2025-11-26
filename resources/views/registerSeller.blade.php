<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Seller | Sistem Pemesanan Makanan</title>

  <!-- Fonts & Icons -->
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
      background: url("{{ asset('images/latar.jpg') }}") no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      padding: 20px;
    }

    /* overlay gelap lembut agar background lebih smooth */
    body::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      background: rgba(255, 243, 230, 0.55);
      backdrop-filter: blur(2px);
      top: 0;
      left: 0;
    }

    .register-container {
      position: relative;
      background: rgba(255, 250, 245, 0.88);
      backdrop-filter: blur(10px);
      border-radius: 28px;
      width: 430px;
      padding: 45px 50px;
      text-align: center;
      border: 1px solid rgba(230, 150, 90, 0.35);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    h2 {
      color: #d66b1f;
      margin-bottom: 25px;
      font-weight: 600;
      font-size: 26px;
      letter-spacing: 0.5px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    .input-group {
      position: relative;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 14px;
      transform: translateY(-50%);
      color: #d66b1f;
      font-size: 15px;
    }

    input,
    textarea {
      width: 100%;
      padding: 13px 14px 13px 42px;
      border-radius: 12px;
      border: 1px solid #eac4a3;
      background: rgba(255, 255, 255, 0.92);
      font-size: 14px;
      transition: 0.3s ease;
    }

    textarea {
      height: 70px;
      resize: none;
    }

    input:focus,
    textarea:focus {
      border-color: #d66b1f;
      outline: none;
      box-shadow: 0 0 6px rgba(214, 107, 31, 0.3);
      background: #fffdf9;
    }

    button {
      background-color: #ff7a42;
      color: white;
      border: none;
      padding: 14px;
      border-radius: 12px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s ease;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    button:hover {
      background-color: #ff5f1e;
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
      margin-top: 14px;
      font-size: 14px;
    }

    a {
      color: #d66b1f;
      font-weight: 600;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    @media (max-width: 500px) {
      .register-container {
        width: 100%;
        padding: 35px 30px;
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

    <form action="{{ route('registerSellerPost') }}" method="POST">
      @csrf

      <div class="input-group">
        <i class="fa fa-store"></i>
        <input type="text" name="nama_seller" placeholder="Nama Toko / Seller"
          value="{{ old('nama_seller') }}" required>
      </div>

      <div class="input-group">
        <i class="fa fa-location-dot"></i>
        <textarea name="alamat_seller" placeholder="Alamat" required>{{ old('alamat_seller') }}</textarea>
      </div>

      <div class="input-group">
        <i class="fa fa-phone"></i>
        <input type="text" name="telp_seller" placeholder="No. Telepon"
          value="{{ old('telp_seller') }}" required>
      </div>

      <div class="input-group">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email_seller" placeholder="Email"
          value="{{ old('email_seller') }}" required>
      </div>

      <div class="input-group">
        <i class="fa fa-lock"></i>
        <input type="password" name="password_seller" placeholder="Password" required>
      </div>

      <div class="input-group">
        <i class="fa fa-lock"></i>
        <input type="password" name="password_seller_confirmation" placeholder="Konfirmasi Password" required>
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
