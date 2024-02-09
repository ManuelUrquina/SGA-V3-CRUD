<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblInstructor extends Model
{ 
    use HasFactory;
    protected $primaryKey = 'Codigo';

    protected $fillable = ['inst_Identificacion','inst_TipoID','inst_Nombres','inst_Apellido','inst_Direccion','inst_Correo','inst_Telefono', 'Codigo_vigencia'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'Codigo_instructor'); 
    }

    //N a 1
    public function vigencia() {
        return $this->belongsTo(TblVigencia::class, 'Codigo_vigencia');
    }

    //metodo para calcular las horas del instructor
    public function horasAsignadas(){
        $diasTotales = 0;
        $total = 0;
        $hoy = Carbon::now(); 
        $horasTotales =0;

        foreach ($this->eventos as $evento) {   
            $fechaInicio = Carbon::parse($evento->start);
            $fechaFin = Carbon::parse($evento->end);
            
            if (($fechaInicio <= $hoy && $fechaFin >=$hoy || $fechaInicio >= $hoy)){            
                $diasTotales += $fechaFin->addDay()->diffInDays($fechaInicio, true);
                // $diasTranscurridos += $hoy->diffInDays($fechaFin, true);
    
                $horaInicio = Carbon::parse($evento->horaInicio);
                $horaFinal = Carbon::parse($evento->horaFinal);
                $horasTotales = intval($horaFinal->diffInHours($horaInicio));                
            }
        }
        $total = $horasTotales * $diasTotales;

        return $total;
    }

}
