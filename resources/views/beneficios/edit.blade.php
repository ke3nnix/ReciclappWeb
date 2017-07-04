  <div class="input-group">
  <a id="desactivar" data-toggle="modal" data-target="#myModalmodificar{{$beneficio->beneficio_id}}" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></a> 
    <!-- MODAL DE BENEFICIO MODIFICAR-->
{{Form::open(['route'=>['beneficios.destroy','sponsor_id' => $sponsor->sponsor_id, 'beneficio_id' => $beneficio->beneficio_id], 'method'=>'PUT'])}}
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
                                                <input  name="nombre" class="form-control" title="Se necesita un Nombre"  type="text" value="{{$beneficio->nombre}}" required>
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
                                                <textarea class="form-control" name="descripcion" id="message-text" title="Se necesita una Descripción" required>{{$beneficio->descripcion}}</textarea>
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
                                                <input  name="req_puntos" class="form-control" min="1" type="number" value="{{$beneficio->req_puntos}}" required>
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
                                                <select name="tipo" class="form-control" required>
                                                @if($beneficio->tipo==1)
                                                  <option value="0">--Seleccionar--</option>
                                                  <option value="1" selected>Producto</option>
                                                  <option value="2">Becas</option>
                                                  <option value="3">Descuentos</option>
                                                @endif
                                                @if($beneficio->tipo==2)
                                                  <option value="0">--Seleccionar--</option>
                                                  <option value="1">Producto</option>
                                                  <option value="2" selected>Becas</option>
                                                  <option value="3">Decuentos</option>
                                                @endif
                                                @if($beneficio->tipo==3)
                                                  <option value="0">--Seleccionar--</option>
                                                  <option value="1">Producto</option>
                                                  <option value="2">Becas</option>
                                                  <option value="3" selected>Descuentos</option>
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
                                                <input  name="cantidad" class="form-control" min="1" type="number" value="{{$beneficio->cantidad}}" required>
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
