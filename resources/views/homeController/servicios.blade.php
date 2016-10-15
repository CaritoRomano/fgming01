@extends('admin.template.main')


@section('head')
  <title>Servicios</title>
  <meta name="description" content="servicios">
  <meta name="keywords" content="FGMIngenieria, ingenieria, servicios">
@endsection

@section('content')

      <div>
        <div class="col-lg-4">
          <img src="{{ asset('/images/servicios/consultoria.jpg') }}" alt="Consultoria" width="360" > <!-- VER ALT -->
          <h2>Consultor&iacute;a</h2>
          <p class="parrafoServicios">El asesoramiento en la resoluci&oacute;n de problemas asociados a la reingenier&iacute;a de productos es el primer paso para lograr un producto con mayor valor agregado. El &aacute;rea de FGM Ingenier&iacute;a destinada a la consultor&iacute;a y asesoramiento de empresas se basa en el relevamiento de planta, estudios de ingenier&iacute;a y factibilidad de proyectos estructurales y mec&aacute;nicos. A su vez, contamos con experiencia en instalaciones neum&aacute;ticas e hidr&aacute;ulicas, logrando el acceso a sistemas cada vez con mayor grado de perfeccionamiento.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="{{ asset('/images/servicios/diseno.jpg') }}" alt="Disenos por computadora" width="360" > <!-- width="140" height="140"> -->
          <h2>Dise&ntilde;os asistidos por computadora</h2>
          <p class="parrafoServicios">El equipo de FGM Ingenier&iacute;a posee una amplia experiencia en el dise&ntilde;o asistido por computadora. Nos destacamos por brindar soluciones a sistemas de gran complejidad, centr&aacute;ndonos en la innovaci&oacute;n de soluciones para el dise&ntilde;o de diferentes estructuras y componentes met&aacute;licos... </p>
          <p><a class="btn btn-default" href="{{ url('servicio/1') }}" role="button">Ver detalles &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="{{ asset('/images/servicios/fem.jpg') }}" alt="FEM" width="360" > <!-- width="140" height="140"> -->
          <h2>An&aacute;lisis por m&eacute;todo de elementos finitos</h2> 
          <p class="parrafoServicios">FGM Ingenier&iacute;a provee el servicio de an&aacute;lisis por m&eacute;todo de elementos finitos para el estudio num&eacute;rico de componentes, sistemas, estructuras, frecuencias naturales y modos de vibrar, an&aacute;lisis tensional...</p>
          <p><a class="btn btn-default" href="{{ url('servicio/2') }}" role="button">Ver detalles &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      
@endsection