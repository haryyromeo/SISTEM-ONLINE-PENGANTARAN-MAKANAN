<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Sistem Pemesanan Makanan</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #ff9966, #ff5e62);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #333;
    }

    .login-container {
      background-color: #fff;
      border-radius: 18px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
      width: 380px;
      padding: 40px;
      text-align: center;
      animation: fadeIn 0.8s ease;
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

    .login-container h2 {
      color: #ff5e62;
      margin-bottom: 25px;
      font-weight: 600;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .input-group {
      position: relative;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #ff5e62;
    }

    input {
      width: 100%;
      padding: 12px 12px 12px 38px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    input:focus {
      border-color: #ff5e62;
      outline: none;
      box-shadow: 0 0 6px rgba(255, 94, 98, 0.4);
    }

    button {
      background-color: #ff5e62;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    button:hover {
      background-color: #ff3b47;
      transform: scale(1.03);
    }

    .register-link {
      margin-top: 15px;
      font-size: 14px;
    }

    .register-link a {
      color: #ff5e62;
      text-decoration: none;
      font-weight: 600;
    }

    .register-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>Login</h2>

    @if ($errors->any())
      <div style="color: red; margin-bottom: 10px;">
        {{ $errors->first() }}
      </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="input-group">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>

      <div class="input-group">
        <i class="fa fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>

      <button type="submit"><i class="fa fa-sign-in-alt"></i> Masuk</button>
    </form>

    <div class="register-link">
      Belum punya akun? <a href="{{ url('/register') }}">Daftar di sini</a>
    </div>
  </div>
</body>
</html>
