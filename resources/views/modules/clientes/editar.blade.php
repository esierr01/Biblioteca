@extends('modules.clientes.form')

@section('titulo-index', 'Editar un Cliente existente')

@section('accion')
    action = "{{ route('clientes.update', $cliente) }}"
@endsection

@section('metodo')
    @method('PUT')
@endsection