@extends('layouts.app')    
@section('content')
<h3>Tu estación {{$station->name}}</h3>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('stations.index') }}">Estaciones</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$station->name}}</li>
	</ol>
</nav>

@include('common.success')

    <img style="height: 200px; width: 200px; background-color: #EFEFEF; margin: 20px;"
    class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$station->image}}" alt="">

    <div class="text-center">
        <h5 class="card-title">{{ $station->name }}</h5>
        <p class="card-text">{{ $station->description }}</p>       
        @if (Auth::user()->authorizeRolesShow('admin'))
            <a href="/stations/{{ $station->slug }}/edit" class="btn btn-primary btn-lg" style="margin-bottom: 10px;">Editar</a>
            <form class="form-group" method="POST" action="/stations/{{ $station->slug }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-lg">Eliminar</button>
            </form>
        @endif
    </div>
@endsection