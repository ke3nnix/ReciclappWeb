@extends('base') 
@section('title', 'Sponsors activos')
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
      <ul class="nav nav-tabs">
        <li class="active"><a  href="#">Activos</a></li>
        <li><a href="//sponsors?estado=inactivo">Inactivos</a></li>
      </ul>                 
      <div class="table-responsive">


        <table id="mytable" class="table table-bordred table-striped">

        <thead>
          <tr>
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
                <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('beneficios.index',['id'=>$row->sponsor_id])}}'"><span class="glyphicon glyphicon-eye-open"></span></button>
                <button class="btn btn-success btn-xs" onclick="window.location.href='{{route('sponsors.edit',['id'=>$row->sponsor_id])}}'" ><span class="glyphicon glyphicon-pencil"></span></button> 
                <button id="desactivar" data-toggle="modal" data-target="#myModal{{$row->sponsor_id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button>
                {{Form::open(['route'=>['sponsors.destroy', $row->sponsor_id], 'method'=>'DELETE'])}} 
                <div id="myModal{{$row->sponsor_id}}" class="modal fade" role="dialog"> 
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">¿Desea desactivar a?</h4>
                      </div>
                      <div class="modal-body">
                        <p> <b>{{$row->razon_social}}</b></p>
                      </div>

                      <div class="modal-footer">

                      <button type="submit" class="btn btn-danger">SI</button>
                      {{Form::close()}}
                      <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('sponsors.index')}}'" >NO</button>
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

