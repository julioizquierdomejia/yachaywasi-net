@extends('layouts.app')
@section('content')

<h1>ClassRooms</h1>

@foreach($alumnos as $alumno)
	<p>{{$alumno->name}}</p>
@endforeach


@endsection

@section('script')

@endsection
