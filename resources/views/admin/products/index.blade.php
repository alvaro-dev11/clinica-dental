@extends('adminlte::page')

@section('title', 'Panel de control')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
@endsection

@section('content_header')

    <a href="{{ route('admin.products.create') }}" class="btn btn-secondary btn-sm float-right">Crear nuevo producto</a>

    <h1>Lista de productos</h1>
@stop

@section('content')

    {{-- @livewire('admin.products-index') --}}


    {{-- mostrando la alerta de sesion --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        {{-- <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del producto">
        </div> --}}

        <div class="card-body">
            <table id="productos" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="text-uppercase">Nombre</th>
                        {{-- <th>Slug</th> --}}
                        <th class="text-uppercase">Descripción</th>
                        <th class="text-uppercase">Estado</th>
                        <th class="text-uppercase">Imagen</th>
                        <th class="text-uppercase">Categoria</th>
                        <th class="text-uppercase">Proveedor</th>
                        <th class="text-uppercase">Editar</th>
                        <th class="text-uppercase">Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            {{-- <td>{{ $product->slug }}</td> --}}
                            <td>{!! $product->description !!}</td>
                            <td>
                                @if ($product->status == 1)
                                    Activo
                                @else
                                    Inactivo
                                @endif
                            </td>
                            <td>
                                <img src="/imagen/{{ $product->image }}" style="max-width:50px">
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->proveedor->name }}</td>
                            <td width="10px" class="text-center"><a href="{{ route('admin.products.edit', $product) }}"
                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></td>
                            <td width="10px">
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                    class="formEliminar text-center">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                        class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- @if ($products->count())

            {{-- <div class="card-footer">
                {{ $products->links() }}
            </div> --}}
    {{-- @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
        @endif --}}
    </div> 

@stop


@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productos').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
            });
        });
    </script>
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
@endsection
