@extends('modules.libros.form')

@section('titulo-index', 'Carga de un nuevo Libro')

@section('accion')
    action = "{{ route('libros.store') }}"
@endsection