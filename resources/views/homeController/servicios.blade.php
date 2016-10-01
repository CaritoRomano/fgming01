@extends('admin.template.main')


@section('head')
  <title>Servicios</title>
  <meta name="description" content="servicios">
  <meta name="keywords" content="FGMIngenieria, ingenieria, servicios">
@endsection

@section('content')

      <div class="row">
        <div class="col-lg-4">
          <img src="{{ asset('/images/azul.jpg') }}" alt="Consultoria" width="140" height="140"> <!-- VER ALT -->
          <h2>Consultoria</h2>
          <p>El asesoramiento en la resolución de problemas asociados a la reingeniería de productos es el primer paso para lograr un producto con mayor valor agregado. El área de FGM Ingeniería destinada a la consultoría y asesoramiento de empresas se basa en el relevamiento de planta, estudios de ingeniería y factibilidad de proyectos estructurales y mecánicos. A su vez, contamos con experiencia en instalaciones neumáticas e hidráulicas, logrando el acceso a sistemas cada vez con mayor grado de perfeccionamiento.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="{{ asset('/images/azul.jpg') }}" alt="Disenos por computadora" width="140" height="140">
          <h2>Disenos asistidos por computadora</h2>
          <p>FGM Ingeniería se dedica al diseño asistido por computadora. Nos destacamos por brindar soluciones a sistemas de gran complejidad, centrándonos en la innovación de soluciones para el diseño de diferentes componentes y estructuras metálicas... </p>
          <p><a class="btn btn-default" href="{{ url('servicio/1') }}" role="button">Ver detalles &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="{{ asset('/images/azul.jpg') }}" alt="FEM" width="140" height="140">
          <h2>Análisis por método de elementos finitos</h2>
          <p>FGM Ingeniería provee el servicio de análisis por método de elementos finitos para el  estudio numerico de componentes, sistemas, estructuras, frecuencias naturales y modos de vibrar, análisis tensional...</p>
          <p><a class="btn btn-default" href="{{ url('servicio/2') }}" role="button">Ver detalles &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

@endsection