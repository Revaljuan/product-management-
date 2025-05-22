@extends('layouts.app')

@section('content')
    <h1>Product List</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add new product</a>

    @foreach ($products as $product)
        <x-card>
            <h5>{{ $product->name }}</h5>
            <p>{{ $product->description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
        </x-card>
    @endforeach
@endsection
