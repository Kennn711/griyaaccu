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
                                <th>Kode Pembelian</th>
                                <th>Tanggal Pembelian</th>
                                <th>Jatuh Tempo Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Total Barang</th>
                                <th>Detail Pembelian</th>
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

    <!-- Modal Add -->
    <div class="modal fade" id="addModalPurchase" tabindex="-1" aria-labelledby="addModalPurchaseLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Supaya modal lebih lebar -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Catatan Pembelian</h5>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <form action="{{ route('purchase.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="text-end my-3">
                            <button type="button" class="btn btn-md btn-success btn-sm" id="addField">
                                +
                            </button>
                        </div>

                        <div id="dynamicFields"></div> <!-- Tempat Accu Quantity Price baru -->

                        <div class="form-group mb-3 mt-3">
                            <label for="due_date">Tanggal Jatuh Tempo</label>
                            <input type="date" id="due_date" class="form-control" name="due_date">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Simpan Pembelian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Detail Purchase -->
    <div class="modal fade" id="pur" tabindex="-1" aria-labelledby="purLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let fieldIndex = 0;

            $('#addField').click(function() {
                fieldIndex++;

                let fieldGroup = `
                <div class="row mb-2 align-items-end" data-index="${fieldIndex}">
                    <div class="col-md-4">
                        <label for="accu_id_${fieldIndex}">Pilih Accu</label>
                        <select name="accu_id[]" id="accu_id_${fieldIndex}" class="form-control">
                            <option selected disabled>-- Pilih Accu --</option>
                            @foreach ($accu as $seeAccu)
                                <option value="{{ $seeAccu->id }}">{{ $seeAccu->accu_name }} {{ $seeAccu->type->type_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="quantity_${fieldIndex}">Jumlah</label>
                        <input type="number" name="quantity[]" id="quantity_${fieldIndex}" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label for="price_${fieldIndex}">Harga</label>
                        <input type="number" name="price[]" id="price_${fieldIndex}" class="form-control">
                    </div>

                    <div class="col-md-1 text-center">
                        <button type="button" class="btn btn-danger btn-sm removeField" style="margin-top:32px;" title="Hapus">
                            &times;
                        </button>
                    </div>
                </div>
            `;

                $('#dynamicFields').append(fieldGroup);
            });

            $(document).on('click', '.removeField', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>
@endpush
