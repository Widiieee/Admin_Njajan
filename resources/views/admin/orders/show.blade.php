@extends('admin.layouts.app')

@section('title','Detail Pesanan')

@section('content')
  <h1>Pesanan #{{ $order->id }}</h1>
  <div class="card">
    <p><strong>Pelanggan:</strong> {{ $order->customer->name }}</p>
    <p><strong>Alamat:</strong> {{ $order->customer->address }}</p>
    <p><strong>Status:</strong> <span class="badge">{{ $order->status }}</span></p>
  </div>

  <table class="table">
    <thead><tr><th>Produk</th><th>Qty</th><th>Subtotal</th></tr></thead>
    <tbody>
      @foreach($order->details as $d)
        <tr>
          <td>{{ $d->product->name }}</td>
          <td>{{ $d->qty }}</td>
          <td>Rp {{ number_format($d->subtotal,0,',','.') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @if(auth()->user()->role && auth()->user()->role->name === 'Manager Keuangan' && $order->status !== 'Sudah Bayar')
    <form action="{{ route('admin.orders.confirmPayment',$order->id) }}" method="POST">
      @csrf
      <button class="btn">Konfirmasi Pembayaran (Cash)</button>
    </form>
  @endif
@endsection
