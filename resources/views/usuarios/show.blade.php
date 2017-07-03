@extends('base')
@section('title', 'Detalle del Administrador')
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
                                      <span class="input-group-addon"></span>
                                      <label name="nombre" class="form-control"  type="text">{{$user->nombre}}</label>
                                    </div>
                                  </div>
                                </div>
                          </div><br>

                          <div class="row">
                             <div class="form-group">  
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  <label name="apellido" class="form-control" type="text">{{$user->apellido}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                           <div class="row">
                             <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  <label name="email" class="form-control"  type="text">{{$user->email}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>

                           <div class="row">
                            <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  <label name="direccion" class="form-control"  type="text">{{$user->direccion}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                          <div class="row">
                          <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  <label name="distrito" class="form-control"  type="text">{{$user->distrito}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                          <div class="row">
                              <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"></span>
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
                                  <span class="input-group-addon"></span>
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
                    
                         <button type="submit" style="background-color: #FC5C5C;color: white" class="btn">Desactivar</button>                           
                            <a href="/usuarios?tipo=administradores&estado=activo" class="btn btn-primary">Cancelar</a>
                      </div>
               {{Form::close()}}
</div>
      

   
  @stop