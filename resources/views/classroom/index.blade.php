@extends('layouts.app')
@section('content')

<h1>ClassRooms</h1>



<div class="row row-cols-1 row-cols-md-4">
	@foreach($aulas as $aula)
	<div class="col mb-4">
	    <div class="card">
	      <img src="https://img.fayerwayer.com/sites/9/2020/12/05/0-0/googleclassroom-c00dba11a722987673565ed18476d504-800x400.jpg" class="card-img-top" alt="...">
	      <div class="card-body">
	        <h5 class="card-title">{{$aula->name}}</h5>
	        <p class="card-text">
	        	<a href=" {{ route('asistencia', $aula->id) }} " class="btn btn-primary">Asistencia</a>
	        	<a href="" class="btn btn-secondary">Notas</a>
	        </p>
	      </div>
	    </div>
	  </div>
	@endforeach

</div>



@endsection

@section('script')

@endsection
