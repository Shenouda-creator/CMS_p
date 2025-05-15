@if(session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif
