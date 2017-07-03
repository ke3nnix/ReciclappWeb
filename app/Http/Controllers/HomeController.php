<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Models\Exchange;
use App\Models\UserBenefit;

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
                        ->title('Últimos 12 meses')
                        ->elementLabel("Entregas")
                        ->dimensions(1000, 300)
                        ->responsive(true)
                        ->lastByMonth(12, true);

        $entregasDeLaSemana = Charts::database($entregas, 'bar', 'highcharts')
                        ->title('Últimos 7 días')
                        ->elementLabel("Entregas")
                        ->dimensions(500, 200)
                        ->responsive(true)
                        ->lastByDay(7)
                        ->dateFormat('dd-mm-YYYY');

        // Entregas por punto de acopio
        $puntoDeAcopioAnho = Charts::database($entregas, 'bar', 'highcharts')
                        ->title('Últimos 12 meses')
                        ->elementLabel("Entregas")
                        ->dimensions(500, 200)
                        ->responsive(true)
                        ->lastByMonth(30)
                        ->groupBy('acopio_id');

        // Beneficios reclamados
        $beneficios = UserBenefit::all();
        $puntoDeAcopioAnho = Charts::database($beneficios, 'bar', 'highcharts')
                        ->title('Últimos 12 meses')
                        ->elementLabel("Beneficios reclamados")
                        ->dimensions(1000, 300)
                        ->responsive(true)
                        ->lastByMonth(12, true);


        return view('index', compact([
            'entregasDelAnho',
            'entregasDeLaSemana',
            'puntoDeAcopioAnho',
            'beneficiosAnho'
        ]));
    }
}
