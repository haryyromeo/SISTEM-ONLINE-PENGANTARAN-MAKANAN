<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Menu | Seller</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #eef3ff;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 650px;
            margin: 40px auto;
        }

        .title-box {
            background: #ffb02e;
            color: white;
            padding: 18px 25px;
            border-radius: 12px;
            font-size: 20px;
            font-weight: 600;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            margin-bottom: 25px;
        }

        .form-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.12);
        }

        label {
            font-weight: 500;
            display: block;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d5d9e0;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus,
        textarea:focus {
            border-color: #ffb02e;
            box-shadow: 0px 0px 6px rgba(255, 176, 46, 0.4);
        }

        .img-preview {
            width: 130px;
            border-radius: 8px;
            margin-top: 10px;
            display: block;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.25);
        }

        .btn-submit {
            background: #2b7cff;
            color: white;
            padding: 12px 18px;
            border: none;
            width: 100%;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.22);
            transition: 0.2s;
        }

        .btn-submit:hover {
            background: #1e5fcc;
        }

        .back-link {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #2b7cff;
            font-weight: 600;
            text-align: center;
        }

        .current-img {
            margin-bottom: 15px;
        }

        .small-note {
            font-size: 12px;
            color: #777;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="title-box">
            ✏️ Edit Menu
        </div>

        <div class="form-card">

            <form action="{{ route('seller.updateMenu', $menu->id_menu) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label>Nama Menu</label>
                <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" required>

                <label>Harga Menu</label>
                <input type="number" name="harga" value="{{ $menu->harga }}" required>

                <label>Stok</label>
                <input type="number" name="stok" value="{{ $menu->stok }}" required>

                <label>Gambar Saat Ini:</label>
                <img src="{{ asset('images/menu/'.$menu->gambar_menu) }}" class="img-preview current-img">

                <label>Ganti Gambar (opsional)</label>
                <input type="file" name="gambar_menu" accept="image/*" onchange="previewNewImage(event)">

                <img id="newPreview" class="img-preview" style="display:none;">

                <button type="submit" class="btn-submit">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
            </form>

            <a href="{{ route('sellerMenu') }}" class="back-link">
                ← Kembali ke Daftar Menu
            </a>

        </div>

    </div>

    <script>
        function previewNewImage(event) {
            const img = document.getElementById("newPreview");
            img.style.display = "block";
            img.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

</body>

</html>
