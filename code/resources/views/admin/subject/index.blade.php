@extends('layouts.app')

@section('content')
	<div class="col-md-8">
		<p>Nivel {{ $course->degree_level->level->name }} - {{ $course->degree_level->degree->name }}</p>
	    <h2 class="display-4">{{ $course->course->name }}</h2>
	    <div class="card card-user">
			<div class="card-header">
				<h5 class="card-title">Agregar Temas</h5>
			</div>
		</div>

		<form type="post" method="{{ route('subject.store') }}"></form>
	</div>
@endsection