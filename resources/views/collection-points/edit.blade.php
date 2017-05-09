@extends('base')
@section('title', 'Editar punto de acopio')
@section('content')
   
     {{Form::open(['route'=>['collection-points.update',$collectionPoint->id], 'method'=>'PUT'])}}
       
           {{csrf_field()}}
            <div class="row">
                <label class="col-md-4 control-label">Nombre</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="nombre" value="{{ $collectionPoint->nombre }}">
                  </div>
            </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Dirección</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="direccion" value="{{$collectionPoint->direccion}}">
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Distrito</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="distrito" value="{{ $collectionPoint->distrito}}">
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Papel maximo</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="papel_max" value="{{$collectionPoint->papel_max}}">
                  </div>
             </div><br>
            <div class="row">
                <label class="col-md-4 control-label">Vidrio maximo</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="vidrio_max" value="{{ $collectionPoint->vidrio_max}}">
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Plástico maximo</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="plastico_max" value="{{ $collectionPoint->plastico_max}}">
                  </div>
             </div><br>
            
                <div class="col-md-6 col-md-offset-8" >
                    <button type="submit" class="btn btn-primary">
                      Actualizar
                    </button>   
                    <a href="{{route('collection-points.index')}}" class="btn btn-danger">Cancelar</a>
                </div><br>
      {{Form::close()}}
         
@stop