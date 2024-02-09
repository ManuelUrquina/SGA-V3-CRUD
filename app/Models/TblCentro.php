<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblCentro extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';
    protected $table = 'tbl_centro_formacions';

    protected $fillable = ['cent_Denominacion','Codigo_regional'];

    public function fichas() {
        return $this->hasMany(TblFichaCaracterizacion::class,'Codigo_centro');
    }
}
