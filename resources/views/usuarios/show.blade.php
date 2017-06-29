@extends('base')
@section('title', 'Detalle del Administrador activo')
@section('content')

<div style="position: relative; left: 325px;">
{{Form::open(['route'=>['usuarios.destroy',$user->usuario_id], 'method'=>'DELETE'])}}
  <div class="container">
          <div class="row">
                 
                 <div class="col-sm-5">
                    <div class="well">
                          <div class="row">
                                 <div class="form-group">
                                  <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <label name="nombre" class="form-control"  type="text">{{$user->nombre}}</label>
                                    </div>
                                  </div>
                                </div>
                          </div><br>

                          <div class="row">
                             <div class="form-group">  
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                  <label name="apellido" class="form-control" type="text">{{$user->apellido}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                           <div class="row">
                             <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                  <label name="email" class="form-control"  type="text">{{$user->email}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>

                           <div class="row">
                            <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                  <label name="direccion" class="form-control"  type="text">{{$user->direccion}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                          <div class="row">
                          <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                                  <label name="distrito" class="form-control"  type="text">{{$user->distrito}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                          <div class="row">
                              <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                                  @if($user->tipo==3)
                                      <label name="tipo" class="form-control"  type="text">Administrador</label>
                                  @endif
                                  @if($user->tipo==2)
                                      <label name="tipo" class="form-control"  type="text">Empleado</label>
                                  @endif
                                  @if($user->tipo==1)
                                      <label name="tipo" class="form-control"  type="text">Colaborador</label>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div><br>
                           <div class="row">
                          <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                                  <label name="nacimiento" class="form-control"  type="text">{{$user->nacimiento}}</label>
                                </div>
                              </div>
                            </div>
                           </div>
                    </div>
                 </div>

          </div>   
   </div>
                     <div class="col-md-6 col-md-offset-6" >
                            <button type="submit" class="btn btn-warning">
                              Desactivar
                            </button>   
                            <a href="/usuarios?tipo=administradores&estado=activo" class="btn btn-danger">Cancelar</a>
                      </div>
               {{Form::close()}}
</div>
      

   
  @stop