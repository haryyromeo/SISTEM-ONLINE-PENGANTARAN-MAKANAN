<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Menu | FoodMate</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #fff8f0; /* dasar lembut */
    min-height: 100vh;
    padding-bottom: 50px;
}

.container {
    margin-top: 50px;
}

.card {
    border-radius: 25px;
    border: none;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    background: #fff; /* putih bersih agar seimbang */
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.card img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border-radius: 25px 25px 0 0;
}

h3 {
    color: #ff8c42; /* aksen oranye */
    font-weight: 700;
    margin-bottom: 20px;
}

.quantity-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin-bottom: 15px;
}

.quantity-box button {
    background: #ff8c42;
    color: white;
    border: none;
    border-radius: 10px;
    width: 45px;
    height: 45px;
    font-size: 20px;
    font-weight: bold;
    transition: 0.2s;
}

.quantity-box button:hover {
    background: #ff6f28;
    transform: scale(1.1);
}

.quantity-box input {
    width: 80px;
    text-align: center;
    font-size: 16px;
    border-radius: 10px;
    border: 1px solid #ddd;
    padding: 5px;
    background: #fff3e0;
}

.total-box {
    background: #fff3e0;
    padding: 20px;
    border-radius: 20px;
    margin-top: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}

.total-box:hover {
    transform: scale(1.02);
}

.btn-order {
    background: #ff8c42;
    color: #fff;
    border: none;
    border-radius: 20px;
    font-weight: 600;
    padding: 12px;
    font-size: 16px;
    width: 100%;
    transition: 0.2s;
}

.btn-order:hover {
    background: #ff6f28;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.btn-back {
    background: #ffd180;
    color: #ff6f28;
    border-radius: 20px;
    font-weight: 600;
    padding: 12px;
    margin-top: 15px;
    width: 100%;
    transition: 0.2s;
}

.btn-back:hover {
    background: #ffe082;
    color: #ff5722;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
}

label i {
    color: #ff8c42;
    margin-right: 5px;
}
</style>
</head>
<body>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card">
<img src="{{ asset('images/menu/' . $menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}">
<div class="card-body text-center">

<h3>{{ $menu->nama_menu }}</h3>

<form action="{{ route('customer.pesanMenu', $menu->id_menu) }}" method="POST">
@csrf

<div class="quantity-box">
    <button type="button" id="btnMinus"><i class="bi bi-dash"></i></button>
    <input type="number" name="jumlah" id="jumlah" value="1" min="1" required>
    <button type="button" id="btnPlus"><i class="bi bi-plus"></i></button>
</div>

<div class="mb-3 text-start">
<label for="alamat" class="form-label"><i class="bi bi-geo-alt-fill"></i> Alamat Pengiriman:</label>
<textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
</div>

<div class="total-box text-start">
<p>Harga Menu: <span id="hargaMenu">Rp {{ number_format($menu->harga_menu,0,',','.') }}</span></p>
<p>Biaya Pengiriman: <span id="biayaKirim">Rp 10.000</span></p>
<p>Biaya Layanan: <span id="biayaLayanan">Rp 500</span></p>
<hr>
<h5>Total Keseluruhan: <span id="totalKeseluruhan">Rp {{ number_format($menu->harga_menu + 10500,0,',','.') }}</span></h5>
</div>

<button type="submit" class="btn-order mt-3"><i class="bi bi-cart-check-fill"></i> Pesan Sekarang</button>
</form>

<a href="{{ route('customer.DashboardCustomer') }}" class="btn-back"><i class="bi bi-arrow-left-circle-fill"></i> Kembali ke Beranda</a>
</div>
</div>

</div>
</div>
</div>

<script>
const jumlahInput = document.getElementById('jumlah');
const hargaMenu = {{ $menu->harga_menu }};
const biayaKirim = 10000;
const biayaLayanan = 500;

const hargaMenuEl = document.getElementById('hargaMenu');
const totalKeseluruhanEl = document.getElementById('totalKeseluruhan');

function updateTotal() {
    const jumlah = parseInt(jumlahInput.value) || 1;
    const subtotal = hargaMenu * jumlah;
    const total = subtotal + biayaKirim + biayaLayanan;

    hargaMenuEl.innerText = `Rp ${subtotal.toLocaleString('id-ID')}`;
    totalKeseluruhanEl.innerText = `Rp ${total.toLocaleString('id-ID')}`;
}

jumlahInput.addEventListener('input', updateTotal);

document.getElementById('btnPlus').addEventListener('click', () => {
    jumlahInput.value = parseInt(jumlahInput.value) + 1;
    updateTotal();
});

document.getElementById('btnMinus').addEventListener('click', () => {
    if (parseInt(jumlahInput.value) > 1) {
        jumlahInput.value = parseInt(jumlahInput.value) - 1;
        updateTotal();
    }
});
</script>

</body>
</html>
