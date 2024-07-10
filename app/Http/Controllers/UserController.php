<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('modules.users.index', compact('users'));
    }

    public function create()
    {
        //* Creamos un nuevo registro con los datos desde el formulario
        return view('modules.users.create');
    }

    public function store(Request $request)
    {
        //* Crea un nuevo usuario con los datos proporcionados
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        //* Redirige de vuelta a la lista de usuarios
        return redirect()->route('users.index')->with('success', 'Usuario (ADMIN) cargado exitosamente');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //* Función para eliminar un usuario (ADMIN)

        $id = Auth::user()->id; //* configo el id del usuario activo

        //* valido para no borrar el usuario activo 
        if ($user->id === $id) {
            return redirect()->route('users.index')->with('msg_error', 'No puede borrar el Usuario (ADMIN) activo actualmente en el sistema');
        }

        User::findOrFail($user->id)->delete();

        return redirect()->route('users.index')->with('success', 'Usuario (ADMIN) eliminado exitosamente');
    }
}
