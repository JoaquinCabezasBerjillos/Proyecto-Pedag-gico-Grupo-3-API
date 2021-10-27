<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascota = Mascota::all();
        return $mascota;

    }

    public function store(Request $request)
    {
        $datos_validados = $request->validate([

            'nombre' => 'required',

            'chip' => 'required',

            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'tipo' => 'required',

            'mascota_id' => 'null',

        ]);

        Mascota::create($datos_validados);
        return  ['mensaje' => "Mascota creado"];
    }

    
    public function show($id)
    {
        //Buscar mascota por nombre

        $mascota = Mascota::find($id);
        // comprobar que la mascota existe
        if (!$mascota) {

            return ['error' => 'mascota no creado'];
        }

        return ['datos' => $mascota];
    }

    public function update(Request $request, $id)
    {
        $datos_validados = $request->validate([
            'nombre' => 'string',

            'chip' => 'string',

            'tipo' => 'string',

            'mascota_id' => 'null'
            

        ]);
        //Buscar mascota por nombre
        $mascota = Mascota::find($id);
        // comprobar que la mascota existe y si existe actualizar
        if (!$id) {
            return ['error' => 'No creada'];
        }
        //Actualizar la mascota
        $mascota->update($datos_validados);

        return ['mensaje' => 'Mascota actualizada'];
    }

    public function destroy($id)
    {
        Mascota::destroy($id);

        return ['mensaje' => 'Mascota borrada'];
    }

    public function savePhoto(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        
        $datos_validados = $request->validate([
            'foto' => 'string',

        ]);

        $mascota->update($datos_validados);
        return ['mensaje' => 'Imagen Subida'];
        
    }
}
