<?php

namespace App\Console;

use App\Http\Controllers\UsuariosController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        // nombre de la clase del comando
        Commands\UsuariosVencidosCommand::class,
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        // se Programa el comando para que se ejecute cada día
        // (php artisan schedule:run) para hacer pruebas
        $schedule->command('usuarios:vencidos')->daily();
        // $schedule->command('usuarios:vencidos')->everyMinute();

        //elimina los archivos guardados en el servidor segun el intervalo asignado
        $schedule->command('borrar:archivos')->daily();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
