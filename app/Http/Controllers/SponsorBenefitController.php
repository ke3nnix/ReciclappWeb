<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Benefit;
use Session;
use DB;

class SponsorBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($sponsorId)
    {
        $sponsor = Sponsor::find($sponsorId);

        if (request()->isJson()) {
            if (is_null($sponsor)) {
                $sponsor->load(['benefits'=> function ($query) {
                    $query->where('estado', 1);
                }]);
                return response()->json(['mensaje' => 'El usuario no existe.'], 404);
            }
            else {
                return $sponsor;
            }
        }

        if (!is_null($sponsor)) {
            $sponsor->load('benefits');
            return view('beneficios.index', compact('sponsor'));    
        }
        else {
            return abort(404, "El Sponsor indicado no existe");    
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beneficios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Almacenando datos
        $benefit = new Benefit;
        $benefit->nombre = $request->nombre;
        $benefit->descripcion = $request->descripcion;
        $benefit->req_puntos = $request->req_puntos;
        $benefit->tipo = $request->tipo;
        $benefit->cantidad = $request->cantidad;
        $benefit->sponsor_id = $request->sponsor_id;
        $benefit->estado = 1;

        $benefit->save();

        $sponsor = Sponsor::find($request->sponsor_id);

        // Enviando mensaje de estado
        Session::flash('exito' , 'El beneficio fue exitósamente agregado a ' + $sponsor->razon_social);

        // Retornando vista: sponsorsbeneficios/show.blade.php
        return redirect()->route('beneficios.index', $sponsor->sponsor_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $benefit = Benefit::find($id);
        if (request()->isJson()) {
            if (is_null($benefit)) {
                return response()->json(['mensaje' => 'El beneficio no existe.'], 404);
            }
            else {
                return $benefit;
            }
        }
            if (is_null($benefit)) {
                abort(404, "El beneficio no existe");
            }
        $sponsor = Sponsor::find($benefit->sponsor_id);
        $sponsor->load('benefits');
        return view('beneficios.index', compact('sponsor'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $benefit = Benefit::find($id)->load('sponsor');
        return view('beneficios.edit', compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Almacenando datos
        $benefit = Benefit::find($request->beneficio);

        if (!is_null($request->nombre)) { $benefit->nombre = $request->nombre; };
        if (!is_null($request->descripcion)) { $benefit->descripcion = $request->descripcion; };
        if (!is_null($request->req_puntos)) { $benefit->req_puntos = $request->req_puntos; };
        if (!is_null($request->tipo)) { $benefit->tipo = $request->tipo; };
        if (!is_null($request->cantidad)) 
        { 
            if ($request->cantidad > $benefit->cantidad) 
            {
                $benefit->estado = 1;
                $cant = $request->cantidad - $benefit->cantidad;

                DB::table('supply')->insert([
                    'beneficio_id' => $benefit->beneficio_id,
                    'cantidad' => $cant,
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now(),
                ]);
            } 
            $benefit->cantidad = $request->cantidad; 
        }
        
        $benefit->save();

        // Enviando mensaje de estado
        Session::flash('exito' , 'El beneficio fue exitósamente actualizado ');

        // Retornando vista: beneficios/show.blade.php
        return redirect()->route('beneficios.index', $request->sponsor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sponsor_id, $beneficio_id)
    {
        $benefit = Benefit::find($beneficio_id);
        $sponsorId = $sponsor_id;
        
        if ($benefit->estado == 1){ $benefit->estado = 0; }
        else { $benefit->estado = 1; }

        $benefit->save();
       
        return redirect()->route('beneficios.index', $sponsorId);
    }

    public function indexAll()
    {
        $benefits = Sponsor::with(['benefits' => function ($query) {
            $query->where('estado', '=', 1);
        }])->paginate(15);

        return $benefits;
    }
}
