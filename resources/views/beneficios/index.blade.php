@extends('base')
@section('title', 'Detalle de Sponsor')
@section('content')

<div class="container">
  <div class="col-md-11">
  @if(Session::has('exito'))
       <div class="alert alert-success pull-left" id="confirmacion" role="alert">
        {{Session::get('exito')}}
    </div>

    @endif
    {{Form::open(['route'=>['sponsors.destroy', $sponsor->sponsor_id], 'method'=>'DELETE'])}} 
                       <div class="col-md-6 col-md-offset-10" >
                              <button type="submit" style="background-color: #FC5C5C;color: white" class="btn">
                                Desactivar
                              </button>   
                              <a href="/sponsors?estado=activo" class="btn btn-primary">Cancelar</a>
                        </div><br>
    {{Form::close()}}
  </div>
  <div class="row"></div><br>
          <div class="row">
               <!--Datos del sponsor*-->
              @include('beneficios.datos-sponsor-beneficio')
              <!--Fin datos del sponsor-->
                <!--Datos de Benficio-->
                 <div class="col-sm-6" >
                   <div style="position: relative; left: 150px">
                      <div id="beneficio-contenido" style="width:400px;height:342px;">
                          <div class="text-center" >
                            <b>Beneficios</b>
                          </div><br>
                          <div>
                            <center>
                            <table class="table table-bordred">
                                    <thead>
                                      <th>Nombre</th>
                                      <th><center>Cantidad actual</center></th>
                                      
                                    </thead>
                                    
                                  @foreach($sponsor->benefits as $beneficio)
                                    <tr>
                                    
                                      <td style="width: 40%">
                                          
                                              <div class="input-group" >
                                                  <label  type="text">{{$beneficio->nombre}}</label>
                                              </div>
                                            
                                      </td>
                                      <td style="width: 60%">
                                          <center>
                                              <div class="input-group">
                                                <label   type="text">{{$beneficio->cantidad}}</label>
                                              </div>  
                                          </center>
                                      </td>
                                      <td>
                                        @include('beneficios.delete')
                                      </td>
                                      <td>
                                        @include('beneficios.edit')
                                    </td>

                                    </tr>
                                    @endforeach

                            @include('beneficios.create')
                            
                            </table>
                            </center><br>
                            <div class="text-center" >
                                <a  data-toggle="modal" data-target="#myModalagregar{{$beneficio->beneficio_id}}" class="btn btn-success btn-xs " >Añadir <span class="glyphicon glyphicon-plus"></span></a>
                            </div>
                          </div>
                      </div>

                    </div><br>
                 </div>
                 <!--Fin datos de Benficio-->
          </div>   
   </div>           
                    
  @stop