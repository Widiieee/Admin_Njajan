@extends('layouts.app')

@section('title','Form Pemesanan Produk')

@section('content')
<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-6 max-w-lg">
    <h2 class="text-2xl font-bold mb-6">Form Pemesanan Produk</h2>

    {{-- tampilkan error validasi --}}
    @if ($errors->any())
      <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('order.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
      @csrf

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Nama Lengkap</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Nomor HP</label>
        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border rounded p-2" required>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Alamat</label>
        <textarea name="address" class="w-full border rounded p-2" required>{{ old('address') }}</textarea>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Pilih Produk</label>
        <select name="items[0][product_id]" class="w-full border rounded p-2" required>
          <option value="">-- Pilih Produk --</option>
          @foreach($products as $product)
            <option value="{{ $product->id }}">
              {{ $product->name }} (Rp {{ number_format($product->price) }}, stok: {{ $product->stock }})
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Jumlah</label>
        <input type="number" name="items[0][qty]" value="1" min="1" class="w-full border rounded p-2" required>
      </div>

      <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600">
        Pesan Sekarang
      </button>
    </form>
  </div>
</section>
@endsection
