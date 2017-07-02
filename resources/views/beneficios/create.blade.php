<!--Mi modal DE AGREGAR-->
{{Form::open(['route'=>['beneficios.store', $sponsor->sponsor_id], 'method'=>'POST'])}}

<div id="myModalagregar{{$beneficio->beneficio_id}}" class="modal fade" role="dialog"> 
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
        <select name="tipo" class="form-control">
          <option value="0" selected="">--seleccionar--</option> 
          <option value="1">Tipo 1</option> 
          <option value="2">Tipo 2</option>
          <option value="3">Tipo 3</option>
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
  {{Form::close()}}
  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
</div>
</div>
</div>
</div>

                             <!--fin del modal  DE AGREGAR-->