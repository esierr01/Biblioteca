<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::where('estatus', 0)->get();
        return view('modules.clientes.index', compact('clientes'));
    }

    public function index_eliminados()
    {
        $clientes = Cliente::where('estatus', 1)->get();
        return view('modules.clientes.index_eliminados', compact('clientes'));
    }

    public function create()
    {
        return view('modules.clientes.create');
    }

    public function store(Request $request)
    {
        $libro = Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente cargado exitosamente');
    }

    public function show(Cliente $cliente)
    {
        //
    }

    public function edit(Cliente $cliente)
    {
        return view('modules.clientes.editar', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->input());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy(Cliente $cliente)
    {
        if ($cliente->estatus == 0) {
            $existeRegistro = Prestamo::where('id_cliente', $cliente->id)->exists();

            if ($existeRegistro) {
                return redirect()->route('clientes.index')->with('msg_error', 'Cliente seleccionado no puede ser eliminado, porque tiene prestamos activos pendientes');
            } else {
                $cliente->estatus = 1;
                $cliente->fecha_eliminado = date('y-m-d H:i:s');
                $cliente->save();
                return redirect()->route('clientes.index')->with('success', 'Cliente seleccionado fue eliminado');
            }
        } else {
            $cliente->estatus = 0;
            $cliente->fecha_eliminado = null;
            $cliente->save();
            return redirect()->route('clientes.index_eliminados')->with('success', 'Cliente seleccionado fue restaurado con exito');
        }
    }
}
