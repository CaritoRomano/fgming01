@extends('adminBackend.template.main')

@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <div class="page-header">
    	<h3 class="featurette-heading">Servicio. <span class="text-muted"> Crear </span></h3>
 	</div>

    <div class="divFormContacto">
    	@if(count($errors)>0)
    		<div class = "alert alert-danger" role= "alert">
    			<ul>
    		      	@foreach($errors->all() as $error)
               			<li>{{$error}}</li>
            		@endforeach
	        	</ul>
	    	</div>
		@endif

	    {{ Form::open(['route' => 'servicios.store', 'method' => 'POST', 'files' => true]) }}

			<div class="form-group">
			    {!! Form::label('Nombre') !!}
			    {!! Form::text('nombre', null, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese el nombre')) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Descripcion Corta') !!}
			    {!! Form::text('descripcionCorta', null, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Descripcion breve')) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Descripcion completa') !!}
			    {!! Form::textarea('descripcion', null, 
			        array('required', 
			              'class'=>'form-control', 
			              'rows'=>'9',
			              'placeholder'=>'Descripcion completa...')) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Imagen miniatura') !!}
			    {!! Form::file('imagen') !!}
			</div>


			<div class="form-group">
			    {!! Form::submit('Agregar servicio', ['class'=>'btn btn-primary']) !!}
			</div>

	    {{ Form::close() }} 

	</div>


@endsection