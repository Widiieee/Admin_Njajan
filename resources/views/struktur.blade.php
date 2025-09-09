@extends('layouts.app')

@section('title','Struktur')

@section('content')
<section class="py-20 bg-gradient-to-r from-sky-50 via-green-50 to-orange-50">
  <div class="container mx-auto px-6" x-data="{ openModal: false, selected: {} }">
    <h2 class="text-3xl font-bold text-center mb-12">Struktur Organisasi Njajan</h2>

    <div class="flex flex-col items-center">

      <!-- CEO -->
      <div 
        class="org-card p-8 bg-white rounded-2xl shadow-xl text-center hover:scale-105 transition duration-300 cursor-pointer"
        @click="selected = { jabatan: 'CEO', nama: 'Yafi Alifia Zahida', foto: '{{ asset('images/CEO.svg') }}', deskripsi: 'CEO bertanggung jawab penuh terhadap arah kebijakan perusahaan.' }; openModal = true"
      >
        <img src="{{ asset('images/CEO.svg') }}" class="w-28 h-28 rounded-full mx-auto object-cover shadow-md" alt="CEO">
        <h4 class="mt-4 font-bold text-xl">CEO</h4>
        <p class="text-gray-600">Yafi Alifia Zahida</p>
      </div>

      <!-- Kepala Manager -->
      <div 
        class="mt-12 org-card p-8 bg-white rounded-2xl shadow-xl text-center hover:scale-105 transition duration-300 cursor-pointer"
        @click="selected = { jabatan: 'Kepala Manager', nama: 'Widiatri Nur Zahra', foto: '{{ asset('images/Kepala_Manager.svg') }}', deskripsi: 'Mengkoordinasikan para manager di bawahnya.' }; openModal = true"
      >
        <img src="{{ asset('images/Kepala_Manager.svg') }}" class="w-24 h-24 rounded-full mx-auto object-cover shadow-md" alt="Kepala Manager">
        <h4 class="mt-4 font-bold text-lg">Kepala Manager</h4>
        <p class="text-gray-600">Widiatri Nur Zahra</p>
      </div>

      <!-- Manager Grid -->
      <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-8 mt-12 w-full">

        <!-- Keuangan -->
        <div 
          class="org-card p-6 bg-white rounded-2xl shadow-lg text-center hover:scale-105 transition duration-300 cursor-pointer"
          @click="selected = { jabatan: 'Manager Keuangan', nama: 'Alviana Maysaroh', foto: '{{ asset('images/Manager_Keuangan.svg') }}', deskripsi: 'Mengelola keuangan dan laporan perusahaan.' }; openModal = true"
        >
          <img src="{{ asset('images/Manager_Keuangan.svg') }}" class="w-20 h-20 rounded-full mx-auto object-cover shadow-md" alt="Keuangan">
          <h4 class="mt-3 font-semibold">Manager Keuangan</h4>
          <p class="text-gray-600">Alviana Maysaroh</p>
        </div>

        <!-- Pemasaran -->
        <div 
          class="org-card p-6 bg-white rounded-2xl shadow-lg text-center hover:scale-105 transition duration-300 cursor-pointer"
          @click="selected = { jabatan: 'Manager Pemasaran', nama: 'Angel Christina Grace', foto: '{{ asset('images/Manager_Pemasaran.svg') }}', deskripsi: 'Bertanggung jawab terhadap strategi pemasaran.' }; openModal = true"
        >
          <img src="{{ asset('images/Manager_Pemasaran.svg') }}" class="w-20 h-20 rounded-full mx-auto object-cover shadow-md" alt="Pemasaran">
          <h4 class="mt-3 font-semibold">Manager Pemasaran</h4>
          <p class="text-gray-600">Angel Christina Grace</p>
        </div>

        <!-- SDM -->
        <div 
          class="org-card p-6 bg-white rounded-2xl shadow-lg text-center hover:scale-105 transition duration-300 cursor-pointer"
          @click="selected = { jabatan: 'Manager SDM', nama: 'M. Alvian Putra Pratama', foto: '{{ asset('images/Manager_SDM.svg') }}', deskripsi: 'Mengatur perekrutan dan kesejahteraan karyawan.' }; openModal = true"
        >
          <img src="{{ asset('images/Manager_SDM.svg') }}" class="w-20 h-20 rounded-full mx-auto object-cover shadow-md" alt="SDM">
          <h4 class="mt-3 font-semibold">Manager SDM</h4>
          <p class="text-gray-600">M. Alvian Putra Pratama</p>
        </div>

        <!-- Logistik -->
        <div 
          class="org-card p-6 bg-white rounded-2xl shadow-lg text-center hover:scale-105 transition duration-300 cursor-pointer"
          @click="selected = { jabatan: 'Manager Logistik', nama: 'Naviz Fasha Pratama', foto: '{{ asset('images/Manager_Logistik.svg') }}', deskripsi: 'Mengelola distribusi dan logistik perusahaan.' }; openModal = true"
        >
          <img src="{{ asset('images/Manager_Logistik.svg') }}" class="w-20 h-20 rounded-full mx-auto object-cover shadow-md" alt="Logistik">
          <h4 class="mt-3 font-semibold">Manager Logistik</h4>
          <p class="text-gray-600">Naviz Fasha Pratama</p>
        </div>

      </div>
    </div>

    <!-- Modal -->
    <div x-show="openModal" 
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" 
         x-transition>
      <div class="bg-white p-6 rounded-2xl shadow-lg max-w-md text-center relative">
        <button @click="openModal = false" class="absolute top-3 right-3 text-gray-500 hover:text-red-500">✕</button>
        <img :src="selected.foto" class="w-28 h-28 rounded-full mx-auto object-cover shadow-md" alt="Foto">
        <h3 class="mt-4 font-bold text-xl" x-text="selected.jabatan"></h3>
        <p class="text-gray-600 font-medium" x-text="selected.nama"></p>
        <p class="text-gray-500 mt-3 text-sm" x-text="selected.deskripsi"></p>
      </div>
    </div>

  </div>
</section>
@endsection
