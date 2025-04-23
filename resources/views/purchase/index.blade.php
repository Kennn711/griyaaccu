@extends('templates/index')

@section('content')
    <div class="row justify-content-center">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="col-md-2">
                <input type="text" class="form-control" placeholder="Cari Accu">
            </div>
            <button class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#addModalPurchase">Tambah</button>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Accu</th>
                                <th>Tanggal Pembelian</th>
                                <th>Jatuh Tempo Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah Barang</th>
                                <th>Status Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addModalPurchase" tabindex="-1" aria-labelledby="addModalPurchaseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Catatan Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <form action="{{ route('purchase.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="accu_name_add" class="form-label">Pilih Accu</label>
                            <select name="accu_id" class="form-control">
                                <option selected disabled>-- Pilih Accu --</option>
                                @forelse ($accu as $seeAccu)
                                    <option value="{{ $seeAccu->id }}">{{ $seeAccu->accu_name }} {{ $seeAccu->type->type_name }}</option>
                                @empty
                                    <option disabled>Tidak ada data accu yang tersedia</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="quantity">Jumlah Accu yang dibeli</label>
                            <input type="number" id='quantity' class="form-control" name="quantity">
                        </div>

                        <div class="form-group mb-3">
                            <label for="due_date">Tanggal Jatuh Tempo</label>
                            <input type='date' id='due_date' class="form-control" name="due_date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
