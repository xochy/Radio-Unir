@extends('layouts.app')    
@section('content')
<div class="container py-5">
    <h1>¿Desea eliminar el registro de {{ $transmission->name }}?</h1>
    <form method="POST" action="{{ route('transmissions.destroy', $transmission->slug) }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="redondo btn btn-danger">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
        <a class="redondo btn btn-secondary" href="{{ route('cancelAction') }}">
            <i class="fas fa-ban"></i> Cancelar
        </a>
    </form>
</div>
@endsection