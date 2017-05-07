<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CollectionPoint;
use Session;

class CollectionPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectionPoints = CollectionPoint::orderBy('id', 'DESC')->paginate(5);
        return view('collection-points.index')->withCollectionPoints($collectionPoints);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collection-points.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validando la data
        $this->validate($request , array(
                'nombre' => 'required|max:255',
                'direccion' => 'required|max:255',
                'distrito' => 'required|max:255',
                'papel_max' => 'required|numeric|min:1',
                'vidrio_max' => 'required|numeric|min:1',
                'plastico_max' => 'required|numeric|min:1',
            ));

        // Almacenamos los datos
        $collectionPoint = new CollectionPoint;
        $collectionPoint->nombre = $request->nombre;
        $collectionPoint->direccion = $request->direccion;
        $collectionPoint->distrito = $request->distrito;
        $collectionPoint->papel_max = $request->papel_max;
        $collectionPoint->papel_actual = 0;
        $collectionPoint->vidrio_max = $request->vidrio_max;
        $collectionPoint->vidrio_actual = 0;
        $collectionPoint->plastico_max = $request->plastico_max;
        $collectionPoint->plastico_actual = 0;

        $collectionPoint->save();

        // Enviando mensaje de estado
        Session::flash('exito' , 'El punto de acopio fue exitosamente agregado');

        // Redireccionando a la vista: collection-points/show.blade.php
        return redirect()->route('collection-points.show', $collectionPoint->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collectionPoint = CollectionPoint::find($id);
        return view('collection-points.show')->withCollectionPoint($collectionPoint);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collectionPoint = CollectionPoint::find($id);
        return view('collection-points.edit')->withCollectionPoint($collectionPoint);
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
// Validando la data
        $this->validate($request , array(
                'nombre' => 'required|max:255',
                'direccion' => 'required|max:255',
                'distrito' => 'required|max:255',
                'papel_max' => 'required|numeric|min:1',
                'vidrio_max' => 'required|numeric|min:1',
                'plastico_max' => 'required|numeric|min:1',
            ));

        // Almacenamos los datos
        $collectionPoint = CollectionPoint::find($id);
        $collectionPoint->nombre = $request->nombre;
        $collectionPoint->direccion = $request->direccion;
        $collectionPoint->distrito = $request->distrito;
        $collectionPoint->papel_max = $request->papel_max;
        $collectionPoint->papel_actual = 0;
        $collectionPoint->vidrio_max = $request->vidrio_max;
        $collectionPoint->vidrio_actual = 0;
        $collectionPoint->plastico_max = $request->plastico_max;
        $collectionPoint->plastico_actual = 0;

        $collectionPoints->save();

        // Enviando mensaje de estado
        Session::flash('exito' , 'El punto de acopio fue exitosamente actualizado');

        // Redireccionando a otra vista
        return redirect()->route('collection-points.show', $collectionPoint->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //ubicar el objeto
        $collectionPoint = CollectionPoint::find($id);
        $collectionPoint->delete();
        //setear el mensaje FLASH de exito
        Session::flash('exito', 'El punto de acopio fue exitósamente eliminado');
        // redirigir hacia collection-points.index
        return  redirect()->route('collection-points.index');
    }
}
