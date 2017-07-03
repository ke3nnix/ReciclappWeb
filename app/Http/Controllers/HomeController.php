<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Models\Exchange;

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
        $entregas = Exchange::all();

        $entregasDelAnho = Charts::database($entregas, 'bar', 'highcharts')
                        ->title('Entregas del último año')
                        ->elementLabel("Entregas")
                        ->dimensions(1000, 300)
                        ->responsive(true)
                        ->lastByMonth(12)
                        ->dateFormat('F Y');

        $entregasDeLaSemana = Charts::database($entregas, 'bar', 'highcharts')
                        ->title('Últimos 7 días')
                        ->elementLabel("Entregas")
                        ->dimensions(500, 300)
                        ->responsive(true)
                        ->lastByDay(7)
                        ->dateFormat('j F');

        $entregasDelMes = Charts::database($entregas, 'bar', 'highcharts')
                        ->title('Últimos 30 días')
                        ->elementLabel("Entregas")
                        ->dimensions(500, 300)
                        ->responsive(true)
                        ->lastByDay(30)
                        ->dateFormat('j F');


        return view('index', compact(['entregasDelAnho', 'entregasDeLaSemana', 'entregasDelMes']));
    }
}
