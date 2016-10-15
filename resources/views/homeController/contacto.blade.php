@extends('admin.template.main')


@section('head')
	<title>Contacto</title>
	<meta name="description" content="Contacto">
	<meta name="keywords" content="FGMIngenieria, ingenieria, contacto">
@endsection

@section('content')
    <div class="page-header">
    	<h3>Env&iacute;enos sus dudas, su consulta no molesta...</h3>
    </div>

    @if ($mensaje == 'exito') 
		<div class="alert alert-info">
  			<a href="{{ url('servicios') }}" class="alert-link">El mensaje se ha enviado con &eacute;xito! Gracias por contactarnos.</a>
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
			    {!! Form::email('email', null, 
			        array('required', 
			              'class'=>'form-control', 
			              'placeholder'=>'Ingrese su email. Pronto recibir&aacute; su respuesta.')) !!}
			</div>

			<div class="form-group">
			    {!! Form::label('Ingrese su mensaje') !!}
			    {!! Form::textarea('mensaje', null, 
			        array('required', 
			              'class'=>'form-control', 
			              'rows'=>'9',
			              'placeholder'=>'Hola FGM Ingenier&iacute;a...')) !!}
			</div>

			<div class="form-group">
			    {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}
			</div>

	    {{ Form::close() }} 

	</div>

@endsection