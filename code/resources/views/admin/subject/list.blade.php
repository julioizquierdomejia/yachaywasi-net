@extends('layouts.app')

@section('content')
Temas:
<ul>
	@foreach($temas as $tema)
	<li><a href="{{route('temadetalle', ['tema_id'=>$tema->id])}}">{{$tema->name}}</a></li>
	@endforeach
</ul>
@endsection