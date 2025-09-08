@extends('admin.layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
    <h1 class="mb-4">Daftar Karyawan</h1>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.employees.create') }}" class="btn btn-primary mb-3">+ Tambah Karyawan</a>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ ucfirst($employee->role) }}</td>
                            <td>{{ $employee->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.employees.show', $employee->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus karyawan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data karyawan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection
