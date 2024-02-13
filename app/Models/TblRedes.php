<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use mysql_xdevapi\Table;

class TblRedes extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo';
    protected $table = 'tbl_redes';
    protected $fillable = 'red_Denominacion';



public function vigencias():BelongsTo{

 return $this->belongsTo(TblVigencia::class, "Codigo_red");
}

}
