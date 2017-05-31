<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Benefit;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $benefits = Sponsor::with('benefits')->paginate(15);
        return $benefits;
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
        $this->validate($Request, array(
            'colaborador_id' => 'numeric|min:1',
            'beneficio_id' => 'numeric|min:1',
        ));

        // Almacenando datos
        $benefit = new Benefit;
        $benefit->usuario_id = $request->colaborador_id;
        $benefit->beneficio_id = $request->beneficio_id;

        $benefit->save();

        // Retornando vista: sponsorsbeneficios/show.blade.php
        return redirect()->route('beneficios.show', $benefit->usuario_beneficio_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $benefit = Benefit::find($id)->load('sponsor');
        return $benefit;
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
        if(is_null($benefit)){
            abort(404, "El beneficio no existe");
        }
        return $benefit;
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
        $benefit->usuario_id = $request->colaborador_id;
        $benefit->beneficio_id = $request->beneficio_id;

        $benefit->save();

        return redirect()->route('beneficios.show', $benefit->usuario_beneficio_id);
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
}
