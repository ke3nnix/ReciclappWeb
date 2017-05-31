<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Benefit;
use App\Models\UserBenefit;
use Illuminate\Support\Facades\DB;

class UserBenefitController extends Controller
{
    /**
     * Lista todos los beneficios canjeados por el usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($usuario_id)
    {
        $beneficios = User::find($usuario_id);
        $beneficios->load('benefits');
        return $beneficios;
    }

    /**
     * Almacena un nuevo beneficio canjeado por el usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($usuario_id, $beneficio_id)
    {
        // return $beneficio_id;

        $usuario = User::find($usuario_id);
        if (is_null($usuario)) {
            return response()->json(['error' => 'El usuario no existe.'], 404);
        }
        
        $beneficio = Benefit::find($beneficio_id);
        if (is_null($beneficio)) {
            return response()->json(['error' => 'El beneficio no existe.'], 404);
        }

        // Comprobando disponibilidad del beneficio
        if ($beneficio->estado == 0 || $beneficio->cantidad <1) {
            return response()->json(['error' => 'El beneficio no está disponible.'], 403);
        }


        // Comprobando requisitos
        if ($usuario->puntos < $beneficio->req_puntos) {
            return response()->json(['error' => 'El usuario no tiene los puntos requeridos.'], 403);
        }

        // Almacenando datos
        $usuario->benefits()->attach($beneficio);

        // Actualizando stock de beneficio
        $beneficio->cantidad = $beneficio->cantidad - 1;
        if ($beneficio->cantidad == 0) {
            $beneficio->estado = 0;
        }
        $beneficio->save();

        // Actualizando puntaje de usuario
        $usuario->puntos = $usuario->puntos - $beneficio->req_puntos;
        $usuario->save();


        // exito
        return [
        'errors' => false,
        'message'   => "El beneficio fue asignado ",
        ];

    }

    /**
     * Muestra los detalles de un beneficio reclamado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($usuario_id, $beneficio_id)
    {
        // Validando usuario
        $usuario = User::find($usuario_id);
        if(is_null($usuario)) {
            return response()->json(['error' => 'El usuario no existe.'], 404);
        }

        // Validando beneficios
        $beneficio = Benefit::find($beneficio_id);
        if(is_null($beneficio)) {
            return response()->json(['error' => 'El beneficio no existe.'], 404);
        }

        // Ubicando registros
        $usuario_beneficio = DB::table('user_benefits')
                                                        ->where('usuario_id', $usuario_id)
                                                        ->where('beneficio_id', $beneficio_id)
                                                        ->get();

        // Validando existencia de registros
        return $usuario_beneficio;
    }
}
