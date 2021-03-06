@extends('base') 
@section('title', 'Administradores Activos')
@section('content')

<div class="col-lg-12">

  <div class="col-md-12">
    <div class="container" style="background-color:#F8F8F8;margin-bottom:20px;">
        <div class="col-md-10">
          <br>
        </div>    
        <div class="col-md-2">
          <form action="{{route('usuarios.create')}}">
            <div class="pull-right">
              <button type="submit" class="btn btn-success">Agregar</button>

            </div>
          </form>
        </div>
    </div>  
    
    <div class="container">
      <ul class="nav nav-tabs">
        <li class="active"><a  href="#">Activos</a></li>
        <li><a href="/usuarios?tipo=administradores&estado=inactivo">Inactivos</a></li>
      </ul>

      
    <div class="row tab-content">           
      <div class="table-responsive">


        <table id="mytable" class="table table-bordred table-striped">

      

        <thead>
          <tr>
                <th scope="rowgroup" style="vertical-align:middle">Nombre</th>
                <th scope="rowgroup" style="vertical-align:middle">Apellido</th>
                <th scope="rowgroup" style="vertical-align:middle">Distrito</th>
                <th scope="rowgroup" style="vertical-align:middle">Correo</th>
                <th scope="colgroup" style="vertical-align:middle">Acciones</th>
          </tr>
        </thead>
        <tbody>
         @foreach($users as $row)
           <tr id="{{$row->usuario_id}}"> 
              <td > 
                <p>{{$row->nombre}}</p> 
              </td> 
               <td > 
                <p>{{$row->apellido}}</p> 
              </td> 
              <td > 
                <p> {{$row->distrito}}</p> 
              </td>
              <td>
                <p> {{$row->email}}</p>
              </td> 
              <td >
                <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('usuarios.show',['id'=>$row->usuario_id])}}'">Ver</button>
                <button class="btn btn-success btn-xs"  onclick="window.location.href='{{route('usuarios.edit',['id'=>$row->usuario_id])}}'" >Editar</button> 
              
                  <button type="submit" data-toggle="modal" data-target="#myModalactivar{{$row->usuario_id}}" style="background-color: #FC5C5C;color: white" class="btn btn-default btn-xs">Desactivar</button>
             
              {{Form::open(['route'=>['usuarios.destroy',$row->usuario_id], 'method'=>'DELETE'])}}
                <div id="myModalactivar{{$row->usuario_id}}" class="modal fade" role="dialog"> 
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">¿Desea desactivar a?</h4>
                      </div>
                      <div class="modal-body">
                        <p> <b>{{$row->nombre}} {{$row->apellido}}</b></p>
                      </div>

                      <div class="modal-footer">

                      <button type="submit" class="btn btn-danger">SI</button>
                      {{Form::close()}}
                      <button type="button" class="btn btn-primary" data-dismiss="modal" >NO</button>
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
        {!! $users->appends(request()->input())->links(); !!}
      </div>
    </div>
  </div>  
</div>

</div>


@stop

