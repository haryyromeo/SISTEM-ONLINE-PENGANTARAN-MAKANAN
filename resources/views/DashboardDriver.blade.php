<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Driver - FoodMate</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      background-color: #fffaf5;
      min-height: 100vh;
      color: #333;
    }

    .sidebar {
      width: 250px;
      background-color: #ff8c42;
      color: #fff;
      padding: 25px 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 35px;
      font-size: 1.5rem;
    }

    .menu a {
      display: block;
      text-decoration: none;
      color: #fff;
      padding: 12px 15px;
      border-radius: 10px;
      margin-bottom: 10px;
      transition: all 0.3s;
    }

    .menu a:hover,
    .menu a.active {
      background: rgba(255, 255, 255, 0.2);
      transform: translateX(5px);
    }

    .main {
      flex: 1;
      padding: 35px;
      overflow-y: auto;
      background: #f7f9fc;
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .section {
      background: white;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 25px;
    }

    .section h3 {
      margin-bottom: 20px;
      color: #ff8c42;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
    }

    table th,
    table td {
      padding: 12px;
      border-bottom: 1px solid #eee;
    }

    table th {
      background: #ff8c42;
      color: white;
    }

    table tr:hover {
      background: #f9f9f9;
    }
  </style>
</head>

<body>

  <div class="sidebar">
    <div>
      <h2>FoodMate Driver</h2>
      <div class="menu">
        <a href="#" class="active" onclick="showPage('dashboard')">Dashboard</a>
        <a href="#" onclick="showPage('orders')">Pesanan</a>
        <a href="#" onclick="showPage('history')">Riwayat</a>
        <a href="#" onclick="showPage('profile')">Profil</a>
        <a href="#" onclick="showPage('history')"></a>
        <a href="{{ route('logoutDriver') }}">Keluar</a>
      </div>
    </div>
  </div>

  <div class="main" id="content-area">

    <!-- DASHBOARD -->
    <div id="dashboard" class="page" style="display:block;">
      <div class="section">
        <h3>Selamat Datang, {{ session('driver.nama_driver') }}</h3>
        <p>Anda login sebagai driver FoodMate.</p>
      </div>
    </div>

    <!-- PESANAN -->
    <div id="orders" class="page" style="display:none;">
      <div class="section">
        <h3>📦 Daftar Pesanan Aktif</h3>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Pelanggan</th>
              <th>Alamat</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#MK-301</td>
              <td>Siti Rahma</td>
              <td>Jl. Merpati No.45</td>
              <td style="color:#ffa502;">Sedang diantar</td>
              <td><button>Selesai</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- RIWAYAT -->
    <div id="history" class="page" style="display:none;">
      <div class="section">
        <h3>🕒 Riwayat Pengantaran</h3>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Pelanggan</th>
              <th>Tanggal</th>
              <th>Penghasilan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#MK-287</td>
              <td>Dewi Lestari</td>
              <td>7 Nov 2025</td>
              <td>Rp 15.000</td>
              <td style="color:green;">Selesai</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- PROFIL -->
    <div id="profile" class="page" style="display:none;">
      <div class="section">
        <h3>👤 Profil Driver</h3>
        <div style="text-align:center;">
          <img src="https://i.pravatar.cc/150?img=12"
            style="width:140px;height:140px;border-radius:50%;border:4px solid #ff8c42;margin-bottom:15px;">
          <p>ID: {{ session('driver.id_driver') }}</p>
          <p>Nama: {{ session('driver.nama_driver') }}</p>
          <p>Email: {{ session('driver.email_driver') }}</p>
          <p>No. Telepon: {{ session('driver.telp_driver') ?? 'Belum ada nomor' }}</p>
        </div>
      </div>
    </div>

  </div>

  <script>
    function showPage(pageId) {
      document.querySelectorAll('.page').forEach(page => page.style.display = 'none');
      document.getElementById(pageId).style.display = 'block';
      document.querySelectorAll('.menu a').forEach(a => a.classList.remove('active'));
      event.target.classList.add('active');
    }
  </script>

</body>

</html>