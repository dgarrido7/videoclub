@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar categoria</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('category.index') }}"> Tornar</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('category.update',$categories->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Títol:</strong>
                    <input type="text" name="title" value="{{ $categories->title }}" class="form-control" placeholder="Titol">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Adult:</strong>
                <select class="form-control" style="height:40px" id="adult" name="adult">
                @if($categories->adult == true)
                  <option value="1" selected>SI</option>
                  <option value="0">NO</option>
                @else
                  <option value="1">SI</option>
                  <option value="0" selected>NO</option>
                @endif
                </select>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripció:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Descripció">{{ $categories->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
        </div>
   
    </form>
@endsection