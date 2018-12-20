<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")
    @endif
</script>