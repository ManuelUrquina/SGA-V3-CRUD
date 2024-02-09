<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TblPrograma extends Model
{
    use HasFactory;

    protected $primaryKey = 'prog_codigoPrograma';

    protected $fillable = ['prog_Denominacion','prog_Version','prog_Estado','prog_HorasEstimadas','prog_Creditos','prog_Descripcion',
                            'prog_DuracionMeses','prog_NivelFormacion','prog_etapaLectiva','prog_etapaProductiva','prog_totalHoras','prog_justificacion','prog_metodologia'];

    public function competencias(): HasMany {
        return $this->hasMany(TblCompetencia::class, 'Codigo_programa');
    }

    public function fichas(): HasMany {
        return $this->hasMany(TblFichaCaracterizacion::class, 'Codigo_programa');
    }

}
