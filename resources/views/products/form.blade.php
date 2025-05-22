@extends('layouts.app')

@section('content')
    <h1>{{ isset($product) ? 'Edit' : 'Create' }} Product</h1>

    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name ?? '' }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $product->description ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" value="{{ $product->price ?? '' }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
