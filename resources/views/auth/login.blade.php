<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>{{ $page }} | SireGas</title>

    <!-- Favicon -->
    <link href="{{ asset('dashmin/img/Logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('dashmin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashmin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('dashmin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('dashmin/css/style.css') }}" rel="stylesheet">

    <style>
        #toast-container {
            position: fixed;
            top: 50px;
            /* Atur posisi vertikal sesuai kebutuhan */
            left: 50%;
            /* Pusatkan secara horizontal */
            transform: translateX(-50%);
            z-index: 1000;
        }

        .toast {
            background-color: #dc3545;
            /* Warna latar merah */
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            position: relative;
            opacity: 0;
            transition: opacity 0.3s ease-out;
        }

        .toast.show {
            opacity: 1;
            transition: opacity 0.3s ease-in;
        }
    </style>
</head>

<body>
    <div class="container-xxxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            @if ($errors->has('username'))
                <div id="toast-container"></div>
            @endif
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="{{ url('auth/login') }}" class="">
                                <h3 class="text-primary"><img class="rounded-circle"
                                        src="{{ asset('dashmin/img/Logo.png') }}" alt="SireGas"
                                        style="width: 50px; height: 50px;margin-right: 10px;margin-top:-5px;">SireGas
                                </h3>
                            </a>
                            <h3>Log In</h3>
                        </div>
                        <form action="{{ url('auth/login') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="username"
                                    autocomplete="chrome-off" name="username"
                                    class="form-control @error('email') is-invalid @enderror">
                                <label for="floatingInput">Nama</label>
                                @error('email')
                                    <div id="email" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                    autocomplete="chrome-off" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <div id="password" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
                            <p class="text-center mb-0">Silahkan Login terlebih dahulu!!!</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>



    <!-- JavaScript Libraries -->

    {{--  NPM  --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    {{--  Lib  --}}
    <script src="{{ asset('dashmin/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('dashmin/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('dashmin/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('dashmin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dashmin/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashmin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('dashmin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('dashmin/js/main.js') }}"></script>

    <script>
        function showToast(message) {
            var toast = $('<div class="toast">' + message + '</div>');
            $('#toast-container').append(toast);
            setTimeout(function() {
                toast.addClass('show');
            }, 100);
            setTimeout(function() {
                toast.removeClass('show');
                setTimeout(function() {
                    toast.remove();
                }, 300);
            }, 3000); // Sesuaikan durasi tampilan pesan di sini
        }

        // Contoh pemanggilan
        showToast('Login gagal. Username Atau Password Kamu Mungkin salah !!!.');
    </script>

</body>

</html>
