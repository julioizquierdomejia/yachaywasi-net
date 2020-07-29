@extends('layouts.app')

@section('content')

	<div class="container">
		{{ Auth::user()->roles()->first()->name }}

		<div class="col-md-12">
		    <div class="card card-user">
		      <div class="card-header">
		      	@if ( Auth::user()->roles->first()->name == 'admin')
					<h5 class="card-title">Registrar Docente</h5>
				@endif

				@if ( Auth::user()->roles->first()->name == 'editor')
					<h5 class="card-title">Registrar Alumno</h5>
				@endif
		      </div>

		      <div class="card-body">
		        <form class="form-group" method="POST" action="/user" enctype="multipart/form-data">
					@csrf
		          <div class="row">
		            <div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label>Nombre del Docente</label>
							<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <label>Username</label>
		                <input type="email" name="email" placeholder="Ingrese el Email" class="form-control mb-2">
		              </div>
		            </div>
		          </div>
		          <div class="row">
		          	<div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label for="exampleInputEmail1">Contraseña</label>
		                <input type="password" name="password" placeholder="Ingrese contraseña" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <label>Slug</label>
		                <input type="text" name="slug" placeholder="Escribir un slug" class="form-control mb-2">
		              </div>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label>Asociado a {{ Auth::user()->name }}</label>
		                <input type="number" name="parent_id" class="form-control mb-2" value="{{ Auth::user()->id }}">
		              </div>
		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <label>Asociado a {{ Auth::user()->name }}</label>
		                @if ( Auth::user()->roles->first()->name == 'admin')
							<input type="text" name="elRol" class="form-control mb-2" value="editor">
						@endif

						@if ( Auth::user()->roles->first()->name == 'editor')
							<input type="text" name="elRol" class="form-control mb-2" value="lector">
						@endif
		              </div>
		            </div>
		          </div>

		          <div class="row">
		            <div class="col-md-12 pr-1 pl-1">
		              <div class="form-group">
		                <label>Adjunto foto de perfil</label>
		                <input type="file" name="avatar"> 
		              </div>
		            </div>
		          </div>

		          <div class="row">
		            <div class="update ml-auto mr-auto">
		              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
		            </div>
		          </div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

<!--
	<div class="container mt-5">
	

	

	<form class="form-group" method="POST" action="/user" enctype="multipart/form-data">
		@csrf
		<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2">
		<input type="email" name="email" placeholder="Ingrese el Email" class="form-control mb-2">
		<input type="password" name="password" placeholder="Ingrese contraseña" class="form-control mb-2">
		<input type="text" name="slug" placeholder="Escribir un slug" class="form-control mb-2">
		<input type="text" name="parent_id" class="form-control mb-2" value="{{ Auth::user()->id }}">
		@if ( Auth::user()->roles->first()->name == 'admin')
			<input type="text" name="elRol" class="form-control mb-2" value="editor">
		@endif

		@if ( Auth::user()->roles->first()->name == 'editor')
			<input type="text" name="elRol" class="form-control mb-2" value="lector">
		@endif
		
		 <input type="file" name="avatar"> 
		<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
	</form>
	
-->
	@if ($errors->any())
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">
				<span><i class="fas fa-exclamation-triangle"></i> {{ $error }}</span>
			</div>
		@endforeach
	@endif
	</div>


@endsection('content')