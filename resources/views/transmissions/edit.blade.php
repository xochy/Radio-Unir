@extends('layouts.app')    
@section('content')
<h3>Edición de transmisión</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('stations.index') }}">Estaciones</a></li>
        <li class="breadcrumb-item"><a href="{{ route('transmissions.index') }}">Transmisiones</a></li>
        <li class="breadcrumb-item"><a href="{{ route('showMyTransmissions') }}">Mis transmisiones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edición de {{$transmission->name}}</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de edición de trasmisión</div>
    <div class="card-body">
    @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('transmissions.update', $transmission->slug) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('transmissions.form')
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection