@extends('layouts.app')

@section('title','Katalog Produk')

@section('content')
<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-6">
    <h2 class="text-3xl font-extrabold text-center mb-12">Katalog Produk</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
      @foreach ($products as $product)
        <div class="relative group">
          <div class="flex justify-center -mb-16 z-10 relative">
            <img src="{{ asset('images/'.$product->image) }}" 
                alt="{{ $product->name }}" 
                class="w-32 sm:w-40 md:w-48 lg:w-56 xl:w-64 transition-transform duration-500 group-hover:scale-110 drop-shadow-2xl">
          </div>
          <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg p-6 pt-24 text-center transition group-hover:shadow-2xl">
            <h4 class="font-bold text-lg md:text-xl">{{ $product->name }}</h4>
            <p class="text-sm md:text-base text-gray-700">{{ $product->description }}</p>
            
            <!-- Tombol Pesan -->
            <button 
              onclick="openOrderForm({{ $product->id }}, '{{ $product->name }}', {{ $product->stock }})"
              class="inline-block mt-4 px-6 py-3 rounded-full bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
              Pesan Sekarang
            </button>
          </div>
        </div>
      @endforeach
    </div>

    </div>
  </div>
  <!-- Modal Form Order -->
  <div id="orderModal" class="hidden fixed inset-0 bg-gray-800/70 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-6 w-full max-w-lg">
      <h3 class="text-xl font-bold mb-4">Form Pemesanan</h3>
      <form id="orderForm">
        @csrf
        <input type="hidden" name="items[0][product_id]" id="product_id">

        <div class="mb-3">
          <label class="block font-medium">Nama</label>
          <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
          <label class="block font-medium">No HP</label>
          <input type="text" name="phone" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
          <label class="block font-medium">Alamat</label>
          <textarea name="address" class="w-full border rounded p-2" required></textarea>
        </div>

        <div class="mb-3">
          <label class="block font-medium">Produk</label>
          <input type="text" id="product_name" class="w-full border rounded p-2 bg-gray-100" readonly>
        </div>

        <div class="mb-3">
          <label class="block font-medium">Jumlah</label>
          <input type="number" name="items[0][qty]" id="product_qty" min="1" class="w-full border rounded p-2" required>
          <small id="stockInfo" class="text-gray-500"></small>
        </div>

        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeOrderForm()" class="px-4 py-2 rounded bg-gray-300">Batal</button>
          <button type="submit" class="px-4 py-2 rounded bg-orange-500 text-white">Pesan</button>
        </div>
      </form>
    </div>
  </div>

  <script>
  function openOrderForm(id, name, stock) {
    document.getElementById('orderModal').classList.remove('hidden');
    document.getElementById('product_id').value = id;
    document.getElementById('product_name').value = name;
    document.getElementById('stockInfo').innerText = "Stok tersedia: " + stock;
  }
  function closeOrderForm() {
    document.getElementById('orderModal').classList.add('hidden');
  }

  // Kirim order via AJAX
  document.getElementById('orderForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    let res = await fetch("{{ route('order.store') }}", {
      method: "POST",
      body: formData,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    });

    if(res.ok) {
      let data = await res.json();
      alert(data.message + " (ID Pesanan: " + data.order_id + ")");
      closeOrderForm();
    } else {
      alert("Gagal memesan, periksa input!");
    }
  });
  </script>

</section>
@endsection
