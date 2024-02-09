<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TblCompetencia extends Model
{
    use HasFactory;

    protected $primaryKey = 'comp_codigoCompetencia';
    protected $fillable = ['comp_Denominacion','comp_codigoCompetencia','comp_VersionNCl','comp_DuracionEstimada','comp_Creditos',
                            'comp_Horas_FI','Codigo_programa'];

    public function eventos():HasMany
    {
        return $this->hasMany(Evento::class, 'Codigo_competencia');
    }

    public function programarelacionado():BelongsTo {
        return $this->belongsTo(TblPrograma::class, 'Codigo_programa');
    }

    public function resultadoAprendizajes() {
        return $this->hasMany(tblResultadoAprendizaje::class,'Codigo_competencias');
    }
}
