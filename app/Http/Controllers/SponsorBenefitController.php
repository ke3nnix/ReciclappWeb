<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Benefit;
use Session;

class SponsorBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($sponsorId)
    {
        $sponsor = Sponsor::find($sponsorId)->load('benefits');
        if (request()->isJson()) {
            if (is_null($sponsor)) {
                return response()->json(['mensaje' => 'El usuario no existe.'], 404);
            }
            else {
                return $sponsor;
            }
        }
        return view('beneficios.index', compact('sponsor'));
        //return ($sponsor);
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
        // Validando datos
        $this->validate($request, array(
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'req_puntos' => 'numeric|min:1',
            'tipo' => 'numeric|min:1|max:3', // 1: - 2: - 3:
            'cantidad' => 'numeric|min:1',
            'sponsor_id' => 'numeric|min:1',
        ));

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
        return redirect()->route('beneficios.index', compact('sponsor'));
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
        return view('beneficios.show', compact('benefit'));
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
        return view('beneficios.edit', compact($benefit));
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
            'colaborador_id' => 'numeric|min:1',
            'beneficio_id' => 'numeric|min:1',
        ));

        // Almacenando datos
        $benefit = Benefit::find($id);
        $benefit->colaborador_id = $request->colaborador_id;
        $benefit->beneficio_id = $request->beneficio_id;

        $benefit->save();

        // Enviando mensaje de estado
        Session::flash('exito' , 'El beneficio fue exitósamente actualizado ');

        // Retornando vista: beneficios/show.blade.php
        return redirect()->route('beneficios.show', $benefit->beneficio_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $benefit = Benefit::find($id);
        $sponsorId = $benefit->sponsor()->id;
        $benefit->delete();
        return redirect()->route('beneficios.index', [$sponsorId]);
    }

    public function indexAll()
    {
        $benefits = Sponsor::with('benefits')->paginate(15);
        return $benefits;
    }
}
