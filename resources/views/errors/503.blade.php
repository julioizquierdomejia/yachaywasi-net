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
		<h1>¡Volveremos pronto!</h1>
		<div>
	        <p>Sentimos los inconvenientes pero para mejorar el sitio está en mantenimiento por el momento.</p>
	        <p>&mdash; El equipo.</p>
	    </div>
	</article>
@endsection
