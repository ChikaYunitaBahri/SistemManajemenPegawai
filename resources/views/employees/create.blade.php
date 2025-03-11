@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
    <div class="card">
        <div class="card-header" style="text-align: center; background-color: steelblue; color: white;">Tambah Pegawai</div>
        <div class="card-body">
            <form action="{{ route('tambah.pegawai') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="position" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gaji</label>
                    <input type="number" name="salary" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('tampilan.pegawai') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
@endsection