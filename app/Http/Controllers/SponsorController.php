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
    public function index()
    {
        // Buscando sponsors
        $sponsors = Sponsor::orderBy('sponsor_id', 'ASC')->paginate(10);

        // Retornando vista
        return view('sponsors.index',compact('sponsors'));
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
        // Validando datos
        $this->validate($request, array(
            'razon_social' => 'required|max:255',
            'ruc' => 'required|numeric|max:11',
            'direccion' => 'required|max:255',
            'telefono' => 'required|numeric|max:11',
            'contacto' => 'required|max:255',
        ));

        // Almacenando datos
        $sponsor = new Sponsor;
        $sponsor->razon_social = $request->razon_social;
        $sponsor->ruc = $request->ruc;
        $sponsor->direccion = $request->direccion;
        $sponsor->telefono = $request->telefono;
        $sponsor->distrito = $request->distrito;
        $sponsor->contacto = $request->contacto;

        $sponsor->save();

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
        return view('sponsors.show',compact('sponsor'));
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
        // Validando datos
        $this->validate($request, array(
            'razon_social' => 'required|max:255',
            //'ruc' => 'required|numeric|max:11',
            'direccion' => 'required|max:255',
            //'telefono' => 'required|numeric|max:11',
            'contacto' => 'required|max:255',
            'distrito' => 'required|max:255',
        ));

        // Almacenando datos
        $sponsor = Sponsor::find($id);
        $sponsor->razon_social = $request->razon_social;
        $sponsor->ruc = $request->ruc;
        $sponsor->direccion = $request->direccion;
        $sponsor->telefono = $request->telefono;
        $sponsor->distrito = $request->distrito;
        $sponsor->contacto = $request->contacto;        
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
        $sponsor->delete();

        //setear el mensaje FLASH de exito
        Session::flash('exito', 'El sponsor fue exitósamente eliminado');

        // redirigir hacia sponsors/index.blade.php
        return  redirect()->route('sponsors.index');
    }
}
