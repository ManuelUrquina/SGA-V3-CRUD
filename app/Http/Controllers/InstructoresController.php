<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\TblInstructor;
use App\Models\TblVigencia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InstructoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructores = TblInstructor::get();

        return view('instructores.instructores',['instructores' => $instructores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vigencias = TblVigencia::all();

        return view('instructores.crearinstructor', ['vigencias' => $vigencias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $instructor = TblInstructor::create($request->all());

        return redirect()->route('instructores.index');
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
        $instructor = TblInstructor::find($id);
        $vigencias = TblVigencia::all();

        return view('instructores.editarinstructor', ['instructor' => $instructor, 'vigencias' => $vigencias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $instructor = TblInstructor::find($id);
        $instructor->update($request->all());

        return redirect()->route('instructores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructor = TblInstructor::find($id);
        $instructor->delete();

        return redirect()->route('instructores.index');
    }
    
}
