<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    <!-- galeria de imagenes -->
    <link rel="stylesheet" type="text/css"  href="{{ asset('plugins/blueimp-gallery/css/bootstrap-image-gallery.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/blueimp-gallery/css/blueimp-gallery.min.css') }}">
    <!-- fin galeria de imagenes -->

  <!--  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap-theme.css') }}"> 
  -->
    <script src="{{ asset( 'plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript" charset="utf-8" async defer></script> 
  <!--  <script src="{{ asset('plugins/bootstrap/js/npm.js') }}" type="text/javascript" charset="utf-8" async defer></script>-->


    
    @yield('head')
 
  </head>

  <body>
    <div class="container"> 
      <!-- Fixed navbar -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">  
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <!-- boton menu responsive -->
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="margin-top: -17%" href="{{ url('index') }}"><img src="/images/logoMod.png" alt="Logo"></a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="{{ $seccionActiva['index'] }}"><a href="{{ url('index') }}">Inicio</a></li>
              <li class="{{ $seccionActiva['servicios'] }}"><a href="{{ url('servicios') }}">Servicios</a></li>
              <li class="{{ $seccionActiva['empresa'] }}"><a href="{{ url('empresa') }}">Empresa</a></li>
              <li class="{{ $seccionActiva['contacto'] }}"><a href="{{ url('contacto') }}">Contacto</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </div>
    <!-- Begin page content -->
    <div class="container divContainer">
      @yield('content')
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Contacto: contacto@fgmingenieria.com</p>
        <p class="text-muted">Telefono: 0221-xxxxx</p>
        <p class="text-muted">Direccion: En el campo</p>
      </div>
    </footer>

    <script>
    $(document).ready(function(){
        $('.myCarousel').carousel()
    });
    </script>

    <!-- galeria de imagenes -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="{{ asset( 'plugins/blueimp-gallery/js/bootstrap-image-gallery.min.js') }} "></script>
    <!-- fin galeria de imagenes --> 
  </body>
</html>
