<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil Seller</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-orange-100 to-yellow-50 min-h-screen flex items-center justify-center p-5">

<div class="w-full max-w-xl">
    <div class="bg-white shadow-2xl rounded-2xl p-8 transform transition-all duration-500 hover:scale-105">
        <h2 class="text-3xl font-extrabold text-orange-600 mb-6 text-center">Edit Profil Seller</h2>

        <form action="{{ route('seller.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama Seller -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nama Seller</label>
                <input type="text" name="nama_seller" value="{{ $seller->nama_seller }}"
                       class="w-full border border-orange-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none shadow-sm" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email_seller" value="{{ $seller->email_seller }}"
                       class="w-full border border-orange-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none shadow-sm" required>
            </div>

            <!-- Nomor HP -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nomor HP</label>
                <input type="text" name="telp_seller" value="{{ $seller->telp_seller }}"
                       class="w-full border border-orange-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none shadow-sm">
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Alamat</label>
                <input type="text" name="alamat_seller" value="{{ $seller->alamat_seller }}"
                       class="w-full border border-orange-300 rounded-lg p-3 focus:ring-2 focus:ring-orange-400 focus:outline-none shadow-sm">
            </div>

            <!-- Foto Profil -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Foto Profil</label>
                <input type="file" name="foto_seller" class="w-full border border-orange-300 rounded-lg p-2 shadow-sm">
                
                @if($seller->foto_seller)
                    <div class="mt-3 flex justify-center">
                        <img src="{{ asset('sellers/'.$seller->foto_seller) }}" 
                             class="w-24 h-24 rounded-full object-cover border-4 border-orange-200 shadow-lg">
                    </div>
                @endif
            </div>

            <!-- Tombol Simpan -->
            <div class="text-center mt-6">
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
