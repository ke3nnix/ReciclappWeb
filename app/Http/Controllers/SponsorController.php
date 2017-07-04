<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Sponsor;
use Session; 


class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!is_null($request->estado))
        {
            switch ($request->estado) {
                case 'activo':
                    $sponsors = Sponsor::where('estado', 1)->paginate(10);
                    return view('sponsors.sponsor-activo',compact('sponsors'));

                case 'inactivo':
                    $sponsors = Sponsor::where('estado', 0)->paginate(10);
                    return view('sponsors.sponsor-inactivo',compact('sponsors'));
                default:
                    return "error";
            }
        }
        abort(404, 'La página no existe');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornando vista
        return view('sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Verificando si sponsor ya existe en el sistema
        $sponsor = Sponsor::where('ruc', $request->ruc)->get();

        if(!is_null($sponsor)) {
            $sponsor->estado = 1;
        }
        else {
            // Almacenando datos
            $sponsor = new Sponsor;
            $sponsor->razon_social = $request->razon_social;
            $sponsor->ruc = $request->ruc;
            $sponsor->direccion = $request->direccion;
            $sponsor->telefono = $request->telefono;
            $sponsor->distrito = $request->distrito;
            $sponsor->contacto = $request->contacto;
            $sponsor->estado = 1; // activo - 0: inactivo

            $sponsor->save();

            // Enviando mensaje de estado
            Session::flash('exito' , 'El auspiciador fue exitosamente re-activado');
        }

        // Enviando mensaje de estado
        Session::flash('exito' , 'El auspiciador fue exitosamente agregado');

        // Retornando vista: sponsors/show.blade.php
        return redirect()->route('sponsors.show', $sponsor->sponsor_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscando sponsor
        $sponsor = Sponsor::find($id);

        // Retornando vista: sponsors/show.blade.php
        return view('beneficios.index',compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Buscando sponsor
        $sponsor = Sponsor::find($id);

        // Retornando vista: sponsors/edit.blade.php
        return view('sponsors.edit',compact('sponsor'));
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

        // Almacenando datos
        $sponsor = Sponsor::find($id);
        
        $sponsor->razon_social = $request->razon_social;
        $sponsor->ruc = $request->ruc;
        $sponsor->direccion = $request->direccion;
        $sponsor->telefono = $request->telefono;
        $sponsor->distrito = $request->distrito;
        $sponsor->contacto = $request->contacto;
        $sponsor->estado = 1; // activo - 0: inactivo        

        $sponsor->save();

        // Enviando mensaje de estado
        Session::flash('exito' , 'El auspiciador fue exitosamente actualizado');

        // Retornando vista: sponsors/show.blade.php
        return redirect()->route('sponsors.show', $sponsor->sponsor_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ubicando datos
        $sponsor = Sponsor::find($id);
        
        if ($sponsor->estado == 1){ $sponsor->estado = 0; }
        else { $sponsor->estado = 1; }

        $sponsor->save();

        //setear el mensaje FLASH de exito
        Session::flash('exito', 'El sponsor fue exitósamente desactivado');

        // redirigir hacia sponsors/index.blade.php
        return  redirect()->route('sponsors.index', [ 'estado' => 'activo' ]);
    }
}
