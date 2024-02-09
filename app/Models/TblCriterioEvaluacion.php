<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TblCriterioEvaluacion extends Model
{
    use HasFactory;
    protected $table = 'tbl_criterio_de_evaluacions';

    protected $primaryKey = 'Codigo';

    protected $fillable = ['cri_Denominacion','cri_Observacion'];

    public function resultadoAprendisaje():BelongsTo{
        return $this->belongsTo(tblResultadoAprendizaje::class,'Codigo_ra');
    }
}
