@extends('adminBackend.template.main')

@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <div class="page-header">
    	<h3 class="featurette-heading">Imagenes. <span class="text-muted"> Listado </span></h3>
 	</div>

 	<div id="links">
 		@foreach ($servicios as $servicio)
 			<div class="contenedorImagenes">
 				<h3 class="tituloServicioImagenes"> {{ $servicio->nombre }} </h3>
 				@php $idServicioActual = $servicio->id @endphp 
 				<a href="{{ route('imagenes.create', ['serv' => $servicio->id]) }}" class="btn btn-info tituloServicioImagenes">Nueva imagen</a>
 			</div>	
 			<br>
 			<div class="contenedorImagenes">
 			@foreach ($imagenes as $imagen)
 				@if ($imagen->idServicio == $idServicioActual ) 
 					<div class="imagenConBoton"> 					
    					<a href="{{ url('admin/imagenes/'. $imagen->id .'/edit') }}" title="{{ $imagen->nombre }}"><img src="{{ asset('images/thumbnails/' . $servicio->nombre . '/' . $imagen->nombreArchivoThumbnails) }}" alt=" "><!-- completar alt --></a>
						<div class="botonParaImagen"> 
    						<a href="{{ route('imagenes.destroy', $imagen->id) }}" onclick="return confirm('Confirma que desea eliminar la imagen {{ $imagen->nombre }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						</div>
    				</div>
    			@endif
    		@endforeach
    		</div>
    	<hr>
		@endforeach
    </div>

@endsection    