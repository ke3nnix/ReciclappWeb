@extends('base')
@section('title', 'Detalle de Sponsor')
@section('content')

  <div class="container">
          <div class="row">
                 
                 <div class="col-sm-5">
                    <div class="well">
                          <div class="row">
                                 <div class="form-group">
                                  <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <label name="contacto" class="form-control"  type="text">{{$sponsor->contacto}}</label>
                                    </div>
                                  </div>
                                </div>
                          </div><br>

                          <div class="row">
                             <div class="form-group">  
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                  <label name="razon_social" class="form-control" type="text">{{$sponsor->razon_social}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                           <div class="row">
                             <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                  <label name="ruc" class="form-control"  type="text">{{$sponsor->ruc}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>

                           <div class="row">
                            <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                  <label name="direccion" class="form-control"  type="text">{{$sponsor->direccion}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                          <div class="row">
                          <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                                  <label name="distrito" class="form-control"  type="text">{{$sponsor->distrito}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                          <div class="row">
                              <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                                  <label name="telefono" class="form-control"  type="text">{{$sponsor->telefono}}</label>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                 </div>
                
                 <div class="col-sm-6">
                   <div>
                      <div id="beneficio-contenido" class="well" style="width:400px;height:342px;overflow: scroll;">
                          <div class="text-center" >
                            <b>Beneficios</b>
                          </div><br>
                          <div>
                            <center>
                            <table class="table table-bordred table-striped">
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
                                  <center>
                                    <div class="input-group">
                                      <span class="input-group"><a class="glyphicon glyphicon-trash btn btn-danger btn-xs"></a></span>
                                    </div>
                                  </center>
                                </td>

                              </tr>
                              @endforeach
                              
                            </table>
                            </center><br>
                            <div class="text-center" >
                                <a  data-toggle="modal" data-target="#myModal{{$sponsor->sponsor_id}}" class="btn btn-success btn-xs " >Añadir <span class="glyphicon glyphicon-plus"></span></a>
                            </div>
                          </div>
                      </div>
                      <!--Mi modal-->
                      {{Form::open(['route'=>['beneficios.store', $sponsor->sponsor_id], 'method'=>'POST'])}}

                       <div id="myModal{{$sponsor->sponsor_id}}" class="modal fade" role="dialog"> 
                          <div class="modal-dialog ">
                            <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Agregar Beneficio</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Nombre</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                                          <input  name="nombre" class="form-control"  type="text">
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>
                                  <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Descripcion</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-align-left"></i></span>
                                          <textarea class="form-control" name="descripcion" id="message-text"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>
                                  <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Puntaje Requerido</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i></span>
                                          <input  name="req_puntos" class="form-control"  type="number">
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>
                                  <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Tipo</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                                          <input  name="tipo" class="form-control"  type="text">
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>
                                  <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Stock</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-warning-sign"></i></span>
                                          <input  name="cantidad" class="form-control"  type="number">
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>
                                  <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">SposorID</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-warning-sign"></i></span>
                                          <input  name="sponsor_id" class="form-control"  type="number" value="{{$sponsor->sponsor_id}}" readonly="readonly">
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>                                      
                                  </div>

                                  <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Añadir</button>
                                        <a type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                                  </div>
                                </div>
                          </div>
                       </div>
                       {{Form::close()}}
                       <!--fin del modal-->
                    </div><br>
                 </div>
          </div>   
   </div>
                     <div class="col-md-6 col-md-offset-8" >
                            <button type="submit" class="btn btn-warning">
                              Eliminar
                            </button>   
                            <a href="{{route('sponsors.index')}}" class="btn btn-danger">Cancelar</a>
                      </div><br>
  @stop