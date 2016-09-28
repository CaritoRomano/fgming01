@extends('homeController.servicio')

@section('contenidoServicio')

<div id="links">
    <a href="{{ asset('images/azul01.jpg') }}" title="Foto 1" data-gallery>
        <img src="{{ asset('images/azul01.jpg') }}" alt=" "> <!-- completar alt -->
    </a>
    <a href="{{ asset('images/azul.jpg') }}" title="Foto 2" data-gallery>
        <img src="{{ asset('images/azul.jpg') }}" alt=" ">
    </a>
    <a href="{{ asset('images/azul01.jpg') }}" title="Foto 3" data-gallery>
        <img src="{{ asset('images/azul01.jpg') }}" alt=" ">
    </a>

    </a>
</div>
<div>
    <h2>Diseños asistidos por computadora</h2>
    <p>Nuestro equipo posee amplia experiencia en el diseño asistido por computadora, siendo capaz de desarrollar sistemas de gran complejidad. Obteniendo soluciones a los diferentes problemas asociados a la industria, producción y desarrollos innovadores. FGM Ingeniería  se especializa en el diseño de componentes y piezas especiales de máquinas, desarrollos de sistemas mecánicos y estructuras metálicas.</p>
</div>

@endsection
