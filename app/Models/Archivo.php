<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = ['arc_nombre_archivo', 'arc_descripcion', 'arc_url_descarga', 'usuario_id'];

public function usuario()
{
    return $this->belongsTo(User::class, 'usuario_id');
}


}
