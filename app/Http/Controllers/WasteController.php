<?php

namespace App\Http\Controllers; 

use App\Models\Waste;
use Illuminate\Http\Request;
use Charts;

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
        
        $papel = (Waste::where('descripcion', 'papel')->first())->total;
        $papelmax = (Waste::where('descripcion', 'papel')->first())->max;
        $vidrio = (Waste::where('descripcion', 'vidrio')->first())->total;
        $vidriomax = (Waste::where('descripcion', 'vidrio')->first())->max;
        $plastico = (Waste::where('descripcion', 'plástico')->first())->total;
        $plasticomax = (Waste::where('descripcion', 'plástico')->first())->max;

        $papelbar = Charts::create('progressbar', 'progressbarjs')
                    ->values([$papel,0,$papelmax])
                    ->title('Cantidad de papel actual: ' . $papel . "/" . $papelmax)
                    ->colors(['#00C853'])
                    ->responsive(false)
                    ->height(50)
                    ->width(0);
        
        $vidriobar = Charts::create('progressbar', 'progressbarjs')
                    ->values([$vidrio,0,$vidriomax])
                    ->title('Cantidad de vidrio actual: ' . $vidrio . "/" . $vidriomax)
                    ->colors(['#00C853'])
                    ->responsive(false)
                    ->height(50)
                    ->width(0);

        $plasticobar = Charts::create('progressbar', 'progressbarjs')
                    ->values([$plastico,0,$plasticomax])
                    ->title('Cantidad de plástico actual: ' . $plastico . "/" . $plasticomax)
                    ->colors(['#00C853'])
                    ->responsive(false)
                    ->height(50)
                    ->width(0);
        
        return view('almacen.almacen', compact('waste', 'papelbar', 'vidriobar', 'plasticobar'));

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
