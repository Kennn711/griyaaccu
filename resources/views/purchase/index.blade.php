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
                                <th>Kode</th>
                                <th>Tanggal Pembelian</th>
                                <th>Jatuh Tempo Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Detail Pembelian</th>
                                <th>Status Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchase as $see)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $see->purchase_code }}</td>
                                <td>{{ $see->purchase_date }}</td>
                                <td>{{ $see->due_date }}</td>
                                <td>{{ $see->payment_date ?? 'Belum Dibayar' }}</td>
                                <td>
                                    @php
                                        $detailModal = 'detailModal-' . $see->id;
                                    @endphp
                                    <button class="btn btn-lg btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#{{ $detailModal }}">
                                        <i class="fi-br-description-alt"></i>
                                    </button>

                                    {{-- Modal Detail Purchase --}}
                                    <div class="modal fade" id="{{ $detailModal }}" tabindex="-1" aria-labelledby="{{ $detailModal }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Pembelian {{ $see->purchase_code }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6>Tanggal Pembelian</h3>
                                                                <p>{{ $see->purchase_date }}</p>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <h6>Jatuh Tempo</h6>
                                                            <p>{{ $see->due_date }}</p>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <h6>Tanggal Pembayaran</h6>
                                                            <p>{{ $see->payment_date ?? 'Belum dibayar' }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="card invisible">
                                                            <div class="card-body">
                                                                <table class="table visible">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Nama Accu</th>
                                                                            <th>Quantity</th>
                                                                            <th>Harga Satuan</th>
                                                                            <th>Subtotal</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($see->purchasedetail as $seeDetail)
                                                                            <tr>
                                                                                <td>{{ $loop->iteration }}</td>
                                                                                <td>{{ $seeDetail->accu->accu_name }} {{ $seeDetail->accu->type->type_name }}</td>
                                                                                <td>{{ $seeDetail->quantity }}</td>
                                                                                <td>Rp {{ number_format($seeDetail->price, 0, ',', '.') }}</td>
                                                                                <td>Rp {{ number_format($seeDetail->price * $seeDetail->quantity, 0, ',', '.') }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    Alok
                                </td>
                            @empty
                                <td colspan="7">Tidak ada Riwayat Pembelian</td>
                            @endforelse
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="addModalPurchase" tabindex="-1" aria-labelledby="addModalPurchaseLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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

                        <div id="dynamicFields"></div>

                        <div class="form-group mb-3 mt-3">
                            <label for="purchase_date">Tanggal Pembelian</label>
                            <input type="date" id="purchase_date" class="form-control" name="purchase_date">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label for="due_date">Tanggal Jatuh Tempo</label>
                            <input type="date" id="due_date" class="form-control" name="due_date">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="total_discount">Diskon (%)</label>
                                    <input type="number" id="total_discount" name="total_discount" class="form-control" value="0">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="subtotal_ppn">PPN (%)</label>
                                    <input type="number" id="subtotal_ppn" name="subtotal_ppn" class="form-control" value="11">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="grand_total">Total Akhir</label>
                                    <input type="text" id="grand_total" name="grand_total" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Simpan Pembelian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let fieldIndex = 0;

            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(angka);
            }

            function calculateTotal() {
                let subtotal = 0;

                $('input[name="quantity[]"]').each(function(index) {
                    let qty = parseFloat($(this).val()) || 0;
                    let price = parseFloat($('input[name="price[]"]').eq(index).val()) || 0;
                    subtotal += qty * price;
                });

                let discountPercent = parseFloat($('#total_discount').val()) || 0;
                let ppnPercent = parseFloat($('#subtotal_ppn').val()) || 0;

                let discountAmount = subtotal * (discountPercent / 100);
                let afterDiscount = subtotal - discountAmount;
                let ppnAmount = afterDiscount * (ppnPercent / 100);
                let finalTotal = afterDiscount + ppnAmount;

                $('#grand_total').val(formatRupiah(finalTotal));
            }

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
                    <input type="number" name="quantity[]" id="quantity_${fieldIndex}" class="form-control quantity">
                </div>

                <div class="col-md-3">
                    <label for="price_${fieldIndex}">Harga</label>
                    <input type="number" name="price[]" id="price_${fieldIndex}" class="form-control price">
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
                calculateTotal();
            });

            // Live hitung saat inputan quantity/price/diskon/ppn berubah
            $(document).on('input', 'input[name="quantity[]"], input[name="price[]"], #total_discount, #subtotal_ppn', function() {
                calculateTotal();
            });
        });
    </script>
@endpush
