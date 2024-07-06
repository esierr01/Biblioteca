<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::all();
        return view('modules.prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        //* recuperamos los datos de libros para llenar el select
        $libros = Libro::where('disponibles', '<>', 0)->where('estatus', 0)->orderby('titulo')->get();
        //* recuperamos los datos de clientes para llenar el select
        $clientes = Cliente::where('estatus', 0)->orderby('nombre')->get();

        return view('modules.prestamos.create', compact('libros', 'clientes'));
    }

    public function store(Request $request)
    {
        //* Comprueba si ya existe una transacción con la misma combinación de id_cliente e id_libro
        if (Prestamo::where('id_cliente', $request->id_cliente)->where('id_libro', $request->id_libro)->where('estatus', 0)->exists()) {
            //* Retorna un mensaje de error si ya existe la combinación
            return redirect()->route('prestamos.index')->with('msg_error', 'Ya existe un prestamo ACTIVO con este cliente y libro, imposible crear una igual');
        }

        $prestamo = Prestamo::create($request->all());

        //* recuperamos los datos de libros para modificar la disponibilidad despues del prestamo
        $libro = Libro::find($request->id_libro);
        $libros_disponibles_disminuye = $libro->decrement('disponibles');

        return redirect()->route('prestamos.index')->with('success', 'Prestamo cargado exitosamente');
    }

    public function show(Prestamo $prestamo)
    {
        //
    }

    public function edit(Prestamo $prestamo)
    {
        //
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    public function destroy(Prestamo $prestamo)
    {
        $prestamo->estatus = 1;
        $prestamo->fecha_devuelto = date('y-m-d H:i:s');
        $prestamo->save();

        //* recuperamos los datos de libros para modificar la disponibilidad despues de la devolución
        $libro = Libro::find($prestamo->id_libro);
        $libros_disponibles_aumenta  = $libro->increment('disponibles');

        return redirect()->route('prestamos.index')->with('success', 'Devolución efectuada exitosamente');
    }
}
