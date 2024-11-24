@if(session()->has("success"))
    <script>
        Swal.fire({
            icon: "success",
            title: "Başarılı!",
            text: "{{session("success")}}",
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif
@if(session()->has("error"))
    <script>
        Swal.fire({
            icon: "error",
            title: "Hata!",
            text: "{{session("error")}}",
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif
