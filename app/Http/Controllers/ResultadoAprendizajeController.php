<?php

namespace App\Http\Controllers;

use App\Models\TblCompetencia;
use App\Models\TblCriterioEvaluacion;
use App\Models\TblPrograma;
use App\Models\tblResultadoAprendizaje;
use Illuminate\Http\Request;

class ResultadoAprendizajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raps = tblResultadoAprendizaje::get();
        return view('competencias.competencias', ['raps' => $raps]);
    }


    public function create()
    {
        $competencias = TblCompetencia::all();
        $programas = TblPrograma::all();
        return view('rap.crearRap', ['competencias' => $competencias, 'programas'=>$programas]);
    }

    //metodo para asociar los programas a las competencias en los selets
    public function optenerCompetencia($programaId)
    {
        // competencias asociadas al programa seleccionado
        $competencias = TblCompetencia::where('Codigo_programa', $programaId)->get();
        //competencias en formato JSON
        return response()->json($competencias);
    }


    public function store(Request $request)
    {
        // Creamos un TblresultadoAprendisaje con los datos del formulario
        $resultado = tblResultadoAprendizaje::create($request->all());
       // dd($resultado);
        // vinculamos los datos del formulario y lo asociarlo a su respectivo modelo mediante su relacion hasmany
        $resultado->criteriosEvaluacion()->create($request->all());
        $resultado->conceptoPrincipios()->create($request->all());
        $resultado->procesos()->create($request->all());
        $resultado->perfiltecnicoInstructor()->create($request->all());
        $resultado->materialRequerido()->create($request->all());

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
    public function edit(int $id)
    {
        $rap = tblResultadoAprendizaje::all();
        $criterios= TblCriterioEvaluacion::all();
        $programas = TblPrograma::all();
        $competencias = TblCompetencia::all();
       // dd($rap);
        return view('rap.editarRap', ['rap'=>$rap,'criterios'=>$criterios, 'competencias'=>$competencias, 'programas'=>$programas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rap = tblResultadoAprendizaje::find($id);
        // dd($rap);
        $rap->update($request->all());

        $rap->criteriosEvaluacion()->update($request->only('cri_Denominacion'));
        $rap->conceptoPrincipios()->update($request->only('con_Denominacion'));
        $rap->procesos()->update($request->only('pro_Denominacion'));
        $rap->perfiltecnicoInstructor()->update($request->only(
            'per_RequisitosAcademicos',
            'per_Experiencia',
            'per_CompetenciasMinimas',
            'per_Observacion'
        ));
        $rap->materialRequerido()->update($request->only('mat_Denominacion'));

        return redirect()->route('competencias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rap = tblResultadoAprendizaje::find($id);
        $rap->delete();
        return redirect()->back();
    }
}
