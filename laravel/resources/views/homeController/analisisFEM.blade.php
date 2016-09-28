@extends('homeController.servicio')

@section('contenidoServicio')

<div id="links" align="center">
    <a href="{{ asset('images/01.jpg') }}" title="Foto 1" data-gallery><img src="{{ asset('images/thumbnails/01 - Thumbnails.jpg') }}" alt=" "><!-- completar alt --></a><a href="{{ asset('images/02.jpg') }}" title="Foto 2" data-gallery><img src="{{ asset('images/thumbnails/02 - Thumbnails.jpg') }}" alt=" "></a><a href="{{ asset('images/03.jpg') }}" title="Foto 3" data-gallery><img src="{{ asset('images/thumbnails/03 - Thumbnails.jpg') }}" alt=" "></a><a href="{{ asset('images/04.jpg') }}" title="Foto 2" data-gallery><img src="{{ asset('images/thumbnails/04 - Thumbnails.jpg') }}" alt=" "></a><a href="{{ asset('images/05.jpg') }}" title="Foto 3" data-gallery><img src="{{ asset('images/thumbnails/05 - Thumbnails.jpg') }}" alt=" "></a><a href="{{ asset('images/06.jpg') }}" title="Foto 3" data-gallery><img src="{{ asset('images/thumbnails/06 - Thumbnails.jpg') }}" alt=" "></a><a href="{{ asset('images/07.jpg') }}" title="Foto 2" data-gallery><img src="{{ asset('images/thumbnails/07 - Thumbnails.jpg') }}" alt=" "></a>
</div>
<div>
    <h2>Análisis por método de elementos finitos</h2>
    <p>El uso del método de los elementos finitos para el análisis de componentes, sistemas y estructuras es uno de los pilares de la ingeniería moderna. Es por ello que FGM Ingeniería cuenta con los medios para realizar una amplia gama de estudios y análisis, permitiendo obtener un producto altamente optimizado y resultando en un gran beneficio para nuestros clientes. Nuestros ingenieros realizan estudios numéricos de frecuencias naturales y modos de vibrar, análisis tensional, análisis de estructuras metálicas bajo cargas producidas por la acción del viento, análisis térmicos, estudios de sistemas bajo cargas contantes en el tiempo (creep), análisis de estabilidad en régimen elástico y elastoplástico. Permitiendo la obtención de, memorias de cálculo, curvas de energía, desplazamiento vs carga, reacciones de vínculo, velocidad y aceleración, esfuerzos característicos, etc.</p>
</div>

@endsection
