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
                <div class="cortar"> {{$row->direccion}}</div> 
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
                <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('puntos-de-acopio.show',['id'=>$row->acopio_id])}}'"><span class="glyphicon glyphicon-eye-open"></span></button>
                <button class="btn btn-success btn-xs" onclick="window.location.href='{{route('puntos-de-acopio.edit',['id'=>$row->acopio_id])}}'" ><span class="glyphicon glyphicon-pencil"></span></button> 
                <button id="elimiar" data-toggle="modal" data-target="#myModal{{$row->acopio_id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button> 

                {{Form::open(['route'=>['puntos-de-acopio.destroy',$row->acopio_id], 'method'=>'DELETE'])}}
                <div id="myModal{{$row->acopio_id}}" class="modal fade" role="dialog"> 
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Confirmar</h4>
                      </div>
                      <div class="modal-body">
                        <p>Punto de acopio a eliminar: <b>{{$row->nombre}}</b></p>
                      </div>
                      <div class="modal-footer">

                        <button type="submit" class="btn btn-danger">Eliminar</button>

                        {{Form::close()}}
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
               

              </td>