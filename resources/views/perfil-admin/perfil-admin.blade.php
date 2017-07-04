@extends('base')
@section('title', 'Administrador')
@section('content')
   <center> 
    <div>
        <img src="../vendor/imagenReciclaap/users/June2017/cgJcIwVDlZTDhRDGaW92.jpg" class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="{{ Auth::user()->nombre }} avatar">
        <h4>{{ Auth::user()->nombre }}</h4>
        <div class="user-email text-muted">{{ Auth::user()->email }}</div>
        <p></p>
        <a id="desactivar" data-toggle="modal" data-target="#myModalmodificaruser{{$user->usuario_id}}" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a> 
    </div>
    </center>
<div style="position: relative; left: 325px;">
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
</div>
@stop