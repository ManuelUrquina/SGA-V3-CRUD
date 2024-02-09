<?php

namespace App\Http\Controllers;

use App\Models\TblRedes;
use Illuminate\Http\Request;

class RedesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $redes = TblRedes::get();
        return view('redes', ['redes' => $redes]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('redes.crearRedes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $redes = TblRedes::create($request->all());

        return redirect()->route('redes.index');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
