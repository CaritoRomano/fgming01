@extends('adminBackend.template.main')

@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content') 



    <div class="page-header">
    	<h3 class="featurette-heading">{{ $servicio->nombre }}. <span class="text-muted">   Im&aacute;genes</span></h3>
        <div class="form-group">
        @if(count($errors)>0)
        <div class = "alert alert-danger" role= "alert">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
        
        <input class="btn btn-primary" id="mostrarFormImagen" value="Agregar Imagen">
      </div>  
 	</div>

    

    <!-- Formulario Nueva Imagen -->
    <div id='formAgregarImagenOculto' class="panel panel-default" style= 'display:none'>
        <div class="panel-body">
            {{ Form::open(['route' => ['imagenes.store', 'idServicio' =>$servicio->id], 'method' => 'POST', 'files' => true]) }}
            <div class="form-group col-lg-6"> 
                {!! Form::label('Thumbnails (250px 250px)') !!}
                <div class="divFile">
                    <p class="textoBotonSubirImg"> Cargar Thumbnails </p>    
                    {!! Form::file('thumbnails', ['id' =>'thumbnails', 'class' => 'botonSubirImg']) !!}
                </div> 
                <output id="imagenThumbnails" align="center"></output> 
                <output id="nombreImagenThumbnails"></output> 
            </div>
      
            <div class="form-group col-lg-6">
                {!! Form::label('Imagen (2348px 1115px)') !!}
                <div class="divFile">
                    <p class="textoBotonSubirImg"> Cargar Imagen </p>
                    {!! Form::file('imagen', ['id' =>'imagen', 'class' => 'botonSubirImg']) !!}   
                </div> 
                <output id="imagenVista"></output>
                <output id="nombreImagen"></output> 
            </div>
            
            <div class="form-group col-lg-10">
                {!! Form::label('Pie de Foto') !!}
                {!! Form::text('pieDeFoto', null, 
                array('class'=>'form-control',
                      'placeholder'=>'Pie de foto')) !!}
            </div> 
            <div class="form-group col-lg-2">
                <br>
                {!! Form::submit('Agregar Imagen', ['class'=>'btn btn-primary']) !!}
            </div>
            {{ Form::close() }}
        </div>
    </div> 
    <!-- Fin Formulario Nueva Imagen -->
	
@if($tieneImagenes) 	 
	<div class="contenedorImagenes">
	   @foreach ($servicio->imagenes as $imagen)
		<div class="col-lg-4 imagenConBoton"> 
            <a href="{{ route('imagenes.edit', ['id' => $imagen->id]) }}" title="EDITAR"><img src="{{ asset('images/thumbnails/' . $servicio->nombre . '/' . $imagen->nombreArchivoThumbnails) }}" class="imagenServicio" alt = "{{ asset($imagen->nombre) }}" width="350" height="350"></a>
            <div class="botonParaImagen"> 
                {{ Form::open(["route" => ["imagenes.destroy", $imagen->id], "method" => "DELETE" ]) }}
                {{ Form::hidden('id', $imagen->id) }}
            
                {{ Form::button('', ['class' => 'btn btn-danger glyphicon glyphicon-remove', 'type' => 'submit', 'onclick' => 'return confirm("Confirma que desea eliminar la imagen '.$imagen->nombre.' y '.$imagen->nombreThumbnails.'?")'] ) }}

                {{ Form::close() }}  
    		</div>

        </div>
        @endforeach
    </div>
@endif
       


    <script type="text/javascript">
        var a = jQuery.noConflict();
        /* AGREGAR IMAGEN */

        /*muestro formulario Agregar*/
        a('#mostrarFormImagen').click(function(){
            a("#formAgregarImagenOculto").show();
            a("#mostrarFormImagen").hide();
        });

        /*cargo Thumbnails cuando seleccionan uno*/
        function paraThumbnails(evt) {
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
                     //insertamos el nombre del thumbnails 
                     document.getElementById('nombreImagenThumbnails').innerHTML = '<p>' + document.getElementById('thumbnails').files[0].name + '</p>';   
                      // Insertamos la imagen
                     document.getElementById('imagenThumbnails').innerHTML = ['<img class="img-rounded" alt="Imagen" width="100" height="100" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
         
                reader.readAsDataURL(f);
            }
        }
        document.getElementById('thumbnails').addEventListener('change', paraThumbnails, false);

        /*cargo Imagen cuando seleccionan una*/
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
                     document.getElementById('imagenVista').innerHTML = ['<img class="img-rounded" alt="Imagen" width="300" height="145" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
         
                reader.readAsDataURL(f);
            }
        }
        document.getElementById('imagen').addEventListener('change', paraImagen, false);
        /* FIN AGREGAR IMAGEN */
    </script>

@endsection    