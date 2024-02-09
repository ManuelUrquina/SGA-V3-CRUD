<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TblConceptoPrincipio extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = ['con_Denominacion','con_Observacion'];

    public function resultadoAprendisaje():BelongsTo{
        return $this->belongsTo(tblResultadoAprendizaje::class,'Codigo_resultado_aprendizaje');
    }
}
