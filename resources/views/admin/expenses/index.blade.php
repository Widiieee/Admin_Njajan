@extends('admin.layouts.app')

@section('title', 'Daftar Pengeluaran')

@section('content')
    <h1 class="mb-4">Daftar Pengeluaran</h1>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.expenses.create') }}" class="btn btn-primary mb-3">+ Tambah Pengeluaran</a>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Dibuat Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>{{ $expense->id }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>Rp {{ number_format($expense->amount, 0, ',', '.') }}</td>
                            <td>{{ $expense->created_at->format('d M Y H:i') }}</td>
                            <td>{{ $expense->user->name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.expenses.show', $expense->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('admin.expenses.edit', $expense->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('admin.expenses.destroy', $expense->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data pengeluaran</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $expenses->links() }}
            </div>
        </div>
    </div>
@endsection
