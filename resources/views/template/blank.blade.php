<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>@yield('title') | SireGas</title>

    @include('template.sc_head')
    <link rel="stylesheet" href="{{ asset('dashmin/css/custom.css') }}">

</head>

<body>
    <div class="container-xxxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <img src="{{ asset('dashmin/img/Logo.png') }}" alt="SireGas"
                class="position-fixed translate-middle w-100 vh-100 top-50 start-50" style="opacity: 0.7;">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        @if (session('mess'))
            <div class="col-sm-4">
                <div class="d-flex align-items-center justify-content-between p-4">
                    {{-- Notif --}}
                    <div class="alert alert-{{ session('type') }} text-center" style="width: 300px;" role="alert">
                        {{ session('mess') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="container-fluid" style="min-height: 75vh">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

    @include('template.sc_footer')
    <link rel="stylesheet" href="{{ asset('dashmin/js/custom.js') }}">
</body>

</html>
