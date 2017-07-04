<?php

namespace App\Http\Controllers; 

use App\Models\Waste;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waste = Waste::orderBy('desecho_id', 'asc')->get();
        if(request()->expectsJson()) {
            return $waste;
        }
        
        return view('desechos.index', compact('waste'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if(is_null(Waste::where('descripcion', $request->descripcion)->first())) {
            $desecho = new Waste;
            $desecho->descripcion = $request->descripcion;
            $desecho->equivalencia = $request->equivalencia;
            $desecho->unidad = $request->unidad;
            $desecho->save();

            return $desecho;
        }
        else {
            return response()->json(['mensaje' => 'El desecho ya existe.'], 409);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
