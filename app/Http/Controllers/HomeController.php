<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;

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
        $chartPapel = Charts::create('percentage', 'justgage')
                        ->title('Papel')
                        ->elementLabel('% usado')
                        ->values([($collectionPoint->papel_actual / $collectionPoint->papel_max * 100),0,100])
                        ->responsive(true)
                        ->height(300)
                        ->width(0);


        return view('home', compact([]));
    }
}
