@extends('admin.layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <h1 class="mb-4">Tambah Produk</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" name="name" id="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number" name="price" id="price" 
                           class="form-control @error('price') is-invalid @enderror" 
                           value="{{ old('price') }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" name="stock" id="stock" 
                           class="form-control @error('stock') is-invalid @enderror" 
                           value="{{ old('stock') }}" required>
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="producer" class="form-label">Produsen</label>
                    <input type="text" name="producer" id="producer" 
                           class="form-control @error('producer') is-invalid @enderror" 
                           value="{{ old('producer') }}" required>
                    @error('producer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
