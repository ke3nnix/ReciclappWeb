@extends('base') 
@section('title', 'Sponsors')
@section('content')

<div class="col-lg-12">

  <div class="col-md-12">
    <div class="row">
      <form action="{{route('sponsors.create')}}">
        <div class="pull-right">
          <button type="submit" class="btn btn-success">Agregar</button>

        </div>
      </form>
    </div>
    
    <div class="row">           
      <div class="table-responsive">


        <table id="mytable" class="table table-bordred table-striped">

          <!--<thead>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Distrito</th>
          <th>Papel</th>
          <th>Vidrio</th>
          <th>Plástico</th>
          <th>Acciones</th>
        </thead>-->

        <thead>
          <tr>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle"><input type="checkbox" id="checkMain" onclick="marcar(this);" /></th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Contacto</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Razón</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">RUC</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Telefono</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Dirección</th> 
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Acciones</th>

          </tr>
        </thead>
        <tbody>
         @foreach($sponsors as $row)
           <tr id="{{$row->sponsor_id}}"> 
              <td style="width: 5px"> 
                <p><input type="checkbox" class="checkAll"/></p> 
              </td> 
              <td style="width: 100px">
                <p> {{$row->contacto}}</p> 
              </td>
              <td style="width: 150px"> 
                <div >{{$row->razon_social}}</div> 
              </td> 
               <td style="width: 140px"> 
                <p> {{$row->ruc}}</p> 
              </td> 
              <td style="width:100px">
                <p > {{$row->telefono}}</p> 
              </td>
              <td> 
                <div class="cortar" > {{$row->direccion}}</div> 
              </td> 
                            
              <td style="width: 100px">
                <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('sponsors.show',['id'=>$row->sponsor_id])}}'"><span class="glyphicon glyphicon-eye-open"></span></button>
                <button class="btn btn-success btn-xs" onclick="window.location.href='{{route('sponsors.edit',['id'=>$row->sponsor_id])}}'" ><span class="glyphicon glyphicon-pencil"></span></button> 
                <button id="elimiar" data-toggle="modal" data-target="#myModal{{$row->sponsor_id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button> 

                {{Form::open(['route'=>['puntos-de-acopio.destroy',$row->sponsor_id], 'method'=>'DELETE'])}}
                <div id="myModal{{$row->sponsor_id}}" class="modal fade" role="dialog"> 
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Confirmar</h4>
                      </div>
                      <div class="modal-body">
                        <p>Sponsor a elminar: <b>{{$row->razon_social}}</b></p>
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
            </tr>                                                     
          @endforeach     
        </tbody>
      </table>

      <div class="text-center">
        {!! $sponsors->links(); !!}
      </div>
    </div>
  </div>  
</div>

</div>
<script type="text/javascript"> 
  function marcar(source)  
  { 
    checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input 
    for(i=0;i<checkboxes.length;i++) //recoremos todos los controles 
    { 
      if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos 
      { 
        checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos) 
      } 
    } 
  } 
  
</script>

@stop

