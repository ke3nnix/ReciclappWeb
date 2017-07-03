<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Models\ExchangeDetail;
use App\Models\Exchange;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $entregas = Exchange::orderBy('acopio_id')->get();
        
        // Entregas por fecha
        $entregasDelAnho = Charts::database($entregas, 'bar', 'highcharts')
                        ->colors(['#00C853', '#00E676', '#69F0AE'])
                        ->title('Últimos 12 meses')
                        ->elementLabel("Cantidad de entregas")
                        ->dimensions(600, 200)
                        ->responsive(true)
                        ->dateFormat('F Y')
                        ->lastByMonth(12, true);
        
        $entregasDeLaSemana = Charts::database($entregas, 'bar', 'highcharts')
                        ->title('Últimos 7 días')
                        ->colors(['#00C853', '#00E676', '#69F0AE'])
                        ->elementLabel("Cantidad de entregas")
                        ->dimensions(500, 200)
                        ->responsive(true)
                        ->lastByDay(7)
                        ->dateFormat('dd-mm-YYYY');

        // Entregas por punto de acopio
        $puntoDeAcopioAnho = Charts::database($entregas, 'area', 'highcharts')
                        ->title('Registradas en el último año')
                        ->colors(['#00C853', '#00E676'])
                        ->elementLabel("Cantidad de entregas")
                        ->dimensions(500, 200)
                        ->responsive(true)
                        ->lastByMonth(30)
                        ->groupBy('acopio_id');

        // Beneficios reclamados
        $beneficios = DB::table('user_benefits')->select('*')->get();
        $beneficiosAnho = Charts::database($beneficios, 'area', 'highcharts')
                        ->title('Registradas en el último año')
                        ->colors(['#00C853', '#00E676'])
                        ->elementLabel("Cantidad de beneficios reclamados")
                        ->dimensions(500, 300)
                        ->responsive(true)
                        ->lastByMonth(12, true);
        
        // ------------------------
        $cant_papel = ExchangeDetail::where('desecho_id', 1)->get();
        $cant_vidrio = ExchangeDetail::where('desecho_id', 2)->get();
        $cant_plastico = ExchangeDetail::where('desecho_id', 3)->get();

        $pesoDeLaSemana = Charts::multiDatabase('bar', 'highcharts')
                        ->title('Últimos 7 días')
                        ->dataset('Papel', $cant_papel)
                        ->dataset('Vidrio', $cant_vidrio)
                        ->dataset('Plástico', $cant_plastico)
                        ->colors(['#00C853', '#00E676', '#69F0AE'])
                        ->elementLabel("Kilogramos")
                        ->dimensions(500, 300)
                        ->responsive(true)
                        ->lastByDay(7)
                        ->dateFormat('dd-mm-YYYY');

        $pesoAnho = Charts::multiDatabase('bar', 'highcharts')
                        ->title('Últimos 12 meses')
                        ->dataset('Papel', $cant_papel)
                        ->dataset('Vidrio', $cant_vidrio)
                        ->dataset('Plástico', $cant_plastico)
                        ->colors(['#00C853', '#00E676', '#69F0AE'])
                        ->dimensions(500, 300)
                        ->elementLabel("Kilogramos")
                        ->responsive(true)
                        ->lastByMonth(12, true);

        return view('index', compact([
            'entregasDelAnho',
            'entregasDeLaSemana',
            'puntoDeAcopioAnho',
            'beneficiosAnho',
            'pesoDeLaSemana',
            'pesoAnho'
        ]));
    }
}
