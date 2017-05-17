<?php

namespace App\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;
use App\Models\CollectionPoint;
use Session;
// use App\Http\Controllers\WebControllers\Controller as Controller;


class CollectionPointAPIController extends Controller
{
    /**
     * Mostrar un listado de Puntos de acopio
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectionPoints = CollectionPoint::orderBy('id', 'ACS')->paginate(15);
        return $collectionPoints;
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
        if ($collectionPoint == NULL) {
          abort(402, 'El punto de acopio no existe');
        }
        return $collectionPoint;
    }

    /**
     * Acción para resetear a 0 el contador de desechos de los puntos de venta seleccionados.
     *
     * @return \Illuminate\Http\Response
     */

    public function collect(Request $request)
    {
        $collectionPoints = DB::table('collection_points')
                            ->whereIn('id', $request->ids)
                            ->get();

        if (is_null($collectionPoints)) {
            abort(406, 'No se seleccionó ningún punto de acopio');
        }

        foreach ($collectionPoints as $collectioPoint) {
          // acumulando
          $acumpapel = $acumpapel + $collectioPoint->papel_actual;
          $acumvidrio = $acumvidrio + $collectioPoint->vidrio_actual;
          $acumplastico = $acumplastico + $collectioPoint->plastico_actual;

          // reseteando valores
          $collectioPoint->papel_actual = 0;
          $collectioPoint->plastico_actual = 0;
          $collectioPoint->vidrio_actual = 0;

          // guardando objetos
          $collectioPoint->save();
        }

        // actualizando datos
        $papel = Waste::where('descripcion','like','papel');
        $papel->total = $papel->total + $acumpapel;
        $vidrio = Waste::where('descripcion','like','vidrio');
        $vidrio->total = $vidrio->total + $acumvidrio;
        $plastico = Waste::where('descripcion','like','plastico');
        $plastico->total = $plastico->total + $acumplastico;

        // salvando datos
        $papel->save();
        $vidrio->save();
        $plastico->save();

        return  redirect()->route('puntos-de-acopio.index');
    }
}
