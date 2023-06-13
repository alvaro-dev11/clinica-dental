@extends('adminlte::page')

@section('title', 'Panel de control')

@section('content_header')

    <a href="{{ route('admin.products.create') }}" class="btn btn-secondary btn-sm float-right">Crear nuevo producto</a>

    <h1>Lista de productos</h1>
@stop

@section('content')

    @livewire('admin.products-index')

@stop

@section('js')
    {{-- enviar formulario y mostrar alerta sweetalert --}}
    <script>
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.formEliminar')
            Array.prototype.slice.call(forms)
                .forEach((form) => {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault()
                        event.stopPropagation()
                        Swal.fire({
                            title: 'Confirma la eliminación del registro?',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Confirmar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire(
                                    'Eliminado!',
                                    'El registro ha sido eliminado exitosamente.',
                                    'success'
                                )
                            }
                        })
                    }, false)
                });
        })
    </script>
@stop
