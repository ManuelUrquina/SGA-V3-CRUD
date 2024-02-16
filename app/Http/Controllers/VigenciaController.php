<?php

namespace App\Http\Controllers;

use App\Models\TblRedes;
use App\Models\TblVigencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VigenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $vigencias = TblVigencia::get();

        $vigencias = DB::table('tbl_vigencias')
            ->join('tbl_redes', 'tbl_vigencias.Codigo_red', '=', 'tbl_redes.Codigo')
            ->select('tbl_redes.*', 'tbl_vigencias.*')
            ->get();


        return view('vigencias.vigencias', ['vigencias' => $vigencias]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $redes = TblRedes::get();
       // dd($red);
        return view('vigencias.crearVigencia' ,['redes' => $redes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vigencia = TblVigencia::create($request->all());

        return redirect()->route('vigencias.index');
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
        $vigencia = TblVigencia::find($id);
        $redes = TblRedes::get();

        return view('vigencias.editarVigencia', compact('vigencia','redes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vigencia = TblVigencia::find($id);

        $vigencia->update($request->all());

        return redirect()->route('vigencias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vigencia = TblVigencia::find($id);
        $vigencia->delete();

        return redirect()->back();
    }
}
