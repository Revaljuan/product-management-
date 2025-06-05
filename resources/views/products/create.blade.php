<!-- resources/views/products/create.blade.php -->

@extends('layouts.app') <!-- Jika kamu pakai layout utama -->

@section('content')
    <h1>Tambah Produk</h1>

    @if ($errors->any())
        <div>
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Produk:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Deskripsi:</label>
            <textarea name="description"></textarea>
        </div>

        <div>
            <label>Harga:</label>
            <input type="number" step="0.01" name="price" required>
        </div>

        <div>
            <label>Kategori:</label>
            <select name="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection
