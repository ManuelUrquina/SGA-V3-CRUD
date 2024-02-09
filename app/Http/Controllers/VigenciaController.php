<?php

namespace App\Http\Controllers;

use App\Models\TblVigencia;
use Illuminate\Http\Request;

class VigenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vigencias = TblVigencia::get();
        return view('vigencias.vigencias', ['vigencias' => $vigencias]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vigencias.crearVigencia');
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

        return view('vigencias.editarVigencia', ['vigencia' => $vigencia]);
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
