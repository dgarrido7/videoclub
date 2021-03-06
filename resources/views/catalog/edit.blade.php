@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir película
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST">
            {{ method_field('PUT') }}
            	
            @csrf

            <div class="form-group">
               <label for="title">Modificar Pelicula</label>
               <input type="text" name="title" id="title" class="form-control" value="{{$pelicula->title}}">
            </div>

            <div class="form-group">
            	<label for="title">Año</label>
               <input type="text" name="year" id="year" class="form-control" value="{{$pelicula->year}}">
            </div>

            <div class="form-group">
            <label for="title">Director</label>
               <input type="text" name="director" id="director" class="form-control" value="{{$pelicula->director}}">
            </div>

            <div class="form-group">
            <label for="title">Poster</label>
               <input type="text" name="img" class="form-control" value="{{$pelicula->poster}}">
			
			</div>

         <div class="form-group">
            <label for="categorya">Categoria</label>
               <select class="form-control" style="height:40px" id="category" name="category">
                  @foreach( $categoria as $categoria)
                     @if($categoria->id==$pelicula->category_id)
                     <option value="{{$categoria->id}}" selected>{{$categoria->title}}</option>
                     @else
                     <option value="{{$categoria->id}}">{{$categoria->title}}</option>
                     @endif                  
                  @endforeach
               </select>
            </div>

            <div class="form-group">
            <label for="trailer">Trailer</label>
                  <input type="text" name="trailer" class="form-control" value="{{$pelicula->trailer}}">
            </div>

            <div class="form-group">
               <label for="synopsis">Resumen</label>
               <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$pelicula->synopsis}}</textarea>
            </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Modificar Pelicula
               </button>
            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@stop