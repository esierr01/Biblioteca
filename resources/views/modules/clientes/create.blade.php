@extends('modules.clientes.form')

@section('titulo-index', 'Carga de un nuevo Cliente')

@section('accion')
    action = "{{ route('clientes.store') }}"
@endsection
