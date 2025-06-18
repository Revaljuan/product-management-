@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Keranjang Belanja</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cartItems as $item)
                    @php $subtotal = $item->product->price * $item->quantity; @endphp
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp{{ number_format($item->product->price) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width:60px;">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>Rp{{ number_format($subtotal) }}</td>
                        <td>
                            <form action="{{ route('cart.delete', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @php $total += $subtotal; @endphp
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <h4>Total: Rp{{ number_format($total) }}</h4>
            <a href="{{ route('checkout.index') }}" class="btn btn-success">Checkout</a>
        </div>
    @else
        <p>Keranjang kosong.</p>
    @endif
</div>
@endsection
