<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
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

    public function create()
    {
        return view('modules.libros.create');
    }

    public function store(Request $request)
    {
        //* Creamos un nuevo registro con los datos desde el formulario
        $libro = Libro::create($request->all());

        if ($request->hasFile('caratula')) {
            $originalFileName = $request->file('caratula')->getClientOriginalName(); // Corrección aquí
            $newFileName = $libro->id . '.' . $request->file('caratula')->getClientOriginalExtension();
            $rutaArchivo = $request->file('caratula')->storeAs('img', $newFileName, 'public');

            $libro->caratula = 'img/' . $newFileName;
            $libro->save();
        } else {
            $newFileName = $libro->id . '.png';
            $defaultImagePath = public_path('libs/img/no_disponible.png');
            $destinationPath = storage_path('app/public/img/'.$newFileName);
            // Copia la imagen
            copy($defaultImagePath, $destinationPath);

            $libro->caratula = 'img/' . $newFileName;
            $libro->save();
        }

        return redirect()->route('libros.index')->with('success', 'Libro cargado exitosamente');
    }

    public function show(Libro $libro)
    {
        //
    }

    public function edit(Libro $libro)
    {
        //* Abrimos el formulario de edicion
        return view('modules.libros.editar', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        // Verificamos si hay un cambio de carátula para borrar la anterior y copiar la nueva
        if ($request->hasFile('caratula')) {
            if ($libro->caratula) {
                // Verifica si el archivo existe en el disco 'public'
                if (Storage::disk('public')->exists($libro->caratula)) {
                    // Si el archivo existe, lo elimina
                    Storage::disk('public')->delete($libro->caratula);
                }
            }

            $originalFileName = $request->file('caratula')->getClientOriginalExtension();
            $newFileName = $libro->id . '.' . $originalFileName;
            $rutaArchivo = $request->file('caratula')->storeAs('img', $newFileName, 'public');

            $libro->caratula = 'img/' . $newFileName;
            $libro->save();
        }

        //* Actualizamos con los datos del formulario
        $libro->update($request->input());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(Libro $libro)
    {
        //* Función para eliminar / restaurar, si esta con estatus=0 (no eliminado, lo podemos eliminar), si esta con estatus =1 (si eliminado, lo podemos restaurar)
        if ($libro->estatus == 0) {

            //* Verificamos si el libro tiene libros en prestamos (diferencia entre ejemplares y disponibles), si los tiene no se le puede borrar hasta que los libros sean devueltos
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
