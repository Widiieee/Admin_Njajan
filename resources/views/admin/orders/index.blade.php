@extends('admin.layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
    <h1 class="mb-4">Daftar Pesanan</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer->name ?? '-' }}</td>
                            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status == 'Sudah Bayar') bg-success
                                    @elseif($order->status == 'Belum Bayar') bg-warning
                                    @else bg-secondary @endif">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                    Detail
                                </a>

                                @if(auth()->user()->role && auth()->user()->role->name === 'Manager Keuangan' && $order->status !== 'Sudah Bayar')
                                    <form action="{{ route('admin.orders.confirmPayment', $order->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Konfirmasi Bayar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada pesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
