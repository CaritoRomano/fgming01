@extends('admin.template.main')


@section('head')
	<title>Contacto</title>
	<meta name="description" content="Inicio">
	<meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <div class="page-header">
    	<h3>Contactame...</h3>
    </div>

    {{ Form::open(['route' => 'contacto.store', 'method' => 'POST']) }}

		<div class="form-group">
		    {!! Form::label('Nombre') !!}
		    {!! Form::text('name', null, 
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
		    {!! Form::textarea('message', null, 
		        array('required', 
		              'class'=>'form-control', 
		              'placeholder'=>'Hola FGM Ingenieria...')) !!}
		</div>

		<div class="form-group">
		    {!! Form::submit('Enviar!', ['class'=>'btn btn-primary']) !!}
		</div>

    {{ Form::close() }} 



@endsection