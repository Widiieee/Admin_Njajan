<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Njajan - @yield('title')</title>

  <!-- Tailwind (CDN, dev) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Bootstrap CSS (for components/utilities) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Google Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

  <!-- Alpine.js -->
  <script src="//unpkg.com/alpinejs" defer></script>

  {{-- Stack untuk halaman yang butuh tambahan di <head> --}}
  @stack('head')

  {{-- Stack khusus style tambahan (misalnya Swiper CSS) --}}
  @stack('styles')
</head>
<body class="bg-gradient-to-br from-sky-50 via-orange-50 to-green-50 text-gray-800">

  {{-- NAVBAR --}}
  <header class="bg-white/90 backdrop-blur-sm fixed w-full z-50 shadow-sm">
    <div class="container mx-auto flex items-center justify-between py-3 px-4">
      <a href="{{ url('/') }}" class="flex items-center gap-3">
        <div class="logo w-10 h-10 rounded-full flex items-center justify-center font-extrabold text-white text-lg">N</div>
        <span class="text-xl font-bold text-sky-600">Njajan</span>
      </a>

      <nav class="hidden md:flex items-center gap-6">
        <a href="{{ url('/') }}" class="nav-link">Beranda</a>
        <a href="{{ url('/tentang') }}" class="nav-link">Tentang</a>
        <a href="{{ url('/katalog') }}" class="nav-link">Produk</a>
        <a href="{{ url('/struktur') }}" class="nav-link">Struktur</a>
        <a href="{{ url('/kontak') }}" class="nav-link">Kontak</a>
      </nav>

      <div class="flex items-center gap-3">
        <!-- Mobile hamburger -->
        <button id="btn-mobile" class="md:hidden p-2 rounded-md focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white/95 border-t">
      <div class="container mx-auto px-4 py-4 flex flex-col gap-3">
        <a href="{{ url('/tentang') }}" class="mobile-link">Tentang</a>
        <a href="{{ url('/katalog') }}" class="mobile-link">Katalog</a>
        <a href="{{ url('/struktur') }}" class="mobile-link">Struktur</a>
        <a href="{{ url('/kontak') }}" class="mobile-link">Kontak</a>
      </div>
    </div>
  </header>

  {{-- CONTENT --}}
  <main class="pt-24">
    @yield('content')
  </main>

  {{-- FOOTER --}}
  <footer class="mt-16 bg-gray-900 text-white">
    <div class="container mx-auto px-6 py-10 grid md:grid-cols-3 gap-6">
      <div>
        <h4 class="text-xl font-bold">Njajan</h4>
        <p class="mt-2 text-sm text-gray-300">Jajan bukan sekadar makanan — tapi pengalaman.</p>
      </div>
      <div>
        <h5 class="font-semibold">Tautan</h5>
        <ul class="mt-3 space-y-2 text-sm text-gray-300">
          <li><a href="{{ url('/tentang') }}">Tentang</a></li>
          <li><a href="{{ url('/katalog') }}">Katalog</a></li>
          <li><a href="{{ url('/struktur') }}">Struktur</a></li>
          <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        </ul>
      </div>
      <div>
        <h5 class="font-semibold">Subscribe</h5>
        <form id="subscribeForm" class="mt-3 flex gap-2">
          <input type="email" name="email" placeholder="Emailmu" class="form-input flex-1" required>
          <button class="btn btn-primary" type="submit">Kirim</button>
        </form>
      </div>
    </div>
    <div class="text-center py-4 text-sm bg-black/20">
      &copy; {{ date('Y') }} Njajan. All rights reserved.
    </div>
  </footer>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS -->
  <script src="{{ asset('js/main.js') }}"></script>

  {{-- Stack untuk script tambahan (misalnya Swiper JS) --}}
  @stack('scripts')
</body>
</html>
