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

<script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
<!-- Template Javascript -->
<script src="{{ asset('dashmin/js/main.js') }}"></script>

<script>
    function showToast(message, isSuccess) {
        var toastClass = isSuccess ? 'success' : 'error';
        var toast = $('<div class="toast ' + toastClass + '">' + message + '</div>');
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
    showToast('Login Berhasil !! - Selamat Datang di SireGas', true); // Untuk notifikasi berhasil
    // showToast('Login gagal. Kata sandi yang Anda masukkan salah.', false); // Untuk notifikasi gagal
</script>
