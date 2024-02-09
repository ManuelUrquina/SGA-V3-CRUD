<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblTipoAmbiente extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = ['tip_Denominacion'];

    public function ambientes() {
        return $this->hasMany(TblAmbiente::class, "Codigo_tipo");
    }
}
