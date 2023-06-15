<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Proveedor;


class ProductController extends Controller
{

    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::pluck('name', 'id');
        $proveedores = Proveedor::pluck('name', 'id');
        $product->category_id = $categories;
        $product->proveedor_id = $proveedores;
        // $estados = [
        //     '0' => 'Inactivo',
        //     '1' => 'Activo'
        // ];
        return view('admin.products.create', compact('product', 'categories', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,svg|max:1024',
            'category_id' => 'required',
            'proveedor_id' => 'required'
        ]);

        $product = $request->all();

        if ($image = $request->file('image')) {
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($rutaGuardarImg, $imagenProducto);
            $product['image'] = "$imagenProducto";
        }

        // $product = Product::create($request->all());
        $product['category_id'] = $request->category_id;
        $product['proveedor_id'] = $request->proveedor_id;
        Product::create($product);
        return redirect()->route('admin.products.index')->with('info','El producto se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');
        $proveedores = Proveedor::pluck('name', 'id');
        return view('admin.products.edit', compact('product', 'categories', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required' . ($request->slug != $product->slug ? '|unique:products,slug' : ''),
            'category_id' => 'required',
            'proveedor_id' => 'required',
        ]);
        $prod = $request->all();
        if ($imagen = $request->file('new_image')) {
            $rutaGuardarImg = 'imagen/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['new_image'] = "$imagenProducto";
        } else {
            unset($prod['new_image']);
        }
        $product->update($prod);
        return redirect()->route('admin.products.index')->with('info','El producto se actualizó exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // eliminando categoria y redirigiendo al index de categorias
        $product->delete();

        return redirect()->route('admin.products.index')->with('info', 'El producto se eliminó con éxito');
    }
}
