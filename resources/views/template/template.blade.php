<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>@yield('title') | SireGas</title>

    @include('template.sc_head')

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


        @include('template.sidebar')


        <!-- Content Start -->
        <div class="content">
            @include('template.navbar')


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 75vh">
                <div class="row g-4">

                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4" style="padding-right: 50px !important;">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">SireGas</a>, Sistem Rekapitulasi Gas LPG.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end" style="padding-right: 50px !important;">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="#">Kelompok Zada</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('template.sc_footer')
</body>

</html>
