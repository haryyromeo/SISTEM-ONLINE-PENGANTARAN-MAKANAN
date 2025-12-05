<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Menu Baru | Seller</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: "Poppins", sans-serif;
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
            background: #ff8c42;
            color: white;
            padding: 18px 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            font-weight: 600;
            font-size: 20px;
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
            border-color: #ff8c42;
            box-shadow: 0px 0px 6px rgba(43, 124, 255, 0.4);
        }

        .img-preview {
            width: 130px;
            border-radius: 8px;
            margin-top: 10px;
            display: none;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-submit {
            background: #28a745;
            color: white;
            padding: 12px 18px;
            width: 100%;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            transition: 0.2s;
        }

        .btn-submit:hover {
            background: #1e7e34;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #ff8c42;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="title-box">
            ➕ Tambah Menu Baru
        </div>

        <div class="form-card">

            <form action="{{ route('storeMenu') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Nama Menu</label>
                <input type="text" name="nama_menu" required>

                <label>Harga Menu</label>
                <input type="number" name="harga" required>

                <label>Stok</label>
                <input type="number" name="stok" required>

                <label>Upload Gambar Menu</label>
                <input type="file" name="gambar_menu" accept="image/*" onchange="previewImage(event)">
                <img id="preview" class="img-preview">

                <button type="submit" class="btn-submit">
                    <i class="fa fa-save"></i> Simpan Menu
                </button>
            </form>

            <a href="{{ route('sellerMenu') }}" class="back-link">
                ← Kembali ke Daftar Menu
            </a>

        </div>

    </div>

    <script>
        function previewImage(event) {
            const img = document.getElementById("preview");
            img.style.display = "block";
            img.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

</body>

</html>
