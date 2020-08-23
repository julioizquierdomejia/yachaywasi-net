@extends('layouts.app')

@section('content')

<div class="container mt-5">
	<h1 class="display-4">Editar Usuario</h1>	

	<form class="form-group" method="POST" action="/user/{{$user->id}}" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		
		<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2" value="{{$user->name}}">
		

		<input type="email" name="email" placeholder="Ingrese el Email" class="form-control mb-2" value="{{$user->email}}">
		<input type="text" name="slug" placeholder="Ingrese el Slug" class="form-control mb-2" value="{{$user->slug}}">
		<!-- 
		<input type="file" name="avatar">
		-->
		<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Editar</button>
		
	</form>
</div>

@endsection('content')