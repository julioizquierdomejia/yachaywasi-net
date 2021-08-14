@extends ('layouts.errors', ['title' => 'Página en Mantenimiento'])
@section('content')
<style>
  .page-content { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  article { display: block; text-align: left; max-width: 700px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
</style>
	<article class="page-content">
		<h1>Subida de Evidencias</h1>
		<div>
	        <p>El archivo que estas intentado subir a la plataforma, es demasiado grande</p>
	        <p>Te recomendamos tomar la foto con menos calidad de tu camara</p>
	        <p>Tambien puedes pasar la foto por WhastApp web, e intentar subir la foto a la plataforma por medio de la web de una computadora</p>
	        <p>&mdash; El equipo de Sistemas de Yachawasi.</p>
	    </div>
	</article>
@endsection
