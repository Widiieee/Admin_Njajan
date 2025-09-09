@extends('layouts.app')

@section('title','Form Pemesanan')

@section('content')
<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-6 max-w-lg">
    <h2 class="text-2xl font-bold mb-6">Form Pemesanan</h2>

    <form action="{{ route('order.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
      @csrf

      <input type="hidden" name="product_id" value="{{ $product->id }}">

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Nama Lengkap</label>
        <input type="text" name="name" class="w-full border rounded p-2" required>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Nomor HP</label>
        <input type="text" name="phone" class="w-full border rounded p-2">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Alamat</label>
        <textarea name="address" class="w-full border rounded p-2"></textarea>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Produk</label>
        <p class="font-bold">{{ $product->name }} (Rp {{ number_format($product->price) }})</p>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Jumlah</label>
        <input type="number" name="qty" min="1" class="w-full border rounded p-2" required>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Metode Pembayaran</label>
        <select name="payment" class="w-full border rounded p-2" required>
          <option value="COD">COD</option>
          <option value="QRIS">QRIS</option>
        </select>
      </div>

      <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600">
        Pesan Sekarang
      </button>
    </form>
  </div>
</section>
@endsection
