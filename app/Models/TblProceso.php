<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TblProceso extends Model
{
    use HasFactory;
    protected $primaryKey = 'Codigo';

    protected $fillable = ['pro_Denominacion', 'pro_Observacion'];

    public function resultadoAprendisaje():BelongsTo{
        return $this->belongsTo(tblResultadoAprendizaje::class,'Codigo_ra');
    }
}
