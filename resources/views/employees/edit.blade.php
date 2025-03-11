@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <div class="card">
        <div class="card-header" style="text-align: center; background-color: steelblue; color: white;">Edit Employee</div>
        <div class="card-body">
            <form action="{{ route('edit.pegawai' , $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gaji</label>
                    <input type="number" name="salary" class="form-control" value="{{ $employee->salary }}" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route ('tampilan.pegawai') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
@endsection