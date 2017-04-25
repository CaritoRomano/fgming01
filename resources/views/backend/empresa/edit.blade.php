@extends('adminBackend.template.main')

@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <div class="page-header">
    	<h3 class="featurette-heading">Datos de la empresa. <span class="text-muted"> Editar </span></h3>
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

	    {{ Form::open(['route' => ['empresa.update', $empresa], 'method' => 'PUT']) }}

			<div class="form-group">
			    {!! Form::label('Nombre') !!}
			    {!! Form::text('nombre', $empresa->nombre, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese su nombre')) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Email') !!}
			    {!! Form::email('mail', $empresa->mail, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese su email. Pronto recibir&aacute; su respuesta.')) !!}
			</div>

			
			<div class="form-group">
			    {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
			</div>

	    {{ Form::close() }} 

	</div>


@endsection