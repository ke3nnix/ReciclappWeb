@extends('base')
@section('title', 'Agregar punto de acopio')
@section('content')
   <form action="{{route('collection-points.store')}}" method="POST">
       <div id="page-wrapper">
           {{csrf_field()}}
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <label class="col-md-4 control-label">Nombre</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="nombre" value="{{ old('name') }}">
                  </div>
            </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Dirección</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="direccion">
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Distrito</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="distrito">
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Papel maximo</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="papel_max">
                  </div>
             </div><br>
                          <div class="row">
                <label class="col-md-4 control-label">Vidrio maximo</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="vidrio_max">
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Plástico maximo</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="plastico_max">
                  </div>
             </div><br>

             <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Agregar
                    </button>
                  </div>
          
             </div>
           
        </div>
                
   </form>                      
    

@stop