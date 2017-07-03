@extends('base') 
@section('title', 'Sponsors inactivos')
@section('content')

<div class="col-lg-12">

  <div class="col-md-12">
    <div class="row">
      <form action="{{route('sponsors.create')}}">
        <div class="pull-right">
          <button type="submit" class="btn btn-success">Agregar</button>

        </div>
      </form>
    </div><br>
    
    <div class="row">
      <ul class="nav nav-tabs">
        <li><a href="/sponsors?estado=activo">Activos</a></li>
        <li class="active"><a href="#">Inactivos</a></li>
      </ul>         
      <div class="table-responsive">


        <table id="mytable" class="table table-bordred table-striped">
        <thead>
          <tr>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Razón</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">RUC</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Telefono</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Dirección</th> 
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Activar</th>

          </tr>
        </thead>
        <tbody>
         @foreach($sponsors as $row)
           <tr id="{{$row->sponsor_id}}"> 
              
              <td > 
                <p>{{$row->razon_social}}</p> 
              </td> 
               <td > 
                <p> {{$row->ruc}}</p> 
              </td> 
              <td >
                <p > {{$row->telefono}}</p> 
              </td>
              <td> 
                <p > {{$row->direccion}} </p> 
              </td> 
              <td>
                <button id="desactivar" data-toggle="modal" data-target="#myModaldesactivar{{$row->sponsor_id}}" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-ok"></span>Activar</button>
              </td>             
              {{Form::open(['route'=>['sponsors.destroy', $row->sponsor_id], 'method'=>'DELETE'])}} 
                <div id="myModaldesactivar{{$row->sponsor_id}}" class="modal fade" role="dialog"> 
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">¿Desea activar a?</h4>
                      </div>
                      <div class="modal-body">
                        <p> <b>{{$row->razon_social}}</b></p>
                      </div>

                      <div class="modal-footer">

                      <button type="submit" class="btn btn-danger">SI</button>
                      {{Form::close()}}
                      <button type="button" class="btn btn-primary" data-dismiss="modal" >NO</button>
                      </div>
                    </div>
                  </div>
                </div>
            </tr>                                                     
          @endforeach     
        </tbody>
      </table>

      <div class="text-center">
        {!! $sponsors->appends(request()->input())->links(); !!}
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

