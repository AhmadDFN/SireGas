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
        background-color: #28a745;
        /* Warna latar hijau */
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
