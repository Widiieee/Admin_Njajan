@extends('admin.layouts.app')

@section('title','Produk')

@section('content')
  <div class="page-actions">
    <h1>Produk</h1>
    <a href="{{ route('admin.products.create') }}" class="btn">Tambah Produk</a>
  </div>

  <table class="table">
    <thead>
      <tr><th>No</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Producer</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      @foreach($products as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->name }}</td>
          <td>Rp {{ number_format($p->price,0,',','.') }}</td>
          <td>{{ $p->stock }}</td>
          <td>{{ $p->producer }}</td>
          <td>
            <a class="btn-sm" href="{{ route('admin.products.edit',$p->id) }}">Edit</a>
            <form action="{{ route('admin.products.destroy',$p->id) }}" method="POST" style="display:inline">
              @csrf @method('DELETE')
              <button class="btn-sm btn-danger" onclick="return confirm('Hapus produk?')">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
