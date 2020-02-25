@extends('layouts.app')    
@section('content')
<h3>Estaciones de radio</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Estaciones</li>
	</ol>
</nav>

@if (session('datos'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('datos') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (Auth::user()->authorizeRolesShow('admin'))
    <a href="{{ route('stations.create') }}" class="btn btn-primary">Crear nueva estación de radio</a>
@endif
    <div class="row">
        @foreach ($stations as $station)
            <div class="col-sm">
                <div class="card text-center" style="width: 18rem; margin-top: 30px;">
                    <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$station->image}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $station->name }}</h5>
                        <p class="card-text">{{ $station->description }}</p>
                        <a href="/stations/{{ $station->slug }}" class="btn btn-primary">Ver más...</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>   
@endsection