<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

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
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'ano_publica' => 'required',
            'edicion' => 'required',
            'ejemplares' => 'required',
            'disponibles' => 'required|lte:ejemplares'
        ],[
            'titulo.required' => '* título requerido *',
            'autor.required' => '* autor requerido*',
            'ano_publica.required' => '* año de publicación requerido *',
            'edicion.required' => '* número de edición requerido *',
            'ejemplares.required' => '* número de ejemplares existentes es requerido *',
            'disponibles.required' => '* número de ejemplares existentes disponibles es requerido *',
            'disponibles.lte' => '* ejemplares disponibles no puede ser mayor a los existentes *'
        ]);
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
