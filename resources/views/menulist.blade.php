<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Menu | Seller</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to bottom right, #f7f9ff, #eef2ff);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 92%;
            margin: 40px auto;
        }

        /* HEADER */
        .header-box {
            background: #ffffff;
            padding: 25px 30px;
            border-radius: 14px;
            box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.12);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 6px solid #ff8c42;
        }

        .header-box h2 {
            margin: 0;
            font-weight: 600;
            color: #333;
            font-size: 24px;
        }

        /* BUTTON */
        .btn-main {
            padding: 10px 18px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }

        .btn-back {
            background: #6c757d;
        }

        .btn-back:hover {
            background: #5a6268;
        }

        .btn-add {
            background: #28a745;
        }

        .btn-add:hover {
            background: #208a38;
        }

        /* TABLE */
        table {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        th {
            background: #ff8c42;
            color: white;
            padding: 14px;
            font-weight: 600;
            text-align: left;
            letter-spacing: 0.4px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }

        tr:hover {
            background: #fff6f0;
        }

        img.menu-img {
            width: 75px;
            border-radius: 10px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-action {
            padding: 7px 14px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .edit {
            background: #f0ad4e;
        }

        .edit:hover {
            background: #d9953c;
        }

        .delete {
            background: #d9534f;
        }

        .delete:hover {
            background: #b84240;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Header -->
        <div class="header-box">
            <h2>📋 Daftar Menu — {{ $seller->nama_seller }}</h2>

            <div style="display:flex; gap:12px;">
                <a href="{{ route('DashboardSeller') }}" class="btn-main btn-back">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>

                <a href="{{ route('seller.addMenu') }}" class="btn-main btn-add">
                    <i class="fa fa-plus"></i> Tambah Menu
                </a>
            </div>
        </div>

        <!-- Table -->
        <table>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>

            @forelse($menus as $index => $menu)
            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    @if($menu->gambar_menu)
                    <img src="{{ asset('images/menu/'.$menu->gambar_menu) }}" class="menu-img">
                    @else
                    <span style="color:#777;">Tidak ada gambar</span>
                    @endif
                </td>

                <td>{{ $menu->nama_menu }}</td>

                <td>Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}</td>

                <td>{{ $menu->stok_menu }}</td>

                <td>
                    <a href="{{ route('seller.editMenu', $menu->id_menu) }}" class="btn-action edit">
                        <i class="fa fa-edit"></i> Edit
                    </a>

                    <a href="{{ route('seller.deleteMenu', $menu->id_menu) }}"
                        class="btn-action delete"
                        onclick="return confirm('Yakin ingin menghapus menu ini?')">
                        <i class="fa fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="6" class="no-data">Belum ada menu 😊</td>
            </tr>
            @endforelse

        </table>

    </div>

</body>

</html>
