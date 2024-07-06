@extends('modules.prestamos.form')

@section('titulo-index', 'Carga de un nuevo Prestamo')

@section('accion')
    action = "{{ route('prestamos.store') }}"
@endsection
