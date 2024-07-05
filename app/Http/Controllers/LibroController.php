<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::where('estatus', 0)->get();
        return view('modules.libros.index', compact('libros'));
    }

    public function index_eliminados()
    {
        $libros = Libro::where('estatus', 1)->get();
        return view('modules.libros.index_eliminados', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.libros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $libro = Libro::create($request->all());

        if ($request->hasFile('caratula')) {
            $originalFileName = $request->file('caratula')->getClientOriginalExtension();
            $newFileName = $libro->id . '.' . $originalFileName; // Asume que $registroId contiene el ID del registro
            $rutaArchivo = $request->file('caratula')->storeAs('img', $newFileName, 'public');

            $libro->caratula = 'img/' . $newFileName;
            $libro->save();
        }

        return redirect()->route('libros.index')->with('success', 'Libro cargado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('modules.libros.editar', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        if ($request->hasFile('caratula')) {
            Storage::disk('public')->delete($libro->caratula);

            $originalFileName = $request->file('caratula')->getClientOriginalExtension();
            $newFileName = $libro->id . '.' . $originalFileName;
            $rutaArchivo = $request->file('caratula')->storeAs('img', $newFileName, 'public');

            $libro->caratula = 'img/' . $newFileName;
            $libro->save();
        }

        $libro->update($request->input());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        if ($libro->estatus == 0) {
            if ($libro->ejemplares == $libro->disponibles) {
                $libro->estatus = 1;
                $libro->fecha_eliminado = date('y-m-d H:i:s');
                $libro->save();
                return redirect()->route('libros.index')->with('success', 'Libro seleccionado fue eliminado');
            } else {
                return redirect()->route('libros.index')->with('msg_error', 'Libro seleccionado no puede ser eliminado, porque tiene prestamos pendientes');
            }
        } else {
            $libro->estatus = 0;
            $libro->fecha_eliminado = null;
            $libro->save();
            return redirect()->route('libros.index_eliminados')->with('success', 'Libro seleccionado fue restaurado con exito');
        }
    }
}
