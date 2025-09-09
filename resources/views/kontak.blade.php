@extends('layouts.app')

@section('title','Kontak')

@section('content')
<section class="py-20 bg-[#F3FEB8]">
  <div class="container mx-auto px-6 flex justify-center">
    
    <!-- Informasi Kontak -->
    <div class="w-full max-w-xl">
      <div class="p-8 rounded-2xl shadow-xl bg-[#FFDE4D]">
        <h3 class="text-3xl font-bold text-center text-[#FF4C4C] mb-8">
          Hubungi Kami
        </h3>
        
        <div class="space-y-6">
          <!-- Email -->
          <a href="mailto:info@njajan.com" 
             class="flex items-center gap-4 p-4 rounded-xl bg-white hover:bg-[#FFB22C]/20 transition transform hover:scale-105">
            <i class="fas fa-envelope text-2xl text-[#FF4C4C]"></i>
            <div>
              <p class="font-semibold text-gray-800">Email</p>
              <p class="text-sm text-gray-600">info@njajan.com</p>
            </div>
          </a>

          <!-- Instagram -->
          <a href="https://instagram.com/njajan.mayo" target="_blank" 
             class="flex items-center gap-4 p-4 rounded-xl bg-white hover:bg-[#FFB22C]/20 transition transform hover:scale-105">
            <i class="fab fa-instagram text-2xl text-[#FF4C4C]"></i>
            <div>
              <p class="font-semibold text-gray-800">Instagram</p>
              <p class="text-sm text-gray-600">@njajan.mayo</p>
            </div>
          </a>

          <!-- WhatsApp -->
          <a href="https://wa.me/6285227017999" target="_blank" 
             class="flex items-center gap-4 p-4 rounded-xl bg-white hover:bg-[#FFB22C]/20 transition transform hover:scale-105">
            <i class="fab fa-whatsapp text-2xl text-[#FF4C4C]"></i>
            <div>
              <p class="font-semibold text-gray-800">WhatsApp</p>
              <p class="text-sm text-gray-600">+62 852-2701-7999</p>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
@endsection
