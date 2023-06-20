@extends('adminlte::page')

@section('title', 'Panel de control')

@section('content_header')
    <h1>Crear nuevo historial</h1>
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
            {!! Form::open(['route' => 'admin.historials.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}

                <select name="historials" class="form-control">  
                    @foreach ($namesPatients as $namePatient)
                        <option value={{$namePatient->id}}>{{$namePatient->name}}</option>  
                    @endforeach     
                </select>

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('treatment', 'Tratamiento') !!}
                <select name="treatments" class="form-control">  
                    @foreach ($tratamientos as $tratamiento)
                        <option value={{$tratamiento->id}}>{{$tratamiento->name}}</option>  
                    @endforeach     
                </select>

                @error('treatment')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

          

            {!! Form::submit('Crear historial', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop


