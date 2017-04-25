@extends('adminBackend.template.main')

@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <div class="page-header">
    	<h3 class="featurette-heading">Servicios. <span class="text-muted"> Listado </span></h3>
 	</div>

 	<a href="{{ route('servicios.create') }}" class="btn btn-info">Nuevo servicio</a><br>

 	<table class ="table table-striped">
 		<caption> </caption>
 		<thead>
 			<tr>
 				<th>Servicio</th>
 				<th>Descripcion</th>
 			</tr>
 		</thead>
 		<tbody>
 			@foreach($servicios as $servicio)
 				<tr>
	 				<td>{{ $servicio->nombre }}</td>
	 				<td>{{ $servicio->descripcionCorta }}</td>
	 				<td><a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
	 				<td><a href="{{ route('servicios.destroy', $servicio->id) }}" onclick="return confirm('Confirma que desea eliminar el servicio?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></td>
 				</tr>
 			@endforeach
 		</tbody>
 	</table>
 	<div class="text-center">
 		{!! $servicios->render() !!}
 

@endsection