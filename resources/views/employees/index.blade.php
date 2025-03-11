@extends('layouts.app')

@section('title', 'Employee List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Pegawai</h2>
        <a href="{{ route('tampilan.tambah') }}" class="btn btn-primary">Tambah Pegawai</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center align-middle shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>Rp {{ number_format($employee->salary, 2) }}</td>
                        <td>
                            <a href="{{ route('tampilan.edit', $employee->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                            <form action="{{ route('hapus.destroy', $employee->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
