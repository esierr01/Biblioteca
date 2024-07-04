@extends('modules.libros.form')

@section('titulo-index', 'Editar un Libro existente')

@section('accion')
    action = "{{ route('libros.update', $libro) }}"
@endsection

@section('metodo')
    @method('PUT')
@endsection