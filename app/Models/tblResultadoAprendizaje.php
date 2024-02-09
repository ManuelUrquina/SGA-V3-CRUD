<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tblResultadoAprendizaje extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = [ 'resul_Denominacion', 'Codigo_competencias'];

    public function eventos():HasMany
    {
        return $this->hasMany(Evento::class, 'Codigo_resultado_aprendizaje');
    }
    public function competencia(){
        return $this->belongsTo(TblCompetencia::class,'Codigo_competencias');
    }

    //RAPs
    public function criteriosEvaluacion():HasMany{
        return $this->hasMany(TblCriterioEvaluacion::class,'Codigo_ra');
    }
    public function conceptoPrincipios():HasMany{
        return $this->hasMany(TblConceptoPrincipio::class,'Codigo_resultado_aprendizaje');
    }
    public function procesos():HasMany{
        return $this->hasMany(TblProceso::class,'Codigo_ra');
    }
    public function perfiltecnicoInstructor():HasMany{
        return $this->hasMany(TblPerfinTecnicoInstructor::class,'Codigo_ra');
    }
    public function materialRequerido():HasMany{
        return $this->hasMany(TblMaterialRequerido::class,'Codigo_ra');
    }

}
