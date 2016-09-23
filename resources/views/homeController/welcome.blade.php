@extends('admin.template.main')


@section('head')
  <title>Proyectos</title>
  <meta name="description" content="Inicio">
  <meta name="keywords" content="FGMIngenieria, ingenieria">
@endsection

@section('content')
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- PUNTOS DEL SLIDER -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <!-- IMAGENES Y CONTENIDO DEL SLIDER -->
      <div class="carousel-inner" role="listbox">
        <div class="item" align="center">
          <img class="first-slide" src="/images/slider/01.jpg" alt="Primer imagen del slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Primer proyecto.</h1>
              <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Leer mas</a></p>
            </div>
          </div>
        </div>
        <div class="item active" align="center">
          <img class="second-slide" src="/images/slider/02.jpg" alt="Segunda imagen del slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Segundo proyecto.</h1>
              <p>(N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Leer mas</a></p>
            </div>
          </div>
        </div>
        <div class="item" align="center">
          <img class="third-slide" src="/images/slider/03.jpg" alt="Tercer imagen del slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Tercer Proyecto.</h1>
              <p>Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Leer mas</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing"> 
      
      <h3 class="featurette-heading">Nombre del servicio. </h3>
    </div>

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam mauris, fringilla eget mollis vel, blandit sit amet nisl. Vivamus dapibus ac ligula in ornare. Nunc varius tempus quam, sit amet euismod enim sagittis id. Sed sed viverra orci. Cras vel risus id diam rutrum sodales vel a libero. In hac habitasse platea dictumst. Nullam vel metus pretium, ullamcorper velit vitae, euismod mi. Maecenas vel laoreet leo. Nunc non imperdiet diam. Aliquam rhoncus, mauris non ultricies congue, leo erat vulputate tortor, sed mattis eros dui sed elit. Vestibulum in felis vestibulum, posuere nisi et, semper arcu. Curabitur congue et elit sit amet malesuada.

      Quisque dictum ligula iaculis ipsum ullamcorper dapibus. Praesent euismod ligula placerat, posuere nibh at, luctus nulla. Suspendisse lacinia vehicula nibh. Pellentesque elementum nisl ut molestie mollis. Vivamus auctor est erat, id consectetur magna aliquam at. Curabitur et lacus laoreet erat vehicula tempor. Donec eu nulla efficitur, tempor risus id, pharetra lacus. Morbi faucibus mauris sed auctor vulputate.

      Curabitur volutpat augue sed lacus suscipit congue. In at ante neque. Nunc tincidunt, dui eget imperdiet consequat, massa sem condimentum velit, nec tincidunt ligula enim vitae ante. Nullam tincidunt condimentum purus id malesuada. Sed eu porta libero, sed porta eros. Integer vitae dapibus tortor. Integer vitae leo in sapien ornare consequat eget ut nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras pharetra magna tortor, non molestie metus rhoncus et.

      Mauris tincidunt tristique turpis vel pharetra. Nunc varius, sem vel viverra eleifend, purus purus eleifend nulla, quis placerat erat orci vel mi. Curabitur gravida eleifend feugiat. Proin id imperdiet tortor, non maximus mi. Praesent lobortis tincidunt ligula sed consectetur. Nam bibendum cursus neque, nec luctus odio tristique eget. Donec ultrices quam vel sodales imperdiet. Cras dui diam, sollicitudin vitae justo non, aliquet malesuada leo. Aliquam sollicitudin purus sed arcu convallis bibendum. Nullam consectetur viverra erat, ornare ultricies elit. Morbi mollis, nisl sit amet aliquam efficitur, magna felis mattis justo, vel sollicitudin ante lorem nec urna. Sed mollis euismod quam, in tempus odio sollicitudin at. Proin lobortis turpis eu ligula sollicitudin imperdiet. Sed nec pretium dolor, at elementum augue. Vivamus a rutrum nulla, vel auctor nulla. Aliquam quis lectus tortor. </p>

      <!-- Three columns of text below the carousel -->
 <!-- Fue a servicios.blade.php
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div> -->  <!-- /.col-lg-4 -->
 <!--         <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div> -->   <!-- /.col-lg-4 -->
 <!--         <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>-->   <!-- /.col-lg-4 -->
  <!--     </div>-->  <!-- /.row -->


      <!-- START THE FEATURETTES -->

<!-- fue a welcome.blade.php
      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider"> -->

      <!-- /END THE FEATURETTES -->


    </div><!-- /.container -->


     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset( 'plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript" charset="utf-8" async defer></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script>window.jQuery || document.write('<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"><\/script>')</script>
    <script>
    $(document).ready(function(){
        $('.myCarousel').carousel()
    });
    </script>
   <!-- <script src="../../dist/js/bootstrap.min.js"></script> -->
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<!--    <script src="../../assets/js/vendor/holder.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <!--   <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
    

@endsection