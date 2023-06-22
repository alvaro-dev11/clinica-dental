@extends('adminlte::page')

@section('title', 'Panel de control')

@section('content_header')
    <h1>Listado de Citas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripción</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->descripcion }}</td>
                           
                            <td>
                                <a href="{{ route('admin.citas.edit', $cita->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('admin.citas.destroy', $cita->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
