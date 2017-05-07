@extends('base')
@section('title', 'Eliminar punto de acopio')
@section('content')
   
   <form action="{{route('collection-points.destroy', ['id'=>$collectionPoint->id])}}" method="DELETE">
       <div>
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
                    <input type="text" class="form-control" name="direccion" disabled="disabled" value="{{$collectionPoint->direccion}}">
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Distrito</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="distrito" disabled="disabled" value="{{ $collectionPoint->distrito}}">
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Papel maximo</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="papel_max"  disabled="disabled" value="{{$collectionPoint->papel_max}}">
                  </div>
             </div><br>
            <div class="row">
                <label class="col-md-4 control-label">Vidrio maximo</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="vidrio_max" disabled="disabled" value="{{ $collectionPoint->vidrio_max}}">
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Plástico maximo</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="plastico_max" disabled="disabled" value="{{ $collectionPoint->plastico_max}}">
                  </div>
             </div><br>
             <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Eliminar
                    </button>
                  </div>
          
             </div>
           
        </div>
                
   </form>                      
    

@stop