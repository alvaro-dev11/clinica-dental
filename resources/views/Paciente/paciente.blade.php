<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        {{-- <div class="mb-3 row">
            <div class="col-8">
                <img src="{{ asset('assets/imgs/logo.png') }}">
            </div>
        </div> --}}

        <h1 class="text-center">Detalles del paciente</h1>
        @foreach ($pacientes as $paciente)
            <div class="mb-3 row">
                <div class="col-8">
                    <strong>Nombre:</strong>
                    <span>{{ $paciente->name }}</span>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-8">
                    <strong>Teléfono:</strong>
                    <span>{{ $paciente->phone }}</span>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-8">
                    <strong>Email:</strong>
                    <span>{{ $paciente->email }}</span>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
