@extends('base')
@section('title', 'Agregar')
@section('content')
   
     {{Form::open(['route'=>'usuarios.store', 'method'=>'post'])}}

       <div>
           {{csrf_field()}}
      <dir style="position: relative;right: -100px">
          <div class="row">
           <div class="form-group">
            <label  class="col-md-4 control-label">Nombre</label>  
            <div class="col-md-6 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  name="nombre" class="form-control"  type="text">
              </div>
            </div>
          </div>
        </div> <br>
             <div class="row">
               <div class="form-group">
                <label class="col-md-4 control-label">Apellido</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input name="apellido" class="form-control" type="text">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
               <div class="form-group">
                <label class="col-md-4 control-label">Email</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input name="email" class="form-control"  type="email">
                  </div>
                </div>
              </div>
             </div><br>

             <div class="row">
              <div class="form-group">
              <label class="col-md-4 control-label">Contraseña</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                    <input name="password" class="form-control"  type="password">
                  </div>
                </div>
              </div>
             </div><br>
            <div class="row">
                <div class="form-group">
              <label class="col-md-4 control-label">Tipo</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                    <input name="tipo" class="form-control"  type="text">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
                <div class="form-group">
              <label class="col-md-4 control-label">DNI</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                    <input name="dni" class="form-control"  type="text">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
                <div class="form-group">
              <label class="col-md-4 control-label">Dirección</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                    <input name="direccion" class="form-control"  type="text">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
                <div class="form-group">
              <label class="col-md-4 control-label">Distrito</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                    <input name="distrito" class="form-control"  type="text">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
                <div class="form-group">
              <label class="col-md-4 control-label">Fecha de Nacimiento</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                    <input name="nacimiento" class="form-control"  type="date">
                  </div>
                </div>
              </div>
             </div>         
      </dir>                
            
             <div class="row"  style="margin-left: 10px;">
                <div class="col-md-6 col-md-offset-9">
                    <button type="submit" class="btn btn-success">
                      Agregar
                    </button>
                     <a href="/usuarios?tipo=administradores&estado=activo" class="btn btn-danger">Cancelar</a>

                  </div>
             </div>
           

        </div>
     {{Form::close()}}


@stop