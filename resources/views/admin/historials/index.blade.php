@extends('adminlte::page')

@section('title', 'Panel de control')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
@endsection

@section('content_header')

    <a href="{{ route('admin.historials.create') }}" class="btn btn-secondary btn-sm float-right">Crear nuevo historial</a>

    <h1>Lista de historiales</h1>
@stop

@section('content')

    {{-- mostrando la alerta de sesion --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">

        <div class="card-body">
            <table id="historiales" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Phone</th>
                        <th>Tratamiento</th>
                        <th>Precio</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($historials as $historial)
                        <tr>
                            <td>{{ $historial->id }}</td>
                            <td>{{ $historial->name }}</td>
                            <td>{{ $historial->phone }}</td>
                            <td>{{ $historial->nameTra }}</td>
                            <td>{{ $historial->price }}</td>
   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#historiales').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
            });
        });
    </script>
@endsection
