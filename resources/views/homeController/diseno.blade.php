@extends('homeController.servicio')

@section('contenidoServicio')

<div id="links">
    <a href="{{ asset('images/cad/01.jpg') }}" title="Foto 1" data-gallery><img src="{{ asset('images/thumbnails/cad/01.jpg') }}" alt=" " class="imagenServicio"><!-- completar alt --></a><a href="{{ asset('images/cad/02.jpg') }}" title="Foto 2" data-gallery><img src="{{ asset('images/thumbnails/cad/02.jpg') }}" alt=" " class="imagenServicio"></a><a href="{{ asset('images/cad/03.jpg') }}" title="Foto 3" data-gallery><img src="{{ asset('images/thumbnails/cad/03.jpg') }}" alt=" " class="imagenServicio"><!-- completar alt --></a><a href="{{ asset('images/cad/04.jpg') }}" title="Foto 4" data-gallery><img src="{{ asset('images/thumbnails/cad/04.jpg') }}" alt=" " class="imagenServicio"></a><a href="{{ asset('images/cad/05.jpg') }}" title="Foto 5" data-gallery><img src="{{ asset('images/thumbnails/cad/05.jpg') }}" alt=" " class="imagenServicio"></a><a href="{{ asset('images/cad/06.jpg') }}" title="Foto 6" data-gallery><img src="{{ asset('images/thumbnails/cad/06.jpg') }}" alt=" " class="imagenServicio"></a>
</div>
<div>
    <h2>Dise&ntilde;os asistidos por computadora</h2>
	<p class="parrafoServicios divConMarginBottom">El dise&ntilde;o mediante el uso de programas computacionales es un actor principal en la ingenier&iacute;a moderna. Su empleo permite obtener mayor productividad,  menores costos de desarrollo y mayor calidad de los productos.  FGM Ingenier&iacute;a posee amplia experiencia en el dise&ntilde;o de estructuras met&aacute;licas, componentes y piezas especiales de m&aacute;quinas y  desarrollos de sistemas mec&aacute;nicos. Somos capaces de desarrollar sistemas de gran complejidad, brindando soluciones a los diferentes problemas asociados a los nuevos desarrollos tecnol&oacute;gicos, la industria y la producci&oacute;n. El dise&ntilde;o CAD ofrece una mejor visualizaci&oacute;n del producto final y sus sub-sistemas. Agilizando el proceso de producci&oacute;n al facilitar la obtenci&oacute;n de documentaci&oacute;n con un alto grado de exactitud, brindando planos de detalle, geometr&iacute;a y dimensiones,  lista de materiales, etc.</p>
</div>

@endsection