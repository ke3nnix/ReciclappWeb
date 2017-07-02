<!--columna de boton desactivar con modal-->
<center>
  <div class="input-group">
    <a id="desactivar" data-toggle="modal" data-target="#myModaldesactivar{{$beneficio->beneficio_id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-ban-circle"></span></a> 
    <!-- MODAL DE BENEFICIO DESCACTIVAR-->
    {{Form::open(['route'=>['beneficios.destroy','sponsor_id' => $sponsor->sponsor_id, 'beneficio_id' => $beneficio->beneficio_id], 'method'=>'DELETE'])}}
    <div id="myModaldesactivar{{$beneficio->beneficio_id}}" class="modal fade" role="dialog"> 
      <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirmar</h4>
          </div>
          <div class="modal-body">
            <p>Beneficio a desactivar: <b>{{$beneficio->nombre}}</b></p>
            <p>Cantidad:<b>{{$beneficio->cantidad}}</b></p>
          </div>

          <div class="modal-footer">

            <button type="submit" class="btn btn-danger">Desactivar</button>

            {{Form::close()}}
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</center>
                                        <!--Fin columna de boton desactivar con modal-->