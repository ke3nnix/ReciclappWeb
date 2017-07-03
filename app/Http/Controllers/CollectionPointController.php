<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
use App\Models\CollectionPoint; 
use Session; 
use Charts;
 
 
class CollectionPointController extends Controller 
{ 
    /** 
     * Display a listing of the resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function index(Request $request) 
    { 
        
        if (request()->expectsJson()) {
            $collectionPoints = CollectionPoint::where('estado', 1)->orderBy('acopio_id', 'ACS')->paginate(10); 
            return $collectionPoints;
        }
        else {
            switch ($request->estado) {
                case 'activo':
                    $collectionPoints = CollectionPoint::where('estado', 1)->orderBy('acopio_id', 'ACS')->paginate(10); 
                    return view('puntos-de-acopio.punto-de-acopio-activo',compact('collectionPoints')); 
                
                case 'inactivo':
                    $collectionPoints = CollectionPoint::where('estado', 0)->orderBy('acopio_id', 'ACS')->paginate(10); 
                    return view('puntos-de-acopio.punto-de-acopio-inactivo',compact('collectionPoints')); 
                default:
                    abort(404, 'La página no existe');
            }
        }        
    } 
 
    /** 
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function create() 
    { 
        return view('puntos-de-acopio.create'); 
    } 
 
    /** 
     * Store a newly created resource in storage. 
     * 
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response 
     */ 
    public function store(Request $request) 
    { 
        // Validando la data 
        $this->validate($request , array( 
                'nombre' => 'required|max:255', 
                'direccion' => 'required|max:255', 
                'distrito' => 'required|max:255',
        //        'latitud' => 'required|max:255',
          //      'longitud' => 'required|max:255',
                'papel_max' => 'required|numeric|min:1', 
                'vidrio_max' => 'required|numeric|min:1', 
                'plastico_max' => 'required|numeric|min:1', 
            )); 
 
        // Almacenamos los datos 
        $collectionPoint = new CollectionPoint; 
        $collectionPoint->nombre = $request->nombre; 
        $collectionPoint->direccion = $request->direccion; 
        $collectionPoint->distrito = $request->distrito; 
        $collectionPoint->latitud = $request->latitud;
        $collectionPoint->longitud = $request->longitud;
        $collectionPoint->estado = 1;
        $collectionPoint->papel_max = $request->papel_max; 
        $collectionPoint->papel_actual = 0; 
        $collectionPoint->vidrio_max = $request->vidrio_max; 
        $collectionPoint->vidrio_actual = 0; 
        $collectionPoint->plastico_max = $request->plastico_max; 
        $collectionPoint->plastico_actual = 0; 
        
        $collectionPoint->save(); 

        if (request()->expectsJson()) {
            return $collectionPoint;
        }
 
        // Enviando mensaje de estado 
        Session::flash('exito' , 'El punto de acopio fue exitosamente agregado'); 
 
        // Redireccionando a la vista: collection-points/show.blade.php 
        return redirect()->route('puntos-de-acopio.show', $collectionPoint->acopio_id); 
 
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

        if (request()->expectsJson()) {
            if (is_null($collectionPoint)) {
                return response()->json(['error' => 'El punto de acopio no existe.'], 404);
            }
            return $collectionPoint;
        }

        if(is_null($collectionPoint)){
            abort(404, "El punto de acopio no existe ");
        }

        $chartPapel = Charts::create('percentage', 'justgage')
                        ->title('Papel')
                        ->elementLabel('% usado')
                        ->values([($collectionPoint->papel_actual / $collectionPoint->papel_max * 100),0,100])
                        ->responsive(true)
                        ->height(300)
                        ->width(0);

        $chartPlastico = Charts::create('percentage', 'justgage')
                        ->title('Plástico')
                        ->elementLabel('% usado')
                        ->values([($collectionPoint->plastico_actual / $collectionPoint->plastico_max * 100),0,100])
                        ->responsive(true)
                        ->height(300)
                        ->width(0);

        $chartVidrio = Charts::create('percentage', 'justgage')
                        ->title('Vidrio')
                        ->elementLabel('% usado')
                        ->values([($collectionPoint->vidrio_actual / $collectionPoint->vidrio_max * 100),0,100])
                        ->responsive(true)
                        ->height(300)
                        ->width(0);
                        


        return view('puntos-de-acopio.show',compact(['collectionPoint', 'chartPapel', 'chartVidrio', 'chartPlastico'])); 
    } 
 
    /** 
     * Show the form for editing the specified resource. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function edit($id) 
    { 
        $collectionPoint = CollectionPoint::find($id); 
        return view('puntos-de-acopio.edit',compact('collectionPoint')); 
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
        // Validando la data 
        $this->validate($request , array( 
                'nombre' => 'required|max:255', 
                'direccion' => 'required|max:255', 
                'distrito' => 'required|max:255', 
                'papel_max' => 'required|numeric|min:1', 
                'vidrio_max' => 'required|numeric|min:1', 
                'plastico_max' => 'required|numeric|min:1', 
            )); 
 
        // Almacenamos los datos 
        $collectionPoint = CollectionPoint::find($id); 
        $collectionPoint->nombre = $request->nombre; 
        $collectionPoint->direccion = $request->direccion; 
        $collectionPoint->distrito = $request->distrito; 
        $collectionPoint->papel_max = $request->papel_max; 
        $collectionPoint->papel_actual = 0; 
        $collectionPoint->vidrio_max = $request->vidrio_max; 
        $collectionPoint->vidrio_actual = 0; 
        $collectionPoint->plastico_max = $request->plastico_max; 
        $collectionPoint->plastico_actual = 0;
        $collectionPoint->latitud = $request->latitud;
        $collectionPoint->longitud = $request->longitud;
 
        $collectionPoint->save(); 

        if (request()->expectsJson()) {
            return $collectionPoint;
        }
 
        // Enviando mensaje de estado 
        Session::flash('exito' , 'El punto de acopio fue exitosamente actualizado'); 

 
        // Redireccionando a otra vista 
        return redirect()->route('puntos-de-acopio.show', $collectionPoint->acopio_id); 
        //return back(); retorna a la ubicación previa
    } 
 
    /** 
     * Remove the specified resource from storage. 
     * 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */ 
    public function destroy($id) 
    { 
       //ubicar el objeto 
        $collectionPoint = CollectionPoint::find($id); 

        if (is_null($collectionPoint)) {
            abort(404, "El punto de acopio no existe ");
        }
        
        $this->changeStatus($collectionPoint->acopio_id);

        //setear el mensaje FLASH de exito 
        Session::flash('exito', 'El punto de acopio fue exitósamente desactivado'); 
        // redirigir hacia collection-points.index 
        return  redirect()->route('puntos-de-acopio.punto-de-acopio'); 
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

        return  redirect()->route('puntos-de-acopio.index', [ 'estado' => 'activo' ]);
    }

    public function changeStatus($id)
    {
        $collectionPoint = CollectionPoint::find($id);
        if ($collectionPoint->estado == 1){ $collectionPoint->estado = 0; }
        else { $collectionPoint->estado = 1; }

        $collectionPoint->save();
        return;
    }

} 