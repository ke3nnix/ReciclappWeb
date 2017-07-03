<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\CollectionPoint;
use App\Models\Exchange;
use App\Models\Waste;
use App\Models\ExchangeDetail;

class ExchangeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($usuario_id, $entrega_id)
    {
        return $detalles = Exchange::where('entrega_id',$entrega_id)->with('acopio','supervisor', 'detalles', 'detalles.desecho')->get();
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
    public function store($entrega_id, $descripcion, $cantidad)
    {
        $desecho = Waste::where('descripcion', $descripcion)->first();

        switch ($descripcion) {
            case "papel": 
                $equivalencia = (Waste::where('descripcion', 'papel')->first())->equivalencia;
                break;
            case "vidrio":
                $equivalencia = (Waste::where('descripcion', 'vidrio')->first())->equivalencia;
                break;
            case "plástico":
                $equivalencia = (Waste::where('descripcion', 'plástico')->first())->equivalencia;
        }

        // Escribiendo datos
        $detalle = new ExchangeDetail;
        $detalle->entrega_id = $entrega_id;
        $detalle->desecho_id = $desecho->desecho_id;
        $detalle->cantidad = $cantidad;
        $detalle->puntos = $equivalencia*$cantidad;

        // Salvando datos
        $detalle->save();
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
