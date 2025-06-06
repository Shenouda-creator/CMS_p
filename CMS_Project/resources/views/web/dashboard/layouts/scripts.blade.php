<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src={{ asset('dashboard/assets/vendor/apexcharts/apexcharts.min.js') }}></script>
<script src={{ asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<script src={{ asset('dashboard/assets/vendor/chart.js/chart.umd.js') }}></script>
<script src={{ asset('dashboard/assets/vendor/echarts/echarts.min.js') }}></script>
<script src={{ asset('dashboard/assets/vendor/quill/quill.min.js') }}></script>
<script src={{ asset('dashboard/assets/vendor/simple-datatables/simple-datatables.js') }}></script>
<script src={{ asset('dashboard/assets/vendor/tinymce/tinymce.min.js') }}></script>
<script src={{ asset('dashboard/assets/vendor/php-email-form/validate.js') }}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<!-- Template Main JS File -->
<script src={{ asset('dashboard/assets/js/main.js') }}></script>
<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @elseif(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
@stack('footer-scripts')
