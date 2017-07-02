@extends('base')
@section('title', 'Editar usuario')
@section('content')
   
     {{Form::open(['route'=>['usuarios.update',$user->usuario_id], 'method'=>'PUT'])}}
       
           {{csrf_field()}}

           <div style="position: relative;right: -100px">
                <div class="row">
                 <div class="form-group">
                  <label  class="col-md-4 control-label">Nombre</label>  
                  <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  name="nombre" class="form-control"  type="text" value="{{$user->nombre}}">
                    </div>
                  </div>
                </div>
              </div> <br>
                   <div class="row">
                     <div class="form-group">
                      <label class="col-md-4 control-label">Apellido</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                          <input name="apellido" class="form-control" type="text" value="{{$user->apellido}}">
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                     <div class="form-group">
                      <label class="col-md-4 control-label">Email</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                          <input name="email" class="form-control"  type="text" value="{{ $user->email}}">
                        </div>
                      </div>
                    </div>
                   </div><br>

                   <div class="row">
                    <div class="form-group">
                    <label class="col-md-4 control-label">Contraseña</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
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
                          <span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
                          <select name="tipo" class="form-control">
                            @if($user->tipo==3)
                              <option value="0">--Seleccionar--</option>
                              <option value="3" selected>Adminsitrador</option>
                              <option value="2">Empleado</option>
                            @endif
                            @if($user->tipo==2)
                              <option value="0">--Seleccionar--</option>
                              <option value="3">Administrador</option>
                              <option value="2" selected>Empleado</option>
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">DNI</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                          <input name="dni" class="form-control"  type="text" value="{{ $user->dni}}">
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">Dirección</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                          <input name="direccion" class="form-control"  type="text" value="{{ $user->direccion}}">
                        </div>
                      </div>
                    </div>
                   </div><br><div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">Distrito</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                          <input name="distrito" class="form-control"  type="text" value="{{ $user->distrito}}">
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">Fecha de Nacimiento</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                          <input name="nacimiento" class="form-control"  type="date" value="{{ $user->nacimiento}}">
                        </div>
                      </div>
                    </div>
                   </div><br>                           
      </div>
            
            
                <div class="col-md-6 col-md-offset-9" >
                    <button type="submit" class="btn btn-success">
                      Actualizar
                    </button>   
                    <a href="/usuarios?tipo=administradores&estado=activo" class="btn btn-danger">Cancelar</a>
                </div><br>
        
    
      {{Form::close()}}
         
@stop