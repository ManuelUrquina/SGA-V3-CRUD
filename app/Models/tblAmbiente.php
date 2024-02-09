<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblAmbiente extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = ['amb_Denominacion','amb_Cupo', 'Codigo_tipo', 'Codigo_estado'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'Codigo_ambiente');
    }

    public function tipoAmbiente() {
        return $this->belongsTo(TblTipoAmbiente::class, 'Codigo_tipo');
    }
    public function estadoAmbiente() {
        return $this->belongsTo(TblEstadoAmbiente::class,'Codigo_estado');
    }
}
