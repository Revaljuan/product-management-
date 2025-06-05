@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Selamat datang di Toko Kami</h1>
    <p>Temukan produk terbaik dengan harga menarik!</p>

    <h3>Produk Terbaru</h3>
    <div class="row">
        @foreach($latestProducts as $product)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
