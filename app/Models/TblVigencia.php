<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblVigencia extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = ['vig_Contrato', 'vig_anio', 'vig_Inicio', 'vig_Fin', 'vig_Objetos', 'Codigo_red'];

    //relacion 1 a N
    public function instructores() {
        return $this->hasMany(TblInstructor::class, "Codigo_vigencia");
    }

}
