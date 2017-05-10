@extends('adminBackend.template.main')

@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <div class="page-header">
    	<h3 class="featurette-heading">Servicio. <span class="text-muted">Editar</span></h3>
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

		<!-- Formulario Editar Servicio -->
		<div class="panel panel-default">
			<div class="panel-body">
			{{ Form::open(['route' => ['servicios.update', $servicio], 'method' => 'PUT', 'files' => true]) }}
			<div class="col-lg-8"> 
				<div class="form-group">
				    {!! Form::label('Nombre') !!}
				    {!! Form::text('nombre', $servicio->nombre, 
				        array('required', 
				              'class'=>'form-control', 
				              'placeholder'=>'Ingrese el nombre del servicio')) !!}
				</div>

				<div class="form-group">
				    {!! Form::label('Descripción Corta') !!}
				    {!! Form::textArea('descripcionCorta', $servicio->descripcionCorta, 
				        array('required', 
				              'class'=>'form-control', 
				              'rows'=>'8',
				              'placeholder'=>'Descripcion breve')) !!}
				</div>
			</div>
			
			<div class="form-group col-lg-4">
				{!! Form::label('Imagen del Servicio') !!}
				<div class="divFile">
                    <p class="textoBotonSubirImg"> Seleccionar Imagen </p>
					{!! Form::file('imagen', ['id' => 'imagen', 'class' => 'botonSubirImg']) !!}
				</div> 
                <output id="imagenVista"></output>
                <output id="nombreImagen"></output> 	
			</div>

			<div class="col-lg-10">
				<div class="form-group">
				    {!! Form::label('Con detalle (Ver Mas)') !!}
				    @if($servicio->conDetalle == 1)
				    	{!! Form::checkbox('conDetalle', 1, true, ['class' => 'field']) !!}
				    @else
				    	{!! Form::checkbox('conDetalle', 1, false, ['class' => 'field']) !!}
				    @endif
				</div>

				<div class="form-group">
				    {!! Form::label('Descripción completa (Solo si tiene detalle)') !!}
				    {!! Form::textarea('descripcion', $servicio->descripcion, 
				        array('class'=>'form-control', 
				              'rows'=>'9',
				              'placeholder'=>'Descripcion completa...')) !!}
				</div>
			</div>
			<div class="form-group col-lg-2 marginTop20">
			    {!! Form::submit('Editar Servicio', ['class'=>'btn btn-primary']) !!}
			</div>
	    	{{ Form::close() }}
			</div>
		</div> 
		<!-- Fin Formulario Nuevo Servicio -->

	</div>

	<script type="text/javascript">
  		function paraImagen(evt) {
            var files = evt.target.files; // FileList object
             
            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }
         
                var reader = new FileReader();
         
                reader.onload = (function(theFile) {
                    return function(e) {
                      //insertamos el nombre de la imagen
                     document.getElementById('nombreImagen').innerHTML = '<p>' + document.getElementById('imagen').files[0].name + '</p>';           
                      // Insertamos la imagen
                     document.getElementById('imagenVista').innerHTML = ['<img class="img-rounded" alt="Imagen" width="300" height="200" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
         
                reader.readAsDataURL(f);
            }
        }
  		document.getElementById('imagen').addEventListener('change', paraImagen, false);

        function cargarImagenes(evt) { //cuando editamos, carga la que ya esta en la bd
            document.getElementById('nombreImagen').innerHTML = ['<p> {{ $servicio->nombreImagen }} </p> '].join('');
            // Insertamos la imagen
            document.getElementById('imagenVista').innerHTML = ['<img class="img-rounded" alt="Imagen" width="300" height="200" src="{{ asset("images/servicios/" . $servicio->nombreArchivo) }}"/>'].join('');
        }
        window.addEventListener('load', cargarImagenes, false);
    </script>


@endsection