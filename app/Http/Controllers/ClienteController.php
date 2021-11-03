<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = User::all();
        return $cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Buscar un cliente por el id.

      $cliente = User::find($id);
      // comprobar que el estudiante existe
      if (!$cliente) {
         return ['error' => 'Id erróneo'];
      }

      return ['datos' => $cliente];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // Primero validar los datos. Hay que pasarle el Request para los cambios que haya hecho el 
       // usuario en el nombre, apellido y móvil.
      $datos_validados = $request->validate([
            'nombre' => 'required|min:3',
            'apellidos' => 'required|min:6',
            'movil' => 'required|min:9',
         ]);
         //Buscar un cliente por el id.
         $cliente = User::find($id);
         // comprobar que el cliente existe y si existe actualizar
         if (!$cliente) {
            return ['error' => 'Id erróneo'];
         }
         //Actualizar el cliente
         $cliente->update($datos_validados);
         //Aqui no se llama al modelo,, se llama a la variable
         return ['mensaje' => 'Cliente actualizado'];
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Buscar el cliente por el id.

      $cliente = User::find($id); 
     
      //Borrar el cliente

      $cliente->destroy($id);
      //aqui no se llama al modelo,, se llama a la variable
      return ['mensaje' => 'Cliente borrado'];
    }
}
