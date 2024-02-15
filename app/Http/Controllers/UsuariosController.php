<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;


class UsuariosController extends Controller
{
            /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('usuarios.index')) {
        $usuarios = User::get();
        // $role = Role::get();
        $role = Role::pluck('name', 'id')->all();

        $hoy = Carbon::now()->setTimezone('America/Bogota');
        // $hoy = Carbon::parse('2020-01-01');
        $usuarios->each(function ($usuario) use ($hoy) {
            $vencimiento = Carbon::parse($usuario->fechaVencida);
            // $vencimiento = Carbon::parse('2020-01-15');
            // dd($hoy,$vencimiento);
            $diasRestantes = $hoy->diffInDays($vencimiento->addDay(), true);
            $usuario->diasRestantes = $diasRestantes;
        });

        return view('usuarios.usuarios', ['usuarios'=>$usuarios, 'role'=>$role ]);

        } else {
            // Almacena un mensaje en la sesión
            session()->flash('acceso_denegado', 'Acceso denegado');
            return redirect()->route('home');


        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasPermissionTo('usuarios.create')) {

        $roles = Role::all();
        return view('usuarios.crearusuario', ['roles'=>$roles]);

    } else {
        // Almacena un mensaje en la sesión
        session()->flash('acceso_denegado', 'Acceso denegado');
        return redirect()->route('home');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validacion de los input requeridos
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'date' => 'nullable'
        ]);

        $usuario = User::create($request->all());

        $role = $request->input('role_id');
        $usuario->assignRole($role);


        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd($id);
        $usuario = User::find($id);// Busca el usuario por su id
        $roles = Role::all();

        return view('usuarios.editarusuario', ['usuario'=>$usuario, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $usuario = User::find($id);// Busca el usuario por su id
        $usuario->update($request->all());


        // se asigna el rol que viene del request al usuario
        $usuario->syncRoles($request->input('role_id'));

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        // dd( User::find($id) );

        return redirect()->route('usuarios.index');
    }

    // FUNCIONES ADISIONALES
//     public function usuariosVencidos() {
//         //obtenemos todos los usuarios cuya fecha de vencimiento es anterior a la fecha actual
//         $users = User::where('fechaVencida', '<', Carbon::now()->format('y-m-d'))->get();

//         foreach ($users as $user) {
//             $user->delete();
//         }
//     }
// public function diasRestantes(User $user) {
//     if ($user->fechaVencida == null) {
//         return null;
//     }
//     $hoy = Carbon::now();
//     // Calculamos la diferencia en días
//     $diferencia = $hoy->diffInDays($user->fechaVencida, false);

//     if ($diferencia < 0) {
//         return 0;
//     }
//     dd($diferencia);
//     return $diferencia;
// }


}
