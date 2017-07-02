  <div class="input-group">
  <a id="desactivar" data-toggle="modal" data-target="#myModalmodificar{{$beneficio->beneficio_id}}" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a> 
    <!-- MODAL DE BENEFICIO MODIFICAR-->
   {{Form::open(['route'=>['beneficios.update',$sponsor->sponsor_id,$beneficio->beneficio_id], 'method'=>'PUT'])}}

                             <div id="myModalmodificar{{$beneficio->beneficio_id}}" class="modal fade" role="dialog"> 
                                <div class="modal-dialog ">
                                  <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Modificar Beneficio</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row">
                                           <div class="form-group">
                                            <label  class="col-md-4 control-label">Nombre</label>  
                                            <div class="col-md-8 inputGroupContainer">
                                              <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                                                <input  name="nombre" class="form-control"  type="text" value="{{$beneficio->nombre}}">
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
                                                <textarea class="form-control" name="descripcion" id="message-text">{{$beneficio->descripcion}}</textarea>
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
                                                <input  name="req_puntos" class="form-control"  type="number" value="{{$beneficio->req_puntos}}">
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
                                                <select name="tipo" class="form-control">
                                                @if($beneficio->tipo==1)
                                                  <option value="0">--Seleccionar--</option>
                                                  <option value="1" selected>Tipo 1</option>
                                                  <option value="2">Tipo 2</option>
                                                  <option value="3">Tipo 3</option>
                                                @endif
                                                @if($beneficio->tipo==2)
                                                  <option value="0">--Seleccionar--</option>
                                                  <option value="1">Tipo 1</option>
                                                  <option value="2" selected>Tipo 2</option>
                                                  <option value="3">Tipo 3</option>
                                                @endif
                                                @if($beneficio->tipo==3)
                                                  <option value="0">--Seleccionar--</option>
                                                  <option value="1">Tipo 1</option>
                                                  <option value="2">Tipo 2</option>
                                                  <option value="3" selected>Tipo 3</option>
                                                @endif
                                                </select>
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
                                                <input  name="cantidad" class="form-control"  type="number" value="{{$beneficio->cantidad}}">
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
                                              <button type="submit" class="btn btn-success">Actualizar</button>
                                        {{Form::close()}}
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        </div>
                                      </div>
                                </div>
                             </div>
                             <!--fin del modal  DE MODIFICAR-->
  </div>
