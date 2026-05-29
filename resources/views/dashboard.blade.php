@extends('layouts.auth')

@section('title', 'Administra tus Presupuestos')

@section('auth-content')
    @if (session('success'))
        <x-alert :message="session('success')"/>
    @endif
@endsection