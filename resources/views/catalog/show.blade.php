@extends('layouts.master')

@section('content')

    <div class="row">

    <div class="col-sm-4">

	<img src="{{$arrayPeliculas->poster}}" class="w-100" />

    </div>
    <div class="col-sm-8">

		<h1>{{$arrayPeliculas['title']}}</h1>
			<h5>Año:{{$arrayPeliculas['year']}}</h2>
			<h5>Director:{{$arrayPeliculas['director']}}</h3>
				<br>
			        <p>
			        	<b>Resumen:</b> {{$arrayPeliculas->synopsis}}
			        </p>
		        <br>
		        @if ($arrayPeliculas->rented)
				<p><b>Estado:</b>Película actualmente alquilada</p>
				<br>
						<form action="{{action('CatalogController@putReturn', $arrayPeliculas->id)}}" 
						    method="POST" style="display:inline">
						    {{ method_field('PUT') }}
						    {{ csrf_field() }}
						    <button type="submit" class="btn btn-warning" style="display:inline">
						    	 <span class="glyphicon glyphicon-pause"></span>Devolver película
						    </button>
						</form>
						
						<form action="{{action('CatalogController@deleteMovie', $arrayPeliculas->id)}}" 
						    method="POST" style="display:inline">
						    {{ method_field('PUT') }}
						    {{ csrf_field() }}
						    <button type="submit" class="btn btn-danger" style="display:inline">
						        <span class="glyphicon glyphicon-trash"></span>Eliminar Pelicula
						    </button>
						</form>

						<a href="{{url('catalog/edit/'.$arrayPeliculas->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Editar Pelicula</a>
						
						<a href="{{url('/catalog')}}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Volver al Listado</a>		
		        @else
		        <p><b>Estado:</b>Película disponible</p>
		        <br>
		        		<form action="{{action('CatalogController@putRent', $arrayPeliculas->id)}}" 
						    method="POST" style="display:inline">
						    {{ method_field('PUT') }}
						    {{ csrf_field() }}
						    <button type="submit" class="btn btn-success" style="display:inline">
						    	 <span class="glyphicon glyphicon-play"></span>Alquilar Pelicula
						    </button>
						</form>

						<form action="{{action('CatalogController@deleteMovie', $arrayPeliculas->id)}}" 
						    method="POST" style="display:inline">
						    {{ method_field('PUT') }}
						    {{ csrf_field() }}
						    <button type="submit" class="btn btn-danger" style="display:inline">
						        <span class="glyphicon glyphicon-trash"></span>Eliminar Pelicula
						    </button>
						</form>
						
						<a href="{{url('catalog/edit/'.$arrayPeliculas->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Editar Pelicula</a>
						<a href="{{url('/catalog')}}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Volver al Listado</a>		


		        @endif	        
    </div>

</div>

@stop