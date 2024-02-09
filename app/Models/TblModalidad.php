<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TblModalidad extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = ['mod_Denominacion'];

    public function fichas(): HasMany {
        return $this->hasMany(TblFichaCaracterizacion::class, 'Codigo_modalidad');
    }
}
