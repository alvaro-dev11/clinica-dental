@extends('adminlte::page')

@section('title', 'Panel de control')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre',) !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Inrgese el nombre de la categoria']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug',) !!}
                    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Inrgese el slug de la categoria']) !!}
                </div>

                {!! Form::submit('Crear categoria', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop