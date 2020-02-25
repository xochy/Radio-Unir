@extends('layouts.app')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://mcdn.wallpapersafari.com/medium/43/22/5dF6au.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Conoce las mejores estaciones de radio</h5>
                <p>Tenemos registradas las mejores estaciones de radio de la ciudad.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://www.pwu.ca/wp-content/uploads/2017/08/radio-ads-top-banner.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tus transmisiones organizadas</h5>
                <p>Lleva un control de tus transmisiones con nuestro sistema.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://superstereo.com.mx/wp-content/themes/surplus-concert/assets/images/banner-image.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>El lugar de tus estaciones</h5>
                <p>Crea un control de tus transmisiones asociadas a nuestras estaciones.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="jumbotron" style="margin-top: 20px;">
    <h1 class="display-4">¡Radio UNIR!</h1>
    <p class="lead">Bienvenido a Radio UNIR, ya puedes registrar tus transmisiones de distintas estaciones con nosotros.</p>
    <hr class="my-4">
    <p>Si eres locutor y te gustaría llevar el control de tus trasmisiones en las estaciones más importantes de la cuidad, estás en el lugar correcto.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('stations.index') }}" role="button">Ver estaciones</a>
    <a class="btn btn-success btn-lg" href="{{ route('transmissions.index') }}" role="button">Ver transmisiones</a>
</div>
@endsection
