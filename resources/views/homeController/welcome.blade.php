@extends('admin.template.main')


@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="{{ asset('/images/slider/consultoria.jpg') }}" alt="Consultoria">
        <div class="carousel-caption">
          <h3>Consultor&iacute;a</h3>
        </div>
      </div>

      <div class="item">
        <img src="{{ asset('/images/slider/diseno.jpg') }}" alt="Dise&ntilde;os asistidos por computadora ">
        <div class="carousel-caption">
          <h3>Dise&ntilde;os asistidos por computadora</h3>
          <p><a class="btn btn-lg btn-primary" href="{{ url('servicio/1') }}" role="button">Ver m&aacute;s</a></p>
        </div>
      </div>

      <div class="item">
        <img src="{{ asset('/images/slider/fem.jpg') }}" alt="An&aacute;lisis por m&eacute;todo de elementos finitos">
        <div class="carousel-caption">
          <h3>An&aacute;lisis por m&eacute;todo de elementos finitos</h3>
          <p><a class="btn btn-lg btn-primary" href="{{ url('servicio/2') }}" role="button">Ver m&aacute;s</a></p>
        </div>
      </div>


      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>

    </div>

  </div>

  <div class="container marketing"> 
    <h4 class="featurette-heading">FGM Ingenier&iacute;a es una empresa destinada al desarrollo de respuestas a los diversos problemas de la ingenier&iacute;a. Nos caracterizamos por brindar soluciones integrales a nuestros clientes. Propiciando asesoramiento, desarrollos innovadores y variados an&aacute;lisis num&eacute;ricos, logrando un producto con alto nivel de optimizaci&oacute;n y valor agregado. </h4>
    <h4 class="featurette-heading">Nuestro equipo de ingenieros cuenta con experiencia en el dise&ntilde;o y an&aacute;lisis en diversos campos entre los cuales se destacan las estructuras met&aacute;licas, sistemas y componente mec&aacute;nicos, implantes corporales y dispositivos para m&aacute;quinas especiales. 
    </h4>
  </div> 

@endsection