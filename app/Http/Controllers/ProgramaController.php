<?php

namespace App\Http\Controllers;

use App\Models\TblCompetencia;
use App\Models\TblPrograma;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
// use Symfony\Component\HttpFoundation\RedirectResponse;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('programas.index')) {

            $programas = TblPrograma::get();
            // $programas = TblPrograma::with('competencias')->get();

            $competencias = TblCompetencia::get();

            return view('programas.programas', ['programas' => $programas, 'competencias' => $competencias]);

        } else {
            // Almacena un mensaje en la sesión
            session()->flash('acceso_denegado', 'Acceso denegado');
            return redirect()->route('home');

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasPermissionTo('programas.create')) {

            return view('programas.crearprograma');

        } else {

            // Almacena un mensaje en la sesión
            session()->flash('acceso_denegado', 'Acceso denegado');
            return redirect()->route('programas.index'); // Redirige a la página anterior

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // validacion de los input requeridos
        $this->validate($request, [
            'prog_codigoPrograma' => ['required', 'numeric', 'min:1'],
            'prog_Denominacion' => ['required'],
            'prog_Version' => ['required', 'numeric', 'min:1'],
            'prog_Estado' => ['required'],
            'prog_NivelFormacion' => ['required'],
            'prog_HorasEstimadas' => ['required','numeric', 'min:1'],
            'prog_Creditos' => ['required','numeric', 'min:1'],
            'prog_DuracionMeses' => ['required','numeric', 'min:1'],
            'prog_etapaLectiva' => ['required','numeric', 'min:1'],
            'prog_etapaProductiva' => ['required','numeric', 'min:1'],
            'prog_totalHoras' => ['required','numeric', 'min:1'],
            'prog_justificacion' => ['required'],
            'prog_metodologia' => ['required'],
            'prog_Descripcion' => ['required'],
        ]);

//         dd($request->all());
        TblPrograma::create($request->all());
        return redirect()->route('programas.index')->with('success','Nuevo Programa Creado Exitoxamente¡');
    }

    /**
     * Display the specified resource.
     */
    public function show(TblPrograma $tblPrograma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TblPrograma $tblPrograma, string $prog_codigoPrograma):View
    {


        $dato = $tblPrograma->where('prog_codigoPrograma', $prog_codigoPrograma)->get();


        return view('programas.editarprograma', ['programa'=> $dato]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
     {
        // dd( TblPrograma::find($id) );
        // dd( $request -> input() );

        // validacion de los input requeridos
        $request->validate([
            'prog_Denominacion' => 'required',
            'prog_HorasEstimadas' => 'required',
            'prog_Creditos' => 'required'
        ]);

        $programa = TblPrograma::find( $id );

        $programa->prog_codigoPrograma = $request->prog_codigoPrograma;
        $programa->prog_Denominacion = $request->prog_Denominacion;
        $programa->prog_version = $request->prog_version;
        $programa->prog_Estado = $request->prog_Estado;
        $programa->prog_HorasEstimadas = $request->prog_HorasEstimadas;
        $programa->prog_Creditos = $request->prog_Creditos;
        $programa->prog_Descripcion = $request->prog_Descripcion;
        $programa->prog_DuracionMeses = $request->prog_DuracionMeses;
        $programa->prog_NivelFormacion = $request->prog_NivelFormacion;

        $programa->prog_etapaLectiva = $request->prog_etapaLectiva;
        $programa->prog_etapaProductiva = $request->prog_etapaProductiva;
        $programa->prog_totalHoras = $request->prog_totalHoras;
        $programa->prog_justificacion = $request->prog_justificacion;
        $programa->prog_metodologia = $request->prog_metodologia;

        if( $programa->save() ) {
         return redirect()->route('programas.index')->with('success','Programa Actualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        // $tblPrograma->delete();
        // return redirect()->route('programas.index');


        $programa = TblPrograma::find($id);
        // dd(TblPrograma::find($id));
        $programa->delete();
        return redirect()->route('programas.index')->with('success','Programa eliminado exitosamente') ;

    }
}
