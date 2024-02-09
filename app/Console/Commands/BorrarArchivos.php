<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Archivo;

class BorrarArchivos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'borrar:archivos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina los archivos despues de determinado tiempo';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //se eliminaran los archivos cada 60 dias
        $archivos = Archivo::where('created_at', '<', Carbon::now()->subDays(60))->get();
    
        foreach ($archivos as $archivo) {
            $archivo->delete();
        }
    }

    

}
