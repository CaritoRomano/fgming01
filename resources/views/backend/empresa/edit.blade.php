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

 	<!-- Formulario Datos de la Empresa -->
    <div class="form-group col-lg-4">
    	@if(count($errors)>0)
    		<div class = "alert alert-danger" role= "alert">
    			<ul>
    		      	@foreach($errors->all() as $error)
               			<li>{{$error}}</li>
            		@endforeach
	        	</ul>
	    	</div>
		@endif

	    {{ Form::open(['route' => ['empresa.update', $datosEmpresa], 'method' => 'PUT']) }}

			<div class="form-group">
			    {!! Form::label('Nombre') !!}
			    {!! Form::text('nombre', $datosEmpresa->nombre, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese el nombre')) !!}
			</div>

			<div class="form-group marginTop20">
			    {!! Form::label('Email (Contacto)') !!}
			    {!! Form::email('mail', $datosEmpresa->mail, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese el email')) !!}
			</div>

			<div class="form-group marginTop20">
			    {!! Form::label('Tel&eacute;fono') !!}
			    {!! Form::text('telefono', $datosEmpresa->telefono, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese el tel&eacute;fono')) !!}
			</div>

			<div class="form-group marginTop20">
			    {!! Form::label('Localidad') !!}
			    {!! Form::text('localidad', $datosEmpresa->localidad, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese la localidad')) !!}
			</div>

			<div class="form-group marginTop20">
			    {!! Form::label('Provincia') !!}
			    {!! Form::text('provincia', $datosEmpresa->provincia, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese la provincia')) !!}
			</div>
			
	</div>
	 <!-- FIN Formulario Datos de la Empresa -->

 	<!-- Formulario Descripciones VMV -->
    <div class="form-group col-lg-8">
	    	<div class="form-group">
			    {!! Form::label('Visi&oacute;n') !!}
			    {!! Form::textarea('textoVision', $descripciones->textoVision, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese el texto para "Visi&oacute;n"')) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Misi&oacute;n') !!}
			    {!! Form::textarea('textoMision', $descripciones->textoMision, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese el texto para "Misi&oacute;n"')) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Valores') !!}
			    {!! Form::textarea('textoValores', $descripciones->textoValores, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese el texto para "Valores"')) !!}
			</div>
			
			<div class="form-group marginLeft">
			    {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
			</div>

	    {{ Form::close() }} 

	</div>
 	<!-- FIN Formulario Descripciones VMV -->
@endsection