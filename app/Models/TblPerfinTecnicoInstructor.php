<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblPerfinTecnicoInstructor extends Model
{
    use HasFactory;
    protected $table = 'tbl_perfil_tecnico_del_instructors';
    protected $primaryKey = 'Codigo';

    protected $fillable = ['per_RequisitosAcademicos', 'per_Experiencia', 'per_CompetenciasMinimas', 'per_Observacion'];

    public function resultadoAprendisaje():BelongsTo{
        return $this->belongsTo(tblResultadoAprendizaje::class,'Codigo_ra');
    }
}
