@extends('layouts.app')

@section('title','Beranda')

@section('content')
  {{-- HERO besar --}}
  <section class="relative overflow-hidden">
    <div class="container mx-auto px-6 py-24 lg:py-36 flex flex-col lg:flex-row items-center gap-10">
      <div class="lg:w-1/2">
        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
          Jajan penuh rasa. <span class="text-orange-500">Penuh cerita.</span>
        </h1>
        <p class="mt-5 text-gray-700 max-w-2xl">
          Good Food. Good Mood
        </p>

        <div class="mt-8 flex flex-wrap gap-3">
          <a href="{{ url('/katalog') }}" class="btn btn-primary">Lihat Produk</a>
          <a href="{{ url('/tentang') }}" class="btn btn-outline">Tentang Kami</a>
        </div>
      </div>

      {{-- Hero Image --}}
      <div class="lg:w-1/2">
        <div class="relative">
          <img src="{{ asset('images/hero 2.svg') }}" 
               alt="Hero Image" 
               class="w-full max-w-lg mx-auto drop-shadow-2xl">
        </div>
      </div>
    </div>
  </section>

  {{-- SECTION USP / Keunggulan --}}
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-12">Kenapa Pilih Kami?</h2>
      <div class="grid md:grid-cols-3 gap-8">

        <!-- Bahan Pilihan -->
        <div class="feature-card p-8 rounded-2xl text-center bg-white shadow-md hover:shadow-xl transition">
          <div class="flex justify-center mb-4">
            <span class="material-symbols-outlined text-green-600 text-6xl">
              restaurant_menu
            </span>
          </div>
          <h4 class="font-bold text-lg">Bahan Pilihan</h4>
          <p class="mt-2 text-sm text-gray-600">Menggunakan bahan segar & berkualitas setiap hari.</p>
        </div>

        <!-- Harga Bersahabat -->
        <div class="feature-card p-8 rounded-2xl text-center bg-white shadow-md hover:shadow-xl transition">
          <div class="flex justify-center mb-4">
            <span class="material-symbols-outlined text-yellow-600 text-6xl">
              payments
            </span>
          </div>
          <h4 class="font-bold text-lg">Harga Bersahabat</h4>
          <p class="mt-2 text-sm text-gray-600">Harga terjangkau tanpa mengurangi kualitas rasa.</p>
        </div>

        <!-- Kebersihan & Keamanan -->
        <div class="feature-card p-8 rounded-2xl text-center bg-white shadow-md hover:shadow-xl transition">
          <div class="flex justify-center mb-4">
            <span class="material-symbols-outlined text-blue-600 text-6xl">
              health_and_safety
            </span>
          </div>
          <h4 class="font-bold text-lg">Kebersihan & Keamanan</h4>
          <p class="mt-2 text-sm text-gray-600">Proses higienis & kemasan eco-friendly yang aman.</p>
        </div>

      </div>
    </div>
  </section>

  {{-- SECTION TESTIMONIAL --}}
  <section class="py-16">
    <div class="container mx-auto px-6">
      <h3 class="text-3xl font-bold text-center">Apa kata pelanggan</h3>
      <div id="testimonialCarousel" class="mt-8 carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="p-6 bg-white rounded-xl shadow-md text-center max-w-2xl mx-auto">
              <p class="italic">"Brownies nya enak yaf😋 rasa manisnya pas, sensasi lembut browniesnya waktu digigit bikin nagih jadi pengen beli lagi 🤤 MANTEPLAHH"</p>
              <div class="mt-3 font-bold">- Maudy Ari</div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="p-6 bg-white rounded-xl shadow-md text-center max-w-2xl mx-auto">
              <p class="italic">"Rasane enak, pas, isine juga lumayan banyak, murah juga buat anak sekolah. Worth it banget si!"</p>
              <div class="mt-3 font-bold">- Inez Raisya</div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </section>
@endsection
