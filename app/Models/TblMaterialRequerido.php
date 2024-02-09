<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblMaterialRequerido extends Model
{
    use HasFactory;
    // protected $table = 'TblMaterialRequerido';
    protected $primaryKey = 'Codigo';

    protected $fillable = ['mat_Denominacion', 'mat_Observacion'];

    public function resultadoAprendisaje():BelongsTo{
        return $this->belongsTo(tblResultadoAprendizaje::class,'Codigo_ra');
    }
}
