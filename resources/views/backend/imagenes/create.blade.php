@extends('adminBackend.template.main')

@section('head')
  <title>Inicio</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <div class="page-header">
    	<h3 class="featurette-heading">Imagen. <span class="text-muted"> Crear </span></h3>
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

	    {{ Form::open(['route' => 'imagenes.store', 'method' => 'POST', 'files' => true]) }}

			<div class="form-group">
			    {!! Form::label('Servicio') !!}
			    {!! Form::select('idServicio', $servicios,  
			        array('required', 
			              'class'=>'form-control', 
			              'value'=> app('request')->input('serv') )) !!}
			</div>
            <div class="form-group">
                <div class="table-responsive">
                <table class ="table table-striped">
                    <thead>
                    <tr>
                        <th>{!! Form::label('Thumbnails (250px 250px)') !!}</th>
                        <th>{!! Form::label('Imagen (2348px 1115px)') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>  <div class="divFile">
                                  <p class="textoBotonSubirImg"> Cargar Thumbnails </p>    
                                  {!! Form::file('thumbnails', ['id' =>'thumbnails', 'class' => 'botonSubirImg']) !!} </div> 
                                  <output id="imagenThumbnails" align="center"></output> 
                                  <output id="nombreImagenThumbnails"></output> 
                            </td>		                        
                            <td>  <div class="divFile">
                                  <p class="textoBotonSubirImg"> Cargar Imagen </p>
                                  {!! Form::file('imagen', ['id' =>'imagen', 'class' => 'botonSubirImg']) !!}   </div> 
                                  <output id="imagenVista"></output>
                                  <output id="nombreImagen"></output> 
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>

			<div class="form-group">
			    {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
			</div>

	    {{ Form::close() }} 

	</div>

    <script type="text/javascript">
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