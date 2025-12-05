@extends('customer.layout')

@section('content')
<h4>Detail Menu</h4>

<div class="card p-4">
    <img src="{{ asset('menu/'.$menu->foto_menu) }}" class="img-fluid rounded mb-3">

    <h5>{{ $menu->nama_menu }}</h5>
    <p>Harga: <strong>Rp {{ number_format($menu->harga_menu) }}</strong></p>

    <form action="{{ route('customer.pesanMenu') }}" method="POST">
        @csrf
        <input type="hidden" name="menu_id" value="{{ $menu->id_menu }}">

        <label>Jumlah:</label>
        <input type="number" name="jumlah" class="form-control mb-3" value="1" min="1" required>

        <button class="btn-order">Pesan Sekarang</button>
    </form>
</div>
@endsection
