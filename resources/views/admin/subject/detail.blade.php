@extends('layouts.app')

@section('content')

<?php
//array de Meses
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

$diaDeSemana = $dias[ $tema->date->dayOfWeek ];
$dia = $tema->date->day;
$mes = $meses[ $tema->date->month -1 ];
$anio = $tema->date->year;
?>


<h2 style='font-size: 22px;'><b>Bimestre </b>{{$tema->bimester}} / <b>Unidad</b> {{$tema->unit}} </h2>
<h1 style='font-size: 38px;'><b>Tema: {{$tema->position}} </b> / {{$tema->name}}</h1>
<h5 style='font-size: 16px; margin-top: -20px; padding-top: 0;'>Fecha: {{$diaDeSemana}}, {{$dia}} de {{$mes}} del {{$anio}}</h5>

<div class="content">

	<div class="row">
	  <div class="col-md-6">
	    
	    @if($videoKey != null)

	    <div class="card card-user">
	      		
			<div class="card-body">
	      	  	<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{$videoKey}}" allowfullscreen></iframe>
				</div>
			</div>

	      <div class="card-footer">
	        <hr>
	        <div class="button-container">
	          <div class="row">
	            <div class="col-lg-3 col-md-6 col-6 ml-auto">
	              <h5>Bimestre<br><small>{{$tema->bimester}}</small></h5>
	            </div>
	            <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
	              <h5>Unidad<br><small>{{$tema->unit}}</small></h5>
	            </div>
	            <div class="col-lg-3 mr-auto">
	              <h5>Tema<br><small>{{$tema->position}}</small></h5>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    @endif



	    @if ( $tema->homework != null || $tema->urldrive != null || $tema->urlpdf != null)

	    <div class="row">
		  <div class="col-sm-6">
		    <div class="card">
		      <div class="card-body">
		        <h5 class="card-title">Special title treatment</h5>
		        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		        <a href="#" class="btn btn-primary">Go somewhere</a>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6">
		    <div class="card">
		      <div class="card-body">
		        <h5 class="card-title">Special title treatment</h5>
		        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		        <a href="#" class="btn btn-primary">Go somewhere</a>
		      </div>
		    </div>
		  </div>
		</div>

		
	    	<div class="card">
	          <div class="card-header">
	            <h4 class="card-title"> Material de Apoyo</h4>
	            	<div class="card-body">
					@if($tema->homework != null)
						<div>
							<p>Para resolver el siguiente formulario hacer click en el boton</p>
		            		<a href="{{ $tema->homework }}" type="button" class="btn btn-primary"><i class="fas fa-book-reader"></i> - Tarea</a>
		            	</div>
		            	<hr>
					@endif
					@if($tema->urldrive != null)
						<div>
							<p>Abrir el material de Apoyo</p>
		            		<a href="{{ $tema->urldrive }}" type="button" class="btn btn-primary"><i class="fas fa-book-reader"></i> - Ver archivo Drive</a>
		            	</div>
		            	<hr>
					@endif
					@if($tema->urlpdf != null)
						<div>
							<a href="{{ $tema->urlpdf }}" type="button" class="btn btn-primary"><i class="fas fa-book-reader"></i> - Ver PDF</a>
						</div>
					@endif

					</div>

					<div class="card-footer">
						<hr>
				        Fecha de vencimiento para la Tarea : {{$tema->fecha_vencimiento}}
				    </div>

	           </div>
	         </div>
	    @else

	    @endif


	    

	    
	    <!--div class="card">
	      <div class="card-header">
	        <h4 class="card-title">Mensajes</h4>
	      </div>
	      <div class="card-body">
	        
	        <form>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Dejame un Mensaje</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
			  </div>

			  <div class="row">
	            <div class="update ml-auto mr-auto">
	              <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane mr-2"></i> Enviar </button>
	            </div>
	          </div>

			</form>

	      </div>
	    </div>
	  </div-->

	  <div class="col-md-6 d-none">
	    <div class="card card-user">
	      <div class="card-header">
	      	<h5 class="card-title">Enviar Evidencias</h5>
	      </div>

	      <div class="card-body">

	      	aqui el formulario
	        
	      </div>
	    </div>
	  </div>
	</div>
</div>




@endsection