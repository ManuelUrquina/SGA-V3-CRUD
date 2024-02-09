<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblEstadoAmbiente extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = ['est_Denominacion', 'est_FichaTecnica'];

    public function ambientes() {
        return $this->hasMany(TblAmbiente::class, "Codigo_estado");
    }
}
