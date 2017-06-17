<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($usuario_id, Request $request)
    {
        $user = User::find($usuario_id);
        if(request()->expectsJson()){
                if(is_null($user)){
                    return response()->json(['mensaje' => 'el usuario no existe'], 404);
                }
        }

        if(is_null($request->acopio_id)) {
                $entregas = DB::table('users')
                                    ->join('exchanges', 'users.usuario_id', '=', 'exchanges.colaborador_id')
                                    ->join('collection_points', 'exchanges.acopio_id','=','collection_points.acopio_id')
                                    ->select(DB::raw('exchanges.created_at as fecha'), 'collection_points.acopio_id', 'collection_points.nombre', 'exchanges.total_cantidad', 'exchanges.total_puntos')
                                    ->where('users.usuario_id', '=', $usuario_id)
                                    ->orderBy('exchanges.created_at', 'desc')
                                    ->get();
        }
        else {
                $entregas = DB::table('users')
                                    ->join('exchanges', 'users.usuario_id', '=', 'exchanges.colaborador_id')
                                    ->join('collection_points', 'exchanges.acopio_id','=','collection_points.acopio_id')
                                    ->select(DB::raw('exchanges.created_at as fecha'), 'collection_points.acopio_id', 'collection_points.nombre', 'exchanges.total_cantidad', 'exchanges.total_puntos')
                                    ->where([
                                        ['users.usuario_id', '=', $usuario_id],
                                        ['collection_points.acopio_id','=', $request->acopio_id]
                                    ])
                                    ->orderBy('exchanges.created_at', 'desc')
                                    ->get();
        }
                    
        return $entregas;
        
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
        //
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

    public function details($usuario_id, $entrega_id)
    {
        $detalle = DB::table('users')
                                    ->join('exchanges', 'users.usuario_id', '=', 'exchanges.colaborador_id')
                                    ->join('collection_points', 'exchanges.acopio_id','=','collection_points.acopio_id')
                                    ->select(DB::raw('exchanges.created_at as fecha'), 'collection_points.acopio_id', 'collection_points.nombre', 'exchanges.total_cantidad', 'exchanges.total_puntos')
                                    ->where([
                                        ['users.usuario_id', '=', $usuario_id],
                                        ['collection_points.acopio_id','=', $request->acopio_id]
                                    ])
                                    ->orderBy('exchanges.created_at', 'desc')
                                    ->get();
    }

}
