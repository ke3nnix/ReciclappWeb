   <td style="width: 20px"> 
              <form id="formid" action="#" method="post">
                <p><input type="checkbox" class="checkAll" value="{{$row->nombre}}"/>
              </td> 
              </form>
              <!--modal para recojo-->
              <div id="myModal" class="modal fade" role="dialog"> 
                <div class="modal-dialog ">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Confirmar</h4>
                    </div>
                    <div class="modal-body">
                      <p>Punto de acopio a recoger: <b id="test"></b></p>
                    </div>

                    <div class="modal-footer">

                      <button type="submit" class="btn btn-danger" onclick="window.location.href=''">Recoger</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--fin del modal--> 
              <td style="width: 100px"> 
                <p>{{$row->nombre}}</p> 
              </td> 
               <td style="width: 80px"> 
                <p> {{$row->direccion}}</p> 
              </td> 
              <td style="width: 80px"> 
                <p> {{$row->distrito}}</p> 
              </td> 
              <td style="width: 80px">
                <p> <b>{{$row->papel_actual}}</b>/{{$row->papel_max}}</p> 
              </td>
              <td style="width: 80px">
                <p> <b>{{$row->vidrio_actual}}</b>/{{$row->vidrio_max}}</p> 
              </td>
              <td style="width: 80px">
                <p> <b>{{$row->plastico_actual}}</b>/{{$row->plastico_max}}</p> 
              </td>
              <td style="width: 100px">
                <button id="elimiar" data-toggle="modal" data-target="#myModal{{$row->acopio_id}}" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-ok"></span>Activar</button> 

                {{Form::open(['route'=>['puntos-de-acopio.destroy',$row->acopio_id], 'method'=>'DELETE'])}}
                <div id="myModal{{$row->acopio_id}}" class="modal fade" role="dialog"> 
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">¿Desea activar a?</h4>
                      </div>
                      <div class="modal-body">
                        <p><b>{{$row->nombre}}</b></p>
                      </div>
                      <div class="modal-footer">

                        <button type="submit" class="btn btn-danger">SI</button>

                        {{Form::close()}}
                        <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
                      </div>
                    </div>
                  </div>
                </div>
               

              </td>