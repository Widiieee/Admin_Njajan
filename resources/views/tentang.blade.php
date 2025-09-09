@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">

  {{-- Judul Halaman --}}
  <h2 class="text-4xl font-bold text-center text-[#FF4C4C] mb-12">
    Tentang Kami
  </h2>

  {{-- Profil Perusahaan --}}
  <div class="mb-16 text-center max-w-3xl mx-auto">
    <p class="text-lg leading-relaxed text-gray-700">
      <span class="font-bold text-[#FF4C4C]">Njajan</span> terinspirasi dari istilah bahasa Jawa “jajan” yang berarti membeli atau menikmati makanan ringan. Nama ini dipilih untuk mencerminkan semangat lokal sekaligus menghadirkan kesan akrab dan mudah diingat. Berlokasi di Banjarnegara, Njajan merupakan usaha mikro yang bergerak di bidang produksi dan distribusi makanan ringan. Melalui brand ini, Njajan berkomitmen menyediakan jajanan yang higienis, berkualitas, inovatif, dan terjangkau bagi semua kalangan, serta memberikan layanan yang ramah dan profesional kepada setiap pelanggan.
    </p>
  </div>

  {{-- Visi & Misi Interaktif --}}
  <div class="mb-16">
    <div class="space-y-6">
      <!-- Visi Accordion -->
      <div class="border rounded-2xl shadow-sm overflow-hidden">
        <button onclick="toggleAccordion('visi')" class="w-full px-6 py-4 flex justify-between items-center bg-[#FFB22C] text-white font-bold text-lg">
          Visi
          <span id="icon-visi" class="transform transition-transform">+</span>
        </button>
        <div id="content-visi" class="hidden px-6 py-4 text-gray-700 text-lg leading-relaxed">
          Menjadi usaha mikro yang menyediakan jajanan berkualitas, terjangkau, dan mudah diakses di lingkungan masyarakat.
        </div>
      </div>

      <!-- Misi Accordion -->
      <div class="border rounded-2xl shadow-sm overflow-hidden">
        <button onclick="toggleAccordion('misi')" class="w-full px-6 py-4 flex justify-between items-center bg-[#FFB22C] text-white font-bold text-lg">
          Misi
          <span id="icon-misi" class="transform transition-transform">+</span>
        </button>
        <div id="content-misi" class="hidden px-6 py-4 text-gray-700 text-lg leading-relaxed">
          <ul class="list-disc list-inside space-y-2">
            <li>Menyediakan aneka makanan ringan yang layak konsumsi dan terjangkau.</li>
            <li>Menjaga kebersihan dan keamanan pangan sesuai standar.</li>
            <li>Menjaga kepercayaan pelanggan dengan pelayanan yang jujur dan ramah.</li>
            <li>Mengelola usaha secara rapi, efisien, dan bertanggung jawab.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  {{-- Tim Njajan --}}
  <div class="mt-20">
    <h3 class="text-3xl font-extrabold text-center text-[#FFB22C] mb-8">
      Tim Njajan
    </h3>

    <div class="relative max-w-5xl mx-auto">
      <!-- Swiper Container -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          {{-- Member list --}}
          <div class="swiper-slide flex flex-col items-center text-center">
            <img src="{{ asset('images/YAFI.svg') }}" alt="Yafi" class="rounded-xl shadow-lg w-48 md:w-56 lg:w-64">
            <p class="mt-4 font-semibold text-lg text-gray-800">Yafi Alifia Zahida</p>
            <span class="text-sm text-gray-500">CEO</span>
          </div>

          <div class="swiper-slide flex flex-col items-center text-center">
            <img src="{{ asset('images/WIDI.svg') }}" alt="Widi" class="rounded-xl shadow-lg w-48 md:w-56 lg:w-64">
            <p class="mt-4 font-semibold text-lg text-gray-800">Widiatri Nur Zahra</p>
            <span class="text-sm text-gray-500">Kepala Manager</span>
          </div>

          <div class="swiper-slide flex flex-col items-center text-center">
            <img src="{{ asset('images/VIA.svg') }}" alt="Via" class="rounded-xl shadow-lg w-48 md:w-56 lg:w-64">
            <p class="mt-4 font-semibold text-lg text-gray-800">Alviana Maysaroh</p>
            <span class="text-sm text-gray-500">Manager Keuangan</span>
          </div>

          <div class="swiper-slide flex flex-col items-center text-center">
            <img src="{{ asset('images/ANGEL.svg') }}" alt="Angel" class="rounded-xl shadow-lg w-48 md:w-56 lg:w-64">
            <p class="mt-4 font-semibold text-lg text-gray-800">Angel Christina Grace</p>
            <span class="text-sm text-gray-500">Manager Pemasaran</span>
          </div>

          <div class="swiper-slide flex flex-col items-center text-center">
            <img src="{{ asset('images/NAVIS.svg') }}" alt="Navis" class="rounded-xl shadow-lg w-48 md:w-56 lg:w-64">
            <p class="mt-4 font-semibold text-lg text-gray-800">Navis Vasha Pratama</p>
            <span class="text-sm text-gray-500">Manager Logistik</span>
          </div>

          <div class="swiper-slide flex flex-col items-center text-center">
            <img src="{{ asset('images/ALVIAN.svg') }}" alt="Alvian" class="rounded-xl shadow-lg w-48 md:w-56 lg:w-64">
            <p class="mt-4 font-semibold text-lg text-gray-800">M. Alvian Putra Pratama</p>
            <span class="text-sm text-gray-500">Manager SDM</span>
          </div>
        </div>

        <!-- Tombol navigasi -->
        <div class="swiper-button-next !text-[#FF4C4C]"></div>
        <div class="swiper-button-prev !text-[#FF4C4C]"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
  {{-- Swiper CSS --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <style>
    .swiper {
      padding-bottom: 50px; /* ruang nama */
    }
    .swiper-slide {
      transition: transform 0.6s ease, opacity 0.6s ease;
    }
  </style>
@endpush

@push('scripts')
  {{-- Swiper JS --}}
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper(".mySwiper", {
      loop: true,
      centeredSlides: true,
      slidesPerView: 3,
      spaceBetween: 30,
      speed: 800,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      effect: "coverflow",
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 150,
        modifier: 1,
        slideShadows: false,
      },
      breakpoints: {
        320: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      }
    });

    // Accordion
    function toggleAccordion(id) {
      const content = document.getElementById("content-" + id);
      const icon = document.getElementById("icon-" + id);

      if (content.classList.contains("hidden")) {
        content.classList.remove("hidden");
        icon.textContent = "−";
      } else {
        content.classList.add("hidden");
        icon.textContent = "+";
      }
    }
  </script>
@endpush
