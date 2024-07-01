<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterfaceController extends Controller
{
    //* Página de inicio del Sistema (frontend)
    public function index(Request $request)
    {
        $query = $request->input('query');

        $libros = Libro::where('estatus', 0)
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('titulo', 'like', '%' . $query . '%')
                    ->orWhere('autor', 'like', '%' . $query . '%');
            })
            ->get();

        return view('interface.index', compact('libros'));
    }

    //* Página de acerca del Sistema (frontend)
    public function acerca()
    {
        return view('interface.acerca');
    }

    //* Página de contacto del Sistema (frontend)
    public function contacto()
    {
        return view('interface.contacto');
    }

    //* Pagina de login de gestión del Sistema (frontend)
    public function login()
    {
        return view('interface.login');
    }

    //* Función de validación del login de gestión del Sistema (frontend)
    public function valida_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ],[
            'email.required' => 'El e-mail es requerido',
            'email.email' => 'Email con formato invalido',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener longitud minima de 8 carácteres'
        ]);

        //* validamos si los datos de acceso estan en la tabla User
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('index_menu');
        }
        return back()->withErrors(['invalid_credentials' => 'Usuario o contraseña invalidos !!']);
    }

    public function signout()
    {
        Auth::logout();
        return redirect()->route('interface.index');
    }
}
