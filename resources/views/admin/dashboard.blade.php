@extends('admin.layouts.app')

@section('title','Dashboard Admin')

@section('content')
  <h1 class="page-title">Dashboard</h1>

  <div class="grid grid-3">
    <div class="card">
      <div class="card-title">Total Pesanan</div>
      <div class="card-value">{{ $totalOrders ?? 0 }}</div>
    </div>
    <div class="card">
      <div class="card-title">Total Penjualan</div>
      <div class="card-value">Rp {{ number_format($totalSales ?? 0,0,',','.') }}</div>
    </div>
    <div class="card">
      <div class="card-title">Produk Stok Rendah</div>
      <div class="card-value">{{ $lowStock ?? 0 }}</div>
    </div>
  </div>

  <section class="panel">
    <h2>Pesanan Terbaru</h2>
    <table class="table">
      <thead>
        <tr><th>No</th><th>Pelanggan</th><th>Total</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr>
      </thead>
      <tbody>
        @foreach($recentOrders as $o)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $o->customer->name }}</td>
            <td>Rp {{ number_format($o->total,0,',','.') }}</td>
            <td><span class="badge status-{{ Str::slug($o->status) }}">{{ $o->status }}</span></td>
            <td>{{ $o->order_date->format('d M Y H:i') }}</td>
            <td><a class="btn-sm" href="{{ route('admin.orders.show',$o->id) }}">Lihat</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>
@endsection
