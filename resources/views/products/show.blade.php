@extends('layouts.app')

@section('content')
    <h1>Product Detail</h1>

    <x-card>
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->description }}</p>
        <p>Price: ${{ $product->price }}</p>
    </x-card>

    <a href="{{ route('products') }}" class="btn btn-secondary">Back to list</a>
@endsection
