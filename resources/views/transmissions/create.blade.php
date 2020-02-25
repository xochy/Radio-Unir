@extends('layouts.app')    
@section('content')
<h3>Registra tu nueva transmisión en radio UNIR</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('stations.index') }}">Estaciones</a></li>
		<li class="breadcrumb-item"><a href="{{ route('transmissions.index') }}">Transmisiones</a></li>
		<li class="breadcrumb-item active" aria-current="page">Crear nueva transmisión</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de registro de trasmisión</div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('transmissions.store') }}" enctype="multipart/form-data">
            @csrf
            @include('transmissions.form')
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection