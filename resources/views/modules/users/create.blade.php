@extends('modules.users.form')

@section('titulo-index', 'Carga de un nuevo Usuario (ADMIN)')

@section('accion')
    action = "{{ route('users.store') }}"
@endsection
