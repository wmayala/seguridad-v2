@if(session('success'))
    <script>
        Swal.fire({
            title: "¡Listo!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
@elseif(session('danger'))
    <script>
        Swal.fire({
            title: "¡Listo!",
            text: "{{ session('danger') }}",
            icon: "success"
        });
    </script>
@elseif(session('warning'))
    <script>
        Swal.fire({
            title: "¡Atención!",
            text: "{{ session('warning') }}",
            icon: "warning"
        });
    </script>
@elseif(session('delete'))
<script>
    Swal.fire({
        title: "¡Eliminado!",
        text: "{{ session('delete') }}",
        icon: "danger"
    });
</script>
@endif
