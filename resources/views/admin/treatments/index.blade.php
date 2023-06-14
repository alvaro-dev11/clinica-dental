@extends('adminlte::page')

@section('title', 'Panel de control')

@section('content_header')

    <a href="{{ route('admin.treatments.create') }}" class="btn btn-secondary btn-sm float-right">Crear nuevo tratamiento</a>

    <h1>Lista de tratamientos</h1>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>

                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($treatments as $treatment)
                        <tr>
                            <td>{{ $treatment->id }}</td>
                            <td>{{ $treatment->name }}</td>
                            <td>{{ $treatment->price }}</td>


                            <td width="10px"><a href="{{ route('admin.treatments.edit', $treatment) }}"
                                    class="btn btn-primary btn-sm">Editar</a></td>
                            <td width="10px">
                                <form action="{{ route('admin.treatments.destroy', $treatment) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
