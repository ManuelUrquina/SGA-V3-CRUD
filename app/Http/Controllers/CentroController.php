<?php

namespace App\Http\Controllers;

use App\Models\TblCentro;
use App\Models\TblRegionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CentroController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$centros = TblCentro::get();
        $centros = DB::table('tbl_centro_formacions')
            ->join('tbl_regionales', 'tbl_centro_formacions.Codigo_regional', '=', 'tbl_regionales.Codigo')
            ->select('tbl_regionales.*', 'tbl_centro_formacions.*')
            ->get();
        //dd($centros);
        return view('centros.centros', ['centros' => $centros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $regionales = TblRegionales::get();
        //return view('centros.crearCentro', ['regionales' => $regionales]);
       // dd($regionales);
        return view('centros.crearCentro', compact('regionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'cent_Denominacion'=>'required|string'
        ]);
        //dd($request->all());
        TblCentro::create($request->all());

        return redirect()->route('centros.index');
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
        $centro = TblCentro::find($id);
        $regionales = TblRegionales::get();
        //return view('centros.crearCentro', ['regionales' => $regionales]);

       // return view('centros.crearCentro', compact('regionales', ));
        return view('centros.editarCentros', compact('regionales','centro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cent_Denominacion'=>'required|string'
        ]);

        $centro = TblCentro::find($id);
        $centro->update($request->all());
        // dd($centro);

        return redirect()->route('centros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $centro = TblCentro::find($id);
        $centro->delete();

        return redirect()->back();
    }
}
