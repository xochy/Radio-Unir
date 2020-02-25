@extends('layouts.app')    
@section('content')
<h3>Edición de estación</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('stations.index') }}">Estaciones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edición de {{$station->name}}</li>
	</ol>
</nav>

<div class="card">
    <div class="card-header">Formulario de edición de estación</div>
    <div class="card-body">
        @include('common.errors')
        <form class="form-group" method="POST" action="{{ route('stations.update', $station->slug) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('stations.form')
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection