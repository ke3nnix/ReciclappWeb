@extends('base')
@section('title', 'Detalle del Administrador')
@section('content')


{{Form::open(['route'=>['usuarios.destroy',$user->usuario_id], 'method'=>'DELETE'])}}
  <div class="container">
          <div class="centrado-div">
                 
                 <div class="col-sm-5">
                    <div >
                        <table style="height: 450px" >
                          <tr>
                            <td>
                              <label class="input-group">Nombre: </label>       
                            </td>
                            <td>
                              <label name="nombre" class="form-control" style="width: 400px" type="text">{{$user->nombre}}</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="input-group">Apellido: </label>
                            </td>
                            <td>
                              <label name="apellido" class="form-control"  type="text">{{$user->apellido}}</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="input-group">DNI: </label>
                            </td>
                            <td>
                              <label name="email" class="form-control"  type="text">{{$user->dni}}</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="input-group">Correo: </label>
                            </td>
                            <td>
                              <label name="email" class="form-control"  type="text">{{$user->email}}</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="input-group">Dirección: </label>
                            </td>
                            <td>
                              <label name="direccion" class="form-control"  type="text">{{$user->direccion}}</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="input-group">Distrito: </label>
                            </td>
                            <td>
                              <label name="distrito" class="form-control"  type="text">{{$user->distrito}}</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="input-group">Tipo: </label>   
                            </td>
                            <td>
                              @if($user->tipo==3)
                                      <label name="tipo" class="form-control"  type="text">Administrador</label>
                                  @endif
                                  @if($user->tipo==2)
                                      <label name="tipo" class="form-control"  type="text">Empleado</label>
                                  @endif
                                  @if($user->tipo==1)
                                      <label name="tipo" class="form-control"  type="text">Colaborador</label>
                                  @endif
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="input-group">Fecha de Nacimento: </label>   
                            </td>
                            <td>
                              <label name="nacimiento" class="form-control"  type="text">{{$user->nacimiento}}</label>
                            </td>
                          </tr>
                          <table class="centrado-div">
                          <tr >
                            <td >
                              <div>
                               <button type="submit" style="background-color: #FC5C5C;color: white" class="btn">Desactivar</button>                           
                                <a href="/usuarios?tipo=administradores&estado=activo" class="btn btn-primary">Cancelar</a>
                              </div>
                              {{Form::close()}}
                            </td>
                          </tr>
                          </table>
                          
                        </table>
                          
                    </div>
                 </div>

          </div>   
   </div>
                     

      

   
  @stop