<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evento extends Model
{
    protected $table = 'tbl_eventos';
    use HasFactory;

    static $rules = [
        'title' => 'required',
        'descripcion' => 'required',
        'start' => 'required',
        'end' => 'required',
        'color' => 'required',
        // 'horaInicio' => 'required',
        // 'horaFinal' => 'required'
    ];

    protected $fillable = ['title','descripcion','color', 'start','end','horaInicio','horaFinal','Codigo_ficha', 
                            'Codigo_resultado_aprendizaje','Codigo_instructor', 'Codigo_ambiente','Codigo_competencia'];

    public function resultadoAprendizaje():BelongsTo
    {
        return $this->belongsTo(tblResultadoAprendizaje::class, 'Codigo_resultado_aprendizaje');
    }

    public function instructor():BelongsTo
    {
        return $this->belongsTo(TblInstructor::class, 'Codigo_instructor');
    }

    public function fichaCaracterizacion():BelongsTo
    {
        return $this->belongsTo(tblFichaCaracterizacion::class, 'Codigo_ficha');
    }

    public function ambiente():BelongsTo
    {
        return $this->belongsTo(tblAmbiente::class, 'Codigo_ambiente');
    }
    public function competencia():BelongsTo
    {
        return $this->belongsTo(TblCompetencia::class, 'Codigo_competencia');
    }
    
}
