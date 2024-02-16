<?php

namespace App\Http\Controllers;

use App\Models\TblCompetencia;
use App\Models\TblPrograma;
use App\Models\tblResultadoAprendizaje;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competencias = TblCompetencia::get();
        $raps = tblResultadoAprendizaje::get();

        return view('competencias.competencias', ['competencias'=>$competencias, 'raps'=>$raps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $competencias = TblCompetencia::all();
        $programas = TblPrograma::all();
        return view('competencias.crearCompetencias', ['programas'=>$programas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TblCompetencia::create($request->all());
        // dd($request->all());
        return redirect()->route('competencias.index');

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
        // dd($id);
        $competencia = TblCompetencia::find($id);
        $programas = TblPrograma::all();

        return view('competencias.editarCompetencia', ['competencia' =>$competencia,'programas'=>$programas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $competencia =TblCompetencia::find($id);
        $competencia->update($request->all());

        return redirect()->route('competencias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        $competencia = TblCompetencia::find($id);
        $competencia->delete();
        // dd($competencia);
        return redirect()->route('competencias.index');
    }
}
