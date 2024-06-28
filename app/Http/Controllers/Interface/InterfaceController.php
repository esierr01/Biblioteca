<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;

class InterfaceController extends Controller
{
    //* Página de inicio del Sistema (frontend)
    public function index()
    {
        $libros = Libro::where('estatus', 0)->get();
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
}
