<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;

class UsuariosVencidosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuarios:vencidos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina los usuarios vencidos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //obtenemos todos los usuarios cuya fecha de vencimiento es anterior a la fecha actual
        $users = User::where('fechaVencida', '<', Carbon::now()->format('y-m-d'))->get();
        
        foreach ($users as $user) {
            $user->delete();
        }

        $this->info('Usuarios vencidos eliminados');
    }
}
