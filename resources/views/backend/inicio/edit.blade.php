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
		
		<div class="form-group"> 
			<h3> Imagenes para el carousel de la seccion Inicio </h3>
			<input class="btn btn-primary" id="mostrarFormImagen" value="Agregar">
		</div>

		<!-- Formulario Imagenes Carousel en Inicio -->
		<div id='formAgregarImagenOculto' class="panel panel-default" style= 'display:none'>
			<div class="panel-body">
			{{ Form::open(['route' => 'imagenesInicio.store', 'method' => 'POST', 'files' => true]) }}

			<div class="form-group col-lg-4">
			    {!! Form::label('Servicio') !!}
			    {!! Form::select('idServicio', $servicios,  
			        array('required', 
			              'class'=>'form-control'
			             )) !!}
			</div>
            <div class="form-group">
            	<div class="col-lg-7">
                    {!! Form::label('Imagen (2348px 1115px)') !!}
    
 					<div class="divFile">
                          <p class="textoBotonSubirImg"> Seleccionar Imagen </p>
                          {!! Form::file('imagen', ['id' =>'imagen', 'class' => 'botonSubirImg']) !!}   
                    </div> 
                          <output id="imagenVista"></output>
                          <output id="nombreImagen"></output>               
                </div>
            </div>

			<div class="form-group col-lg-1 marginTop20">
			    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
			</div>

	    	{{ Form::close() }}
	    	</div>
		</div> 
		<!-- Fin Formulario Imagenes Carousel en Inicio -->

		<!-- Imagenes para Carousel -->
        <div>
   			<hr>
   			<div class="contenedorImagenes">
        	@foreach($imagenes as $imagen)
	            <div class="col-lg-4 imagenConBoton">  
			        <img src="{{ asset('/images/carousel/'. $imagen->nombreArchivo) }}" alt="{{ $imagen->servicio->nombre }}" width="360" > <!-- VER ALT -->
			        <div class="botonParaImagen">
			        	{{ Form::open(["route" => ["imagenesInicio.destroy", $imagen->id], "method" => "DELETE" ]) }}
						{{ Form::hidden('id', $imagen->id) }}
						
						{{ Form::button('', ['class' => 'btn btn-danger glyphicon glyphicon-remove', 'type' => 'submit', 'onclick' => 'return confirm("Confirma que desea eliminar la imagen '.$imagen->nombre.'?")'] ) }}

						{{ Form::close() }}  </div>
    					<h2 class="carousel-caption"> {{ $imagen->servicio->nombre }} </h2>	
			     </div><!-- /.col-lg-4 -->

	        @endforeach
	        </div>
	    </div><!-- /.row -->
		<!-- Fin Imagenes para Carousel -->

		<!-- Texto Inicio -->
		<div class="container marketing col-lg-12"> 
			<hr>
			<div class="form-group"> 
				<h3> Texto de la seccion Inicio </h3>
			</div>
	        <h4 id = "texto" class="textarea"> {!! nl2br(e($descripcion->textoInicio)) !!}</h4>
	        <div class="form-group"> 
				<input class="btn btn-primary" id="mostrarFormEdit" value="Editar texto">
			</div>
	    </div> 
    	<!-- Fin Texto Inicio -->

		<!-- Formulario Texto en Inicio -->
		<div id='formEditOculto'>
			{{ Form::open(["route" => ["inicio.update", $descripcion], "method" => "PUT", "id" => "FormEdit"]) }}
			<div class="form-group">   {!! Form::textarea("textoInicio", $descripcion->textoInicio, array("required", "class"=>"form-control tipografiaTextoInicio", "id" => "te")) !!} </div>  
			<div class="form-group"> {!! Form::submit("Modificar", ["class"=>"btn btn-primary marginLeft"]) !!} </div> 
			{{ Form::close() }} 
		</div> 
		<!-- Fin Formulario Texto en Inicio -->
	</div>


	<script type="text/javascript">
		var a = jQuery.noConflict();
		a('#mostrarFormEdit').click(function(){
			a("#formEditOculto").show();
			a("#mostrarFormEdit").hide();
  		});

  		a('#mostrarFormImagen').click(function(){
			a("#formAgregarImagenOculto").show();
			a("#mostrarFormImagen").hide();
  		});

        function ocultarFormEditTextoInicio() { //oculta el form del texto inicio
            a("#formEditOculto").hide();
        }

  		a(document).ready(function(e) {
   			ocultarFormEditTextoInicio();
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