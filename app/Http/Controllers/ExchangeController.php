<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CollectionPoint;
use App\Models\Exchange;
use App\Models\Waste;
// use Illuminate\Support\Facades\DB;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($usuario_id, Request $request)
    {
        $usuario = User::find($usuario_id);
        if(request()->expectsJson()){
                if(is_null($usuario)){
                    return response()->json(['mensaje' => 'el usuario no existe'], 404);
                }
        }

        if(is_null($request->paginate)){
            $entrega = Exchange::where('colaborador_id', $usuario->usuario_id)
                                                ->with('acopio')
                                                ->get();
        }
        else {
            $entrega = Exchange::where('colaborador_id', $usuario->usuario_id)
                                                ->orderBy('entrega_id','desc')
                                                ->paginate($request->paginate);
        }
        
        return $entrega;
       
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
        $entrega = new Exchange;
        
        $entrega->colaborador_id = $request->colaborador_id;
        $entrega->empleado_id = $request->empleado_id;
        $entrega->acopio_id = $request->acopio_id;
        $entrega->total_cantidad = $entrega->cantidad_papel + $entrega->cantidad_vidrio + $entrega->cantidad_plastico;

        $eq_plastico = (Waste::where('descripcion', 'plastico')->first())->equivalencia;
        $eq_vidrio = (Waste::where('descripcion', 'vidrio')->first())->equivalencia;
        $eq_papel = (Waste::where('descripcion', 'papel')->first())->equivalencia;

        $entrega->total_cantidad = $request->cantidad_papel +
                                                    $request->cantidad_vidrio + 
                                                    $request->cantidad_plastico;

        $entrega->total_puntos = $eq_papel*$request->cantidad_papel + 
                                                    $eq_vidrio*$request->cantidad_vidrio + 
                                                    $eq_plastico*$request->cantidad_plastico;

        $entrega->save();

       return response()->json(['mensaje' => 'La entrega fue registrada.'], 201);

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
