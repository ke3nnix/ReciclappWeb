 
              {{Form::open(['route'=>['puntos-de-acopio.recoger',$row->acopio_id], 'method'=>'POST'])}}
              <!--modal para recojo-->
              <div id="myModalrecoger{{$row->acopio_id}}" class="modal fade" role="dialog"> 
                <div class="modal-dialog ">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Confirmar</h4>
                    </div>
                    <div class="modal-body">
                      <p>Punto de acopio a recoger: <b>{{$row->nombre}}</b></p>
                    </div>

                    <div class="modal-footer">

                      <button type="submit" class="btn btn-danger" >SI</button>
                    {{Form::close()}}
                      <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
                    </div>
                  </div>
                </div>
              </div>
              <td style="width: 100px"> 
              <!--fin del modal--> 
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
                <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('puntos-de-acopio.show',['id'=>$row->acopio_id])}}'">Ver</button>
                <button class="btn btn-success btn-xs" onclick="window.location.href='{{route('puntos-de-acopio.edit',['id'=>$row->acopio_id])}}'" >Editar</button> 
                <button id="elimiar" data-toggle="modal" data-target="#myModaldescactivar{{$row->acopio_id}}" style="background-color: #FC5C5C;color: white" class="btn btn-xs" >Desactivar</button> 

                {{Form::open(['route'=>['puntos-de-acopio.destroy',$row->acopio_id], 'method'=>'DELETE'])}}
                <div id="myModaldescactivar{{$row->acopio_id}}" class="modal fade" role="dialog"> 
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">¿Desea desactivar a?</h4>
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