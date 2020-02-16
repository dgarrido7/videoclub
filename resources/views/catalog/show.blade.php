@extends('layouts.master')

@section('content')

    <div class="row">

    <div class="col-sm-4">

	<img src="{{$arrayPeliculas->poster}}" class="w-100" />

    </div>
    <div class="col-sm-8">

		<h1>{{$arrayPeliculas['title']}}</h1>
			<h5><b>Año:</b>{{$arrayPeliculas['year']}}</h2>
			<h5><b>Director:</b>{{$arrayPeliculas['director']}}</h3>
				<br>
			        <p>
			        	<b>Resumen:</b> {{$arrayPeliculas->synopsis}}
			        </p>
		        <br>
					<p>
						<b>Categoria:</b> {{$arrayPeliculas->category->title}}
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

	


		        @endif
		        		<form action="{{action('CatalogController@putFav', $arrayPeliculas->id)}}" 
						    method="POST" style="display:inline">
						    {{ method_field('PUT') }}
						    {{ csrf_field() }}
						    <button type="submit" class="btn btn-success" style="display:inline">
						    	 <span class="glyphicon glyphicon-heart"></span>Añadir Favoritos
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
    </div>





		<div class="container p-0 pt-5 pr-0">
		    <div class="col-lg-12 col-md-12 col-sm-12">
		        <div class="comment-wrapper">
		            <div class="panel panel-info">
		                <div class="panel-heading">
		                    Trailer
		                </div>
		  				<!-- Grid column -->
		  					<div class="col-lg-4 col-md-3 col-sm-3"></div>
						  <div class="col-lg-4 col-md-6  col-sm-6 col-sm-12 col-xs-12">
							<br>
						    <!--Modal: Name-->
						    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						      <div class="modal-dialog modal-lg" role="document">

						        <!--Content-->
						        <div class="modal-content">

						          <!--Body-->
						          <div class="modal-body mb-0 p-0">

						            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
						              <iframe class="embed-responsive-item" src="{{$arrayPeliculas->trailer}}"
						                allowfullscreen></iframe>
						            </div>

						          </div>

						          <!--Footer-->
						          <div class="modal-footer justify-content-center">
						            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>

						          </div>

						        </div>
						        <!--/.Content-->

						      </div>
						    </div>
						    <!--Modal: Name-->

						    <a><img class="img-fluid z-depth-1" src="https://www.dogearpublishing.net/images/bms-videotrailer.png" alt="video"
						        data-toggle="modal" data-target="#modal1"></a>

						  </div>
						  <!-- Grid column -->



		                </div>
		            </div>
		        </div>

		    </div>
		</div>






		<div class="container p-0 pt-5">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Caixa Comentaris
                </div>
                <div class="panel-body">
                    <div class="clearfix"></div>
                    <ul class="media-list">
                    	@foreach($arrayReviews as $Review)
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">{{ $Review->created_at }}</small>
                                </span>
                                <strong class="text-success">{{ $Review->title }} ({{ $Review->user->name }})</strong>
                                <p>
                                    {{ $Review->review }}
                                </p>
                                <p>
                                    {{ $Review->stars }}
                                </p>
                            </div>
                        </li>
                        <hr>
                        @endforeach
                    </ul>
					<br>
					<form action="{{action('CatalogController@postReviewCreate', $arrayPeliculas->id)}}" method="POST" style="display:inline">
						@csrf
					<label>Enviar Comentari</label>
						<input class="form-control" type="text" name="title" placeholder="Resum Comentari">
					<br>
					<label>Valoració</label>
						<select class="form-control" name="stars" style="height: calc(3.25rem + 2px)">
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						</select>
					<br>
                    <textarea class="form-control" name="review" placeholder="Escriu un Comentari..." rows="3"></textarea>
                    <br>
                    <button type="submit" class="btn btn-info pull-right">Comenta</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>




</div>

<script type="text/javascript">
	$('#modal1').on('hidden.bs.modal', function (e) {
  // do something...
  $('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
});
</script>

@stop