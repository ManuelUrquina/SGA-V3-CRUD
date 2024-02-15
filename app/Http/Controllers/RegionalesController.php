<?php

namespace App\Http\Controllers;

use App\Models\TblRegionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = TblRegionales::get();

        return view('Regionales.regionales', ['regionales' => $regionales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = TblRegionales::get();
        //return view('centros.crearCentro', ['regionales' => $regionales]);
        //dd($regionales);
        return view('Regionales.crearRegionales', compact('regionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'reg_Denominacion'=>'required|string'
        ]);
        //dd($request->all());
        TblRegionales::create($request->all());

        return redirect()->route('regionales.index');
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
        $regionales = TblRegionales::find($id);

        //return view('centros.crearCentro', ['regionales' => $regionales]);

        // return view('centros.crearCentro', compact('regionales', ));
        return view('Regionales.editarRegionales', compact('regionales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'reg_Denominacion'=>'required|string'
        ]);
        $regionales = TblRegionales::find($id);
        $regionales->update($request->all());
        // dd($centro);

        return redirect()->route('regionales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $regionales = TblRegionales::find($id);
        $regionales->delete();
        return redirect()->back();
    }
}
