@extends('base') 
@section('title', 'Empleados Inactivos')
@section('content')

<div class="col-lg-12">

  <div class="col-md-12">
    <div class="row">
      <form action="{{route('usuarios.create')}}">
        <div class="pull-right">
          <button type="submit" class="btn btn-success">Agregar</button>

        </div>
      </form>
    </div>
    <div class="container">
      <ul class="nav nav-tabs">
        <li class="active"><a  " href="#">Activos</a></li>
        <li><a  href="#">Inactivos</a></li>
      </ul>

    <div class="row tab-content">           
      <div class="table-responsive">


        <table id="mytable" class="table table-bordred table-striped">

      

        <thead>
          <tr>
                <th scope="rowgroup" style="vertical-align:middle">Nombre</th>
                <th scope="rowgroup" style="vertical-align:middle">Apellido</th>
                <th scope="rowgroup" style="vertical-align:middle">Distrito</th>
                <th scope="colgroup" style="vertical-align:middle">Estado</th>
          </tr>
        </thead>
        <tbody>
         @foreach($users as $row)
           <tr id="{{$row->acopio_id}}"> 
              <td style="width: 100px"> 
                <p>{{$row->nombre}}</p> 
              </td> 
               <td style="width: 80px"> 
                <p>{{$row->apellido}}</p> 
              </td> 
              <td style="width: 80px"> 
                <p> {{$row->distrito}}</p> 
              </td> 
              <td style="width: 80px">
               @if($row->estado=='0')
               <p>Inactivo</p>
               @endif
               @if($row->estado=='1')
               <p>Activo</p>
               @endif
              </td>
              <td style="width: 100px">
                <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('usuarios.show',['id'=>$row->acopio_id])}}'"><span class="glyphicon glyphicon-eye-open"></span></button>
                <button class="btn btn-success btn-xs" onclick="window.location.href='{{route('usuarios.edit',['id'=>$row->acopio_id])}}'" ><span class="glyphicon glyphicon-pencil"></span></button> 
                <button id="elimiar" data-toggle="modal" data-target="#myModal{{$row->usuario_id}}" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button> 

                {{Form::open(['route'=>['puntos-de-acopio.destroy',$row->usuario_id], 'method'=>'DELETE'])}}
                <div id="myModal{{$row->usuario_id}}" class="modal fade" role="dialog"> 
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Confirmar</h4>
                      </div>
                      <div class="modal-body">
                        <p>Eliminar a: <b>{{$row->nombre}}</b></p>
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
        {!! $users->links(); !!}
      </div>
    </div>
  </div>  
</div>

</div>


@stop

