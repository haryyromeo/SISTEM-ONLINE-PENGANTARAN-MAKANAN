<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menyuplai Makanan | Sistem Pemesanan Makanan</title>

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

    .supply-container {
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

    .supply-container h2 {
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

    input,
    select {
      width: 100%;
      padding: 12px 12px 12px 38px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    input:focus,
    select:focus {
      border-color: #FF4500;
      outline: none;
      box-shadow: 0 0 6px rgba(255, 69, 0, 0.4);
    }

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

    .info-text {
      margin-top: 15px;
      font-size: 14px;
      color: #333;
    }

    .highlight {
      color: #FF8C00;
      font-weight: 600;
    }

    .icon-title {
      font-size: 40px;
      color: #FF8C00;
      margin-bottom: 10px;
    }
  </style>
</head>

<form action="{{ route('menyuplai.store') }}" method="POST">
  @csrf
  <div class="input-group">
    <i class="fa fa-utensils"></i>
    <input type="text" name="nama_produk" placeholder="Nama Makanan / Minuman" required />
  </div>

  <div class="input-group">
    <i class="fa fa-list"></i>
    <select name="kategori" required>
      <option value="">-- Pilih Kategori --</option>
      <option value="makanan">🍗 Makanan</option>
      <option value="minuman">🥤 Minuman</option>
    </select>
  </div>

  <div class="input-group">
    <i class="fa fa-money-bill"></i>
    <input type="number" name="harga" placeholder="Harga (Rp)" required />
  </div>

  <div class="input-group">
    <i class="fa fa-box"></i>
    <input type="number" name="stok" placeholder="Jumlah Stok" required />
  </div>

  <div class="input-group">
    <i class="fa fa-image"></i>
    <input type="text" name="gambar" placeholder="Link Gambar Produk (opsional)" />
  </div>

  <div class="input-group">
    <i class="fa fa-file-alt"></i>
    <input type="text" name="deskripsi" placeholder="Deskripsi Singkat" />
  </div>

  <button type="submit"><i class="fa fa-paper-plane"></i> Kirim Suplai Sekarang</button>
</form>

</html>