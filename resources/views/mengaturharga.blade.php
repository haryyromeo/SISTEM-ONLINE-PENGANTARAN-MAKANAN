<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mengatur Harga | Sistem Pemesanan Makanan</title>

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
      background: linear-gradient(135deg, #B22222, #FF8C00);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #fff;
    }

    .price-container {
      background-color: #fff;
      color: #B22222;
      border-radius: 18px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
      width: 420px;
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

    .price-container h2 {
      color: #B22222;
      font-weight: 700;
      margin-bottom: 25px;
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
      color: #B22222;
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
      border-color: #FF4500;
      outline: none;
      box-shadow: 0 0 6px rgba(255, 69, 0, 0.4);
    }

    /* ===== BUTTON ===== */
    button {
      background-color: #B22222;
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
      background-color: #FF4500;
      transform: scale(1.05);
    }

    /* ===== FOOTER TEXT ===== */
    .info-text {
      margin-top: 15px;
      font-size: 14px;
      color: #333;
    }

    .highlight {
      color: #FF8C00;
      font-weight: 600;
    }

    .error {
      color: red;
      margin-bottom: 10px;
      font-weight: 500;
    }

    a.back {
      display: inline-block;
      margin-top: 10px;
      color: #FF4500;
      text-decoration: none;
      font-weight: 500;
    }

    a.back:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="price-container">
    <i class="fa fa-tags icon-title"></i>
    <h2>Atur Harga Produk</h2>

    <p style="color:#444; margin-bottom: 15px;">
      <strong>{{ $produk->nama_produk }}</strong><br>
      Kategori: {{ ucfirst($produk->kategori) }}
    </p>

    @if ($errors->any())
      <div class="error">{{ $errors->first('harga') }}</div>
    @endif

    <form action="{{ route('mengaturharga.update', $produk->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="input-group">
        <i class="fa fa-money-bill"></i>
        <input type="number" name="harga" value="{{ $produk->harga }}" min="0" placeholder="Masukkan harga baru" required>
      </div>

      <button type="submit"><i class="fa fa-save"></i> Simpan Perubahan</button>
    </form>

    <a href="{{ route('mengaturharga.index') }}" class="back"><i class="fa fa-arrow-left"></i> Kembali ke Daftar</a>
  </div>

</body>

</html>
