<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Symfony\Component\Console\Input\Input;

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

        ]);

        $producto = Producto::create($datos_validados);
        return  ['mensaje' => "Producto creado", 'producto' => $producto];
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

            'precio' => 'required|numeric|between:0,9999.99',

            'categoria' => 'required|string',

            'descripcion' => 'required',

            'foto' => 'string'


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

    public function savePhoto(Request $request)
    {
        $request->validate([
            'photos' => 'required|max:2048'
        ]);

        $productoNuevo = Producto::factory()->make();

        if ($request->file()) {
            $fileName = time() . '_' . $request->file('photos')->getClientOriginalName();
            $filePath = $request->file('photos')->storeAs('uploads', $fileName, 'public');

            $productoNuevo->foto = '/storage/' . $filePath;
            $productoNuevo->save();

            return response()->json($productoNuevo, 200);
        }
        /* $datos_validados = $request->validate([
            'foto' => 'image|mimes:jpeg,png',
        ]);

        $producto = Producto::find($id);

        $producto->update($datos_validados); */
        return ['mensaje' => 'Imagen Subida'];
    }
}
