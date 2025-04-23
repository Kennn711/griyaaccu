<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span>
        @if (Route::currentRouteName() == 'accu.index')
            Data Accu
        @endif

        @if (Route::currentRouteName() == 'type.index')
            Data Tipe Accu
        @endif

        @if (Route::currentRouteName() == 'inventory.index')
            Catatan Barang
        @endif

        @if (Route::currentRouteName() == 'purchase.index')
            Transaksi Pembelian
        @endif

        @if (Route::currentRouteName() == 'dashboard.index')
            Dashboard
        @endif
    </h3>
</div>
