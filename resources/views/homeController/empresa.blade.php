@extends('admin.template.main')


@section('head')
	<title>Empresa</title>
	<meta name="description" content="Empresa">
	<meta name="keywords" content="FGMIngenieria, ingenieria, empresa">
@endsection

@section('content')
    
    <div class="page-header">
    	<h3 class="featurette-heading">FGM Ingenier&iacute;a. <span class="text-muted"> Brindando soluciones...  </span></h3>
 	</div>
    <!-- <hr class="featurette-divider"> -->

    <div class="row featurette">
       	<div class="col-md-7">
       	  	<h4> <code> VISI&Oacute;N </code> </h4>   
			<p class="lead">Ser una empresa proveedora de una amplia gama de servicios de ingenier&iacute;a, investigaci&oacute;n y consultor&iacute;a tecnol&oacute;gica del m&aacute;s alto nivel, enfocada en agregar valor a la Industria y fomentar el desarrollo tecnol&oacute;gico en nuestro pa&iacute;s y la regi&oacute;n. </p>

			<p class="lead">Nuestra mayor caracter&iacute;stica se encuentra plasmada en el conocimiento y en la utilizaci&oacute;n de herramientas inform&aacute;ticas. El equipo de servicios permite afrontar problemas de gran envergadura y t&iacute;picamente multidisciplinarios. </p>

			<p class="lead">Nos encontramos ubicados en la ciudad de La Plata, cuna de una de las universidades más importantes de Argentina, a menos de una hora de Capital Federal. </p> <p>&nbsp</p>
		</div>
		<div class="col-md-5">
       		<img class="featurette-image img-responsive center-block" src="{{ asset('images/empresa/01vision.jpg') }}" alt="Imagen Vision">
       	</div>
   	</div>

	<hr class="featurette-divider">
    <div class="row featurette">
       	<div class="col-md-7 col-md-push-5">
 
			<h4> <code> MISI&Oacute;N </code> </h4>  

			<p class="lead">Promover la innovaci&oacute;n y la efectividad de procesos y servicios, acorde a las necesidades de la industria y su desarrollo, con flexibilidad y enfoque multidisciplinario. </p>

			<p class="lead">Utilizar, de manera responsable y eficiente, el conocimiento para abordar proyectos que exigen soluciones integrales, teniendo como objeto dise&ntilde;os equilibrados econ&oacute;mica y funcionalmente. </p>

			<p class="lead">Ofrecer respuestas a la medida y resultados &oacute;ptimos, aplicando est&aacute;ndares nacionales e internacionales. </p>

			<p class="lead">La capacidad de simulaci&oacute;n y c&aacute;lculo que aporta FGM permiten reducir tiempos y costos de elaboraci&oacute;n en una gran variedad de productos y procesos. </p> <p>&nbsp</p>
		</div>
		<div class="col-md-5 col-md-pull-7">
       		<img class="featurette-image img-responsive center-block" src="{{ asset('images//empresa/02mision.jpg') }}" alt="Imagen Mision">
       	</div>
   	</div>
 
	<hr class="featurette-divider">
    <div class="row featurette">
       	<div class="col-md-7">
		<h4> <code>VALORES</code> </h4>  

		<p class="lead">Nos centramos en el compromiso, responsabilidad y profesionalismo en la realizaci&oacute;n de nuestros trabajos, garantizando un resultado eficaz en tiempo y forma, manteniendo los est&aacute;ndares de calidad que la ingenier&iacute;a actual exige. </p>

		<p class="lead">La innovaci&oacute;n es uno de nuestros mayores pilares, en sinton&iacute;a con el desarrollo de nuevas tecnolog&iacute;as que nos permiten mejorar lo que ya est&aacute; hecho e incorporar nuevos materiales y conocimientos logrando dise&ntilde;os m&aacute;s eficientes. 

		<p class="lead">Creemos en la necesidad de actualizarnos y prepararnos de manera continua para afrontar nuevos desaf&iacute;os, buscando nuevas fronteras y corriendo nuestros l&iacute;mites.</p> <p>&nbsp</p><p>&nbsp</p>
		</div>
		<div class="col-md-5">
       		<img class="featurette-image img-responsive center-block" src="{{ asset('images/empresa/03valores.jpg') }}" alt="Imagen Valores">
       	</div>
   	</div>

   <!-- <p>Back to <a href="../sticky-footer">the default sticky footer</a> minus the navbar.</p> -->
@endsection