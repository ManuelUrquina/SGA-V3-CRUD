<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblRegionales extends Model
{
    use HasFactory;
    //protected $primaryKey = 'Codigo';
    protected $fillable = ['Codigo', 'reg_Denominacion', 'created_at', 'updated_at'];
}
