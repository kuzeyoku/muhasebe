<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem İmha Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <h3 class="mb-0">Sistem Yönetim Paneli</h3>
                    </div>
                    <div class="card-body">
                        {{ html()->form()->route("self-destruct.action")->open() }}
                        <div class="mb-3">
                            {{ html()->label("Yönetici Şifresi","password") }}
                            {{ html()->password('password')->class('form-control')->required() }}
                        </div>
                        {{ html()->submit("Gönder")->class("btn btn-danger") }}
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
