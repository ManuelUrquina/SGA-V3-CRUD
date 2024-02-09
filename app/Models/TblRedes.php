<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblRedes extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';

    protected $fillable = 'red_Denominacion';



public function vigencias(){

 return $this->hasmany(TblVigencia::class, "Codigo_red");
}

}
