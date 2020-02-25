@extends('layouts.app')    
@section('content')
<h3>Lista de transmisiones <span class="badge badge-secondary">Nuevas transmisiones todos los días</span></h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('stations.index') }}">Estaciones</a></li>
		<li class="breadcrumb-item active" aria-current="page">Transmisiones</li>
	</ol>
</nav>

@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('cancelAction'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	{{ session('cancelAction') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (Auth::user()->authorizeRolesShow(['user', 'admin']))
	<a href="{{ route('showMyTransmissions') }}" class="btn btn-warning" style="margin-bottom: 20px;">Ver mis transmisiones</a>
    <a href="{{ route('transmissions.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Crear nueva transmisión de radio</a>
@endif
<table class="table">
		<thead>
		<tr>
			<th scope="col">Nombre</th>
			<th scope="col">Tema</th>
			<th scope="col">Locutor</th>
			<th scope="col">Punto de montaje</th>
			<th scope="col">Estación</th>
			<th scope="col">Fecha</th>
			<th scope="col">Hora</th>
		</tr>
	</thead>
		@foreach ($transmissions as $transmission)
			<tr>
				<td>{{ $transmission->name }}</td>
				<td>{{ $transmission->theme }}</td>
				<td>{{ $transmission->User()->first()->name }}</td>
				<td>{{ $transmission->url }}</td>
				<td>{{ $transmission->Station()->first()->name }}</td>
				<td>{{ $transmission->date }}</td>
				<td>{{ $transmission->hour }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
{{$transmissions}}
@endsection