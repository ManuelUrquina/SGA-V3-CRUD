<?php

namespace App\Http\Controllers;

use App\Models\TblCentro;
use App\Models\TblFichaCaracterizacion;
use App\Models\TblModalidad;
use App\Models\TblPrograma;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){
        $fichas = TblFichaCaracterizacion::get();
        $modalidades = DB::table('tbl_ficha_caracterizacions')
            ->join('tbl_modalidads', 'tbl_ficha_caracterizacions.Codigo_modalidad', '=', 'tbl_modalidads.id')
            ->select('tbl_ficha_caracterizacions.*', 'tbl_modalidads.*')
            ->get();
        $centro = DB::table('tbl_ficha_caracterizacions')
            ->join('tbl_centro_formacions', 'tbl_ficha_caracterizacions.Codigo_centro', '=', 'tbl_centro_formacions.Codigo')
            ->select('tbl_ficha_caracterizacions.*', 'tbl_centro_formacions.*')
            ->get();

        $hoy = Carbon::now();
        $fichas->each(function($ficha) use ($hoy){
            $fechainicial = Carbon::parse($ficha->fich_Inicio);
            $fechaFinal = Carbon::parse($ficha->fich_Fin);
            $diasTotal = $fechaFinal->diffInDays($fechainicial ,true);

            $diasRestantes = $hoy->diffInDays($fechainicial, true);
            $porcentaje = ($diasRestantes/$diasTotal)*100;

            $ficha->diasPorcentaje = min(round($porcentaje), 100);
            if($diasRestantes > $diasTotal){ $diasRestantes = 0; };
            $ficha->diasRestantes = $diasRestantes;
            $ficha->diasTotal = $diasTotal;
        } );

        return view('fichas.fichas', compact('fichas','modalidades','centro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $programas = TblPrograma::all();
        $modalidad = TblModalidad::all();
        $centros = TblCentro::all();
        return view('fichas.crearFicha', ['programas' => $programas, 'modalidad' => $modalidad, 'centros' => $centros]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // dd($request->all());

        $fichas = TblFichaCaracterizacion::create($request->all());

        return redirect()->route('fichas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $ficha = TblFichaCaracterizacion::find($id);
        $programas = TblPrograma::all();
        $modalidad = TblModalidad::all();
        $centros = TblCentro::all();

        return view('fichas.editarFicha', ['ficha' => $ficha, 'programas' => $programas, 'modalidad' => $modalidad, 'centros' => $centros]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ficha = TblFichaCaracterizacion::find($id);
        $ficha->update($request->all());

        return redirect()->route('fichas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ficha = TblFichaCaracterizacion::find($id);
        $ficha->delete();

        return redirect()->back();
    }
}
