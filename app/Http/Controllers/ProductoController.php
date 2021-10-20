<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::all();
        return $producto;
    }

    public function store(Request $request)
    {
        $datos_validados = $request->validate([

            'nombre' => 'required|min:3',

            'precio' => 'required',

            'categoria' => 'required',

            'descripcion' => 'required',

            'producto_id' => 'null',

            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        Producto::create($datos_validados);
        return  ['mensaje' => "Producto creado"];
    }

    public function show($id)
    {

        //Buscar producto por nombre

        $producto = Producto::find($id);
        // comprobar que el producto existe
        if (!$producto) {

            return ['error' => 'producto no creado'];
        }

        return ['datos' => $producto];
    }

    public function update(Request $request, $id)
    {
        $datos_validados = $request->validate([
            'nombre' => 'string|min:3',

            'precio' => 'required|decimal|between:0,99999.99',

            'categoria' => 'required|string',

            'descripcion' => 'required',

            'producto_id' => 'null'
            

        ]);
        //Buscar producto por nombre
        $producto = Producto::find($id);
        // comprobar que el producto existe y si existe actualizar
        if (!$id) {
            return ['error' => 'No creado'];
        }
        //Actualizar el Producto
        $producto->update($datos_validados);

        return ['mensaje' => 'Producto actualizado'];
    }


    public function destroy($id)
    {
        Producto::destroy($id);

        return ['mensaje' => 'Producto borrado'];
    }

    public function savePhoto(Request $request, $id)
    {
        $producto = Producto::find($id);
        
        $datos_validados = $request->validate([
            'foto' => 'required|string',

        ]);

        $producto->update($datos_validados);
        return ['mensaje' => 'Imagen Subida'];
        
    }
}
