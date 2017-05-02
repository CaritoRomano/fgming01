<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- agregado para logout -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- fin logout -->


    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

    <!-- galeria de imagenes -->
    <link rel="stylesheet" type="text/css"  href="{{ asset('plugins/blueimp-gallery/css/bootstrap-image-gallery.min.css') }}">

   <!-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/blueimp-gallery/css/blueimp-gallery.min.css') }}">
     fin galeria de imagenes -->

    <!-- galeria de imagenes blue imp-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="{{ asset( 'plugins/blueimp-gallery/js/bootstrap-image-gallery.min.js') }} "></script>
    <!-- fin galeria de imagenes -->

  <!--  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap-theme.css') }}"> 
  -->

  <!-- agregado para logout -->
      <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- fin logout -->
    
    @yield('head')
 
  </head>

  <body>
    @if (Auth::user())

    @include('admin.template.analyticstracking')
    <div class="container"> 
      <!-- Fixed navbar -->
      <nav class="navbar navbar-default navbar-fixed-top navBack">
        <div class="container">
          <div class="navbar-header">  
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <!-- boton menu responsive -->
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('admin') }}"><img src="{{ asset ('/images/logoMod.png') }}" alt="Logo"></a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="{{ $seccionActiva['inicio'] }}"><a href="{{ url('admin/inicio/1/edit') }}">Inicio</a></li>
              <li class="{{ $seccionActiva['empresa'] }}"><a href="{{ url('admin/empresa/1/edit') }}">Empresa</a></li>
              <li class="{{ $seccionActiva['servicios'] }}"><a href="{{ url('admin/servicios') }}">Servicios</a></li>

              <!-- button usuario y salir -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">   {{ Auth::user()->name }} 
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/admin/password/reset') }}">Cambiar Contrase&ntilde;a</a></li>

                    <li><a href="{{ url('/admin/logout') }}"
                      onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> Salir </a>
                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">  {{ csrf_field() }} </form></li>
                </ul>
                </div>
              </li> <!-- fin boton salir -->
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
        <p class="text-muted">Contacto:&nbsp;&nbsp;{{ $datosEmpresa->mail }}</p>
        <p class="text-muted">Tel&eacute;fono:&nbsp;&nbsp;{{ $datosEmpresa->telefono }}</p>
        <p class="text-muted">{{ $datosEmpresa->localidad }}&nbsp;&nbsp;-&nbsp;&nbsp;{{ $datosEmpresa->provincia }}&nbsp;&nbsp;-&nbsp;&nbsp;Argentina</p>
      </div>
    </footer>
    @endif
    <!--    <script >
    $(document).ready(function(){
        $('.myCarousel').carousel()
    });
    </script>-->


    <script src="{{ asset( 'plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript">
      var a = jQuery.noConflict();
      a(document).ready(function(){
        a('.myCarousel').carousel()
      });
    </script>

 
  </body>
</html>
