@extends('admin.template.main')


@section('head')
	<title>Contacto</title>
	<meta name="description" content="Inicio">
	<meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <div class="page-header">
    	<h3>Envíenos sus dudas, su consulta no molesta...</h3>
    </div>

    @if ($mensaje == 'exito') 
		<div class="alert alert-info">
  			<a href="{{ url('servicios') }}" class="alert-link">El mensaje se ha enviado con exito! Gracias por contactarnos. &nbsp;&nbsp;&nbsp;Toque aqui para volver a la seccion de nuestros servicios...</a>
		</div>

	@else	

	@endif 

    <div class="divFormContacto">

	    {{ Form::open(['route' => 'contacto.store', 'method' => 'POST']) }}

			<div class="form-group">
			    {!! Form::label('Nombre') !!}
			    {!! Form::text('nombre', null, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese su nombre')) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Email') !!}
			    {!! Form::text('email', null, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese su email. Pronto recibira su respuesta.')) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Ingrese su mensaje') !!}
			    {!! Form::textarea('mensaje', null, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Hola FGM Ingenieria...')) !!}
			</div>

			<div class="form-group">
			    {!! Form::submit('Enviar!', ['class'=>'btn btn-primary']) !!}
			</div>

	    {{ Form::close() }} 

	</div>

@endsection