<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Seller</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Top Navbar -->
    <div class="bg-white shadow-md p-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-700">Profil Saya</h2>
        <a href="/dashboard-seller" class="text-blue-600 font-semibold hover:underline">Kembali</a>
    </div>

    <div class="max-w-3xl mx-auto mt-10">
        <div class="bg-white rounded-xl shadow-lg p-8">

            <h1 class="text-2xl font-bold text-gray-800 mb-6">Informasi Akun</h1>

            <!-- Info Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="text-gray-600 font-medium">Nama Seller</label>
                    <p class="border rounded-lg p-3 bg-gray-50 mt-1">{{ $seller->nama_seller }}</p>
                </div>

                <div>
                    <label class="text-gray-600 font-medium">Email</label>
                    <p class="border rounded-lg p-3 bg-gray-50 mt-1">{{ $seller->email }}</p>
                </div>

                <div>
                    <label class="text-gray-600 font-medium">Nomor HP</label>
                    <p class="border rounded-lg p-3 bg-gray-50 mt-1">{{ $seller->nomor_hp }}</p>
                </div>

                <div>
                    <label class="text-gray-600 font-medium">Alamat</label>
                    <p class="border rounded-lg p-3 bg-gray-50 mt-1">{{ $seller->alamat }}</p>
                </div>
            </div>

            <!-- Tombol Edit -->
            <div class="text-right mt-8">
                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                    Edit Profil
                </a>
            </div>

        </div>
    </div>

</body>
</html>
