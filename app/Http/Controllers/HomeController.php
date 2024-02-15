<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\TblCentro;
use App\Models\TblFichaCaracterizacion;
use App\Models\TblInstructor;
use App\Models\TblPrograma;
use App\Models\TblRegionales;
use App\Models\TblVigencia;
use Illuminate\Http\Request;
use App\Models\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = User::count();
        $conteoProgramas = TblPrograma::count();
        $centros = TblCentro::get();
        $archivos = Archivo::count();
        $fichas = TblFichaCaracterizacion::count();
        $vigencias = TblVigencia::count();
        $instructores = TblInstructor::count();
        $regionales = TblRegionales::count();
        return view('home',
                    compact('usersCount',
                            'conteoProgramas',
                            'centros',
                            'archivos',
                            'fichas',
                            'vigencias',
                            'instructores',
                            'regionales'
                                        ));


        // return view('home');
    }
}
