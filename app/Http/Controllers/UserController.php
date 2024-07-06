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
        $id = Auth::user()->id; //* id del usuario activo

        if ($user->id === $id) {
            return redirect()->route('users.index')->with('msg_error', 'No puede borrar el cliente activo actualmente en el sistema');
        }

        User::findOrFail($user->id)->delete();

        return redirect()->route('users.index')->with('success', 'Usuario (ADMIN) eliminado exitosamente');
    }
}
