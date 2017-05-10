@extends('adminBackend.template.main')

@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <div class="page-header">
    	<h3 class="featurette-heading">Imagen. <span class="text-muted"> Editar </span></h3>
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
    <div class="panel panel-default">
        <div class="panel-body">
            {{ Form::open(['route' => ['imagenes.update', $imagen], 'method' => 'PUT', 'files' => true, 'id' => 'formEditarImagen']) }}
            <div class="form-group col-lg-6"> 
                {!! Form::label('Thumbnails (250px 250px)') !!}
                <div class="divFile">
                    <p class="textoBotonSubirImg"> Cargar Thumbnails </p>    
                    {!! Form::file('thumbnails', ['id' =>'thumbnailsEdit', 'class' => 'botonSubirImg']) !!}
                </div> 
                <output id="imagenEditThumbnails" align="center"></output> 
                <output id="nombreEditThumbnails"></output> 
            </div>
      
            <div class="form-group col-lg-6">
                {!! Form::label('Imagen (2348px 1115px)') !!}
                <div class="divFile">
                    <p class="textoBotonSubirImg"> Cargar Imagen </p>
                    {!! Form::file('imagen', ['id' =>'imagenEdit', 'class' => 'botonSubirImg']) !!}   
                </div> 
                <output id="imagenEditVista"></output>
                <output id="nombreEditImagen"></output> 
            </div>
            
            <div class="form-group col-lg-10">
                {!! Form::label('Pie de Foto') !!}
                {!! Form::text('pieDeFoto', $imagen->pieDeFoto, 
                array('class'=>'form-control', 'id'=>'pieDeFoto',
                      'placeholder'=>'Pie de foto')) !!}
            </div> 
            <div class="form-group col-lg-2">
                <br>
                {!! Form::submit('Modificar Imagen', ['class'=>'btn btn-primary']) !!}
            </div>
            {{ Form::close() }}
        </div>
    </div> 

	</div>

	<script type="text/javascript">

/* EDITAR IMAGEN */
        /* cuando editamos, carga la que ya esta en la bd */
        function cargarImagenes(evt) { 
            //nombre del Thumbnails
            document.getElementById('nombreEditThumbnails').innerHTML = ['<p> {{ $imagen->nombreThumbnails }} </p> '].join('');
            //insertamos Thumbnails
            document.getElementById('imagenEditThumbnails').innerHTML = ['<img class="img-rounded" alt="Imagen" width="100" height="100" src="{{ asset("images/thumbnails/" . $nombreServicioImagen . "/" . $imagen->nombreArchivoThumbnails) }}"/>'].join('');
            //nombre de la imagen
            document.getElementById('nombreEditImagen').innerHTML = ['<p> {{ $imagen->nombre }} </p> '].join('');
            // Insertamos la imagen
            document.getElementById('imagenEditVista').innerHTML = ['<img class="img-rounded" alt="Imagen" width="300" height="145" src="{{ asset("images/" . $nombreServicioImagen . "/" . $imagen->nombreArchivo) }}"/>'].join('');
        }
        window.addEventListener('load', cargarImagenes, false);

        /*cargo Thumbnails cuando seleccionan uno*/
        function paraThumbnailsEdit(evt) {
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
                     document.getElementById('nombreEditThumbnails').innerHTML = '<p>' + document.getElementById('thumbnailsEdit').files[0].name + '</p>';   
                      // Insertamos la imagen
                     document.getElementById('imagenEditThumbnails').innerHTML = ['<img class="img-rounded" alt="Imagen" width="100" height="100" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
         
                reader.readAsDataURL(f);
            }
        }
        document.getElementById('thumbnailsEdit').addEventListener('change', paraThumbnailsEdit, false);

        /*cargo Imagen cuando seleccionan una*/
        function paraImagenEdit(evt) {
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
                     document.getElementById('nombreEditImagen').innerHTML = '<p>' + document.getElementById('imagenEdit').files[0].name + '</p>';           
                      // Insertamos la imagen
                     document.getElementById('imagenEditVista').innerHTML = ['<img class="img-rounded" alt="Imagen" width="300" height="145" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
         
                reader.readAsDataURL(f);
            }
        }
        document.getElementById('imagenEdit').addEventListener('change', paraImagenEdit, false);
        /* FIN EDITAR IMAGEN */
    </script>
@endsection