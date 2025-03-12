@extends('layouts.app')

@section('title', 'Daftar Pegawai')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Pegawai</h2>
        <a href="{{ route('tampilan.tambah') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pegawai
        </a>
    </div>

    <div class="mb-3">
        <input type="text" id="search" class="form-control" placeholder="Cari Pegawai..." onkeyup="searchTable()">
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center align-middle shadow-sm" id="employeeTable">
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
                        <td>Rp {{ number_format($employee->salary, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('tampilan.edit', $employee->id) }}" class="btn btn-warning btn-sm text-white">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $employee->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="delete-form-{{ $employee->id }}" action="{{ route('hapus.destroy', $employee->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus pegawai ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(employeeId) {
            const deleteForm = document.getElementById(`delete-form-${employeeId}`);
            const deleteBtn = document.getElementById('confirmDeleteBtn');

            deleteBtn.onclick = function () {
                deleteForm.submit();
            };

            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        function searchTable() {
            let input = document.getElementById("search").value.toLowerCase();
            let table = document.getElementById("employeeTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let name = rows[i].getElementsByTagName("td")[0];
                if (name) {
                    let textValue = name.textContent || name.innerText;
                    rows[i].style.display = textValue.toLowerCase().indexOf(input) > -1 ? "" : "none";
                }
            }
        }
    </script>
@endsection
