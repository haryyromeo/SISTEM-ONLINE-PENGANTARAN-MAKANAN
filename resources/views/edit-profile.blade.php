<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil Seller</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-5">

<div class="max-w-xl mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Profil Seller</h2>

        <form action="{{ route('seller.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="block font-medium">Nama Seller</label>
            <input type="text" name="nama_seller" value="{{ $seller->nama_seller }}"
                   class="w-full border p-2 rounded mb-3" required>

            <label class="block font-medium">Email</label>
            <input type="email" name="email_seller" value="{{ $seller->email_seller }}"
                   class="w-full border p-2 rounded mb-3" required>

            <label class="block font-medium">Nomor HP</label>
            <input type="text" name="telp_seller" value="{{ $seller->telp_seller }}"
                   class="w-full border p-2 rounded mb-3">

            <label class="block font-medium">Alamat</label>
            <input type="text" name="alamat_seller" value="{{ $seller->alamat_seller }}"
                   class="w-full border p-2 rounded mb-3">

            <label class="block font-medium">Foto Profil</label>
            <input type="file" name="foto_seller" class="w-full border p-2 rounded mb-3">

            @if($seller->foto_seller)
                <img src="{{ asset('sellers/'.$seller->foto_seller) }}" class="w-20 h-20 rounded-full object-cover mb-3">
            @endif

            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                Simpan Perubahan
            </button>
        </form>

    </div>
</div>

</body>
</html>
