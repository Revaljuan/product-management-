@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p>Keranjang belanja kamu kosong. <a href="{{ route('products.index') }}">Belanja sekarang</a></p>
    @else
        <table class="table mb-4">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cartItems as $item)
                    @php $subtotal = $item->product->price * $item->quantity; @endphp
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp{{ number_format($item->product->price, 0, ',', '.') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @php $total += $subtotal; @endphp
                @endforeach
                <tr>
                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                    <td><strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="address" class="form-label">Alamat Pengiriman</label>
                <textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select name="payment_method" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option value="cod" {{ old('payment_method') == 'cod' ? 'selected' : '' }}>Cash on Delivery</option>
                    <option value="transfer" {{ old('payment_method') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                    <option value="ewallet" {{ old('payment_method') == 'ewallet' ? 'selected' : '' }}>E-Wallet</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Proses Pembayaran</button>
        </form>
    @endif
</div>
@endsection
