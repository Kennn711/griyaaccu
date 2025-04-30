<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Griya Accu</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets') }}/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/assets/images/favicon.png" />

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    {{-- UI Icons --}}
    <link rel="stylesheet" href="{{ asset('assets/uicons-bold-rounded/css/uicons-bold-rounded.css') }}">
</head>

<body>
    <div class="container-scroller">
        @include('templates/partial/navbar')
        <div class="container-fluid page-body-wrapper">
            {{-- Sidebar --}}
            @include('templates/partial/sidebar')
            {{-- Sidebar --}}

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('templates/partial/breadcumb')

                    @yield('content')

                </div>
                <!-- content-wrapper ends -->
                @include('templates/partial/copyright')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('templates/partial/script')
</body>

</html>
