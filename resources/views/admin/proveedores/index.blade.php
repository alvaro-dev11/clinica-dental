@extends('adminlte::page')

@section('title', 'Panel de control')

@section('content_header')

    <a href="{{ route('admin.proveedores.create') }}" class="btn btn-secondary btn-sm float-right">Crear nuevo proveedor</a>

    <h1>Lista de proveedores</h1>
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
                        <th>Contácto</th>
                        <th>Celular</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($proveedores as $proveedore)
                        <tr>
                            <td>{{ $proveedore->id }}</td>
                            <td>{{ $proveedore->name }}</td>
                            <td>{{ $proveedore->contacto }}</td>
                            <td>{{ $proveedore->phone }}</td>
                            <td width="10px"><a href="{{ route('admin.proveedores.edit', $proveedore) }}"
                                    class="btn btn-primary btn-sm">Editar</a></td>
                            <td width="10px">
                                <form action="{{ route('admin.proveedores.destroy', $proveedore) }}" method="POST">
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
