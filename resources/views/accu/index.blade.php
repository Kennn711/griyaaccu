@extends('templates/index')
@section('content')
    <div class="row justify-content-center">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="col-md-2">
                <input type="text" class="form-control" placeholder="Cari Accu">
            </div>
            <button class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#addModalAccu">Tambah</button>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Accu</th>
                                <th>Tipe Accu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($accu as $see)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $see->accu_name }}</td>
                                    <td>{{ $see->type->type_name }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-md btn-warning editBtnModal" data-id="{{ $see->id }}" data-name="{{ $see->accu_name }}" data-type="{{ $see->type_id }}" data-bs-toggle="modal" data-bs-target="#editModalAccu">
                                                Ubah
                                            </button>

                                            <form action="{{ route('accu.destroy', $see->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-md btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addModalAccu" tabindex="-1" aria-labelledby="addModalAccuLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Aki</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <form action="{{ route('accu.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="accu_name_add" class="form-label">Nama Aki</label>
                            <input type="text" class="form-control" name="accu_name" id="accu_name_add" placeholder="Masukkan nama accu">
                        </div>

                        <div class="form-group mb-3">
                            <label for="accu_type" class="form-label">Tipe Aki</label>
                            <select name="type_id" id="accu_type" class="form-control">
                                <option disabled selected>-- Pilih Tipe --</option>
                                @forelse ($type as $see)
                                    <option value="{{ $see->id }}">{{ $see->type_name }}</option>
                                @empty
                                    <option disabled>Tidak ada tipe tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <!-- Modal Edit Accu -->
    <div class="modal fade" id="editModalAccu" tabindex="-1" aria-labelledby="editModalAccuLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Aki</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="accu_name_edit" class="form-label">Nama Aki</label>
                            <input type="text" class="form-control" name="accu_name" id="accu_name_edit">
                        </div>
                        <div class="mb-3">
                            <label for="type_id_edit" class="form-label">Tipe Aki</label>
                            <select name="type_id" id="type_id_edit" class="form-control">
                                @foreach ($type as $item)
                                    <option value="{{ $item->id }}">{{ $item->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning w-100">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.editBtnModal').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const typeId = this.dataset.type;

                const form = document.getElementById('editForm');
                form.action = `/accu/${id}`; // sesuaikan jika pakai route name

                document.getElementById('accu_name_edit').value = name;
                document.getElementById('type_id_edit').value = typeId;
            });
        });
    </script>
@endpush
