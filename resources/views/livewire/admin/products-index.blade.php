<div>
    {{-- mostrando la alerta de sesion --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del producto">
        </div>

        @if ($products->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            {{-- <th>Slug</th> --}}
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Imagen</th>
                            <th>Categoria</th>
                            <th>Proveedor</th>
                            <th colspan="2"></th>
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
                                <td width="10px"><a href="{{ route('admin.products.edit', $product) }}"
                                        class="btn btn-primary btn-sm">Editar</a></td>
                                <td width="10px">
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                        class="formEliminar">
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

            <div class="card-footer">
                {{ $products->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro</strong>
            </div>
        @endif
    </div>
</div>
