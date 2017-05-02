@extends('adminBackend.template.main')

@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    @if(count($errors)>0)
		<div class = "alert alert-danger" role= "alert">
			<ul>
		      	@foreach($errors->all() as $error)
           			<li>{{$error}}</li>
        		@endforeach
        	</ul>
    	</div>
	@endif

    <div>   
    	<div class="page-header">
    		<h3 class="featurette-heading">Servicios. <span class="text-muted"> </span></h3>
    		<div class="form-group"> 
				<input class="btn btn-primary" id="mostrarFormServicio" value="Agregar Servicio">
			</div>
 	  	</div> 	

		<!-- Formulario Nuevo Servicio -->
		<div id='formAgregarServicioOculto' class="panel panel-default" style= 'display:none'>
			<div class="panel-body">
			{{ Form::open(['route' => 'servicios.store', 'method' => 'POST', 'files' => true]) }}
			<div class="col-lg-8"> 
				<div class="form-group">
				    {!! Form::label('Nombre') !!}
				    {!! Form::text('nombre', null, 
				        array('required', 
				              'class'=>'form-control', 
				              'placeholder'=>'Ingrese el nombre del servicio')) !!}
				</div>

				<div class="form-group">
				    {!! Form::label('Descripción Corta') !!}
				    {!! Form::textArea('descripcionCorta', null, 
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
				    {!! Form::checkbox('conDetalle', 1, true, ['class' => 'field']) !!}
				</div>

				<div class="form-group">
				    {!! Form::label('Descripción completa (Solo si tiene detalle)') !!}
				    {!! Form::textarea('descripcion', null, 
				        array('class'=>'form-control', 
				              'rows'=>'9',
				              'placeholder'=>'Descripcion completa...')) !!}
				</div>
			</div>
			<div class="form-group col-lg-2 marginTop20">
			    {!! Form::submit('Agregar Servicio', ['class'=>'btn btn-primary']) !!}
			</div>
	    	{{ Form::close() }}
			</div>
		</div> 
	<!-- Fin Formulario Nuevo Servicio -->
	</div>

	<!-- Servicios -->
	<div>
		@foreach ($servicios as $servicio)
        <div class="col-lg-4">
        	<div class="col-lg-3">
        	<a href="{{ route('servicios.edit', ['id' => $servicio->id]) }}" class="btn btn-primary MBServicio">Editar</a>
        	</div>
        	<div class="col-lg-4">
        	{{ Form::open(["route" => ["servicios.destroy", $servicio->id], "method" => "DELETE" ]) }}
			{{ Form::hidden('id', $servicio->id) }}
						
			{{ Form::button('Eliminar', ['class' => 'btn btn-primary MBServicio', 'type' => 'submit', 'onclick' => 'return confirm("Confirma que desea eliminar '.$servicio->nombre.' y todas sus Imágenes?")'] ) }}

			{{ Form::close() }}
			</div>
			<div class="col-lg-3">
	     		<a href="{{ route('imagenes.show', ['id' => $servicio->id]) }}" class="btn btn-primary MBServicio">Im&aacute;genes</a>
        	</div>
        	<img src="{{ asset('/images/servicios/'. $servicio->nombreArchivo)  }}" alt="{{ $servicio->nombreImagen }}" width="360" > <!-- width="140" height="140"> -->
          	<h2>{{ $servicio->nombre }}</h2>
          	<p class="parrafoServicios"> {{ $servicio->descripcionCorta }} </p>
          	@if ($servicio->conDetalle)
          		<p class="parrafoServicios"> {{ $servicio->descripcion }} </p>
          	@endif
        </div><!-- /.col-lg-4 -->
        @endforeach
    </div><!-- /.row -->
    <!-- Servicios -->
 

 	<script type="text/javascript">
		var a = jQuery.noConflict();

  		a('#mostrarFormServicio').click(function(){
			a("#formAgregarServicioOculto").show();
			a("#mostrarFormServicio").hide();
  		});

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

	</script>

@endsection