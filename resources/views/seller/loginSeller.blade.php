<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Seller | FoodMate</title>

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

    .login-container {
      margin-right: 60px;
      background: rgba(255, 218, 179, 0.85);
      backdrop-filter: blur(8px);
      border-radius: 30px;
      width: 400px;
      padding: 40px 45px;
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

    input {
      width: 100%;
      padding: 12px 12px 12px 38px;
      border-radius: 10px;
      border: 1px solid #f5cba7;
      background: rgba(255, 255, 255, 0.9);
      font-size: 14px;
      transition: all 0.3s ease;
    }

    input:focus {
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

    .register-link,
    .home-link {
      margin-top: 15px;
      font-size: 14px;
    }

    a {
      color: #e67e22;
      font-weight: 600;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    /* Flash messages */
    .alert {
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 10px;
      font-size: 14px;
    }

    .alert-success {
      background: #d4edda;
      color: #155724;
    }

    .alert-error {
      background: #f8d7da;
      color: #721c24;
    }

    @media (max-width: 900px) {
      body {
        justify-content: center;
        padding: 0 20px;
        background-position: center;
      }

      .login-container {
        width: 50%;
      }
    }
  </style>
</head>

<body>

  <div class="login-container">

    <h2>Login Seller</h2>

    <!-- Flash Messages -->
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
      <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
      <div class="alert alert-error">
        {{ $errors->first() }}
      </div>
    @endif

    <form action="{{ route('loginSeller.post') }}" method="POST">
      @csrf

      <div class="input-group">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email_seller" value="{{ old('email_seller') }}" placeholder="Email" required>
      </div>

      <div class="input-group">
        <i class="fa fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required>
      </div>

      <button type="submit">Masuk</button>
    </form>

    <div class="register-link">
      Belum punya akun seller? <a href="{{ url('/registerSeller') }}">Daftar di sini</a>
    </div>

    <div class="home-link">
      Kembali ke <a href="{{ url('/Home') }}">Beranda</a>
    </div>

  </div>

</body>

</html>
