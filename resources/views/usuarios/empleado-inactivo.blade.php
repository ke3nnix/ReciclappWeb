@extends('base') 
@section('title', 'Empleados Inactivos')
@section('content')

<div class="col-lg-12">

  <div class="col-md-12">
    

    <div class="container" style="background-color:#F8F8F8;margin-bottom:20px;">
      <div class="col-md-10">
        <br>
      </div>
      <div class="col-md-2">
        <form action="{{route('usuarios.create')}}">
          <div>
            <button type="submit" class="btn btn-success pull-right">Agregar</button>
          </div>
        </form>
      </div>
    </div>
    
    <div class="container">
      <ul class="nav nav-tabs">
        <li><a href="/usuarios?tipo=empleados&estado=activo">Activos</a></li>
        <li class="active"><a href="#">Inactivos</a></li>
      </ul>

    <div class="row tab-content">           
      <div class="table-responsive">


        <table id="mytable" class="table table-bordred table-striped">

      

        <thead>
          <tr>
                <th scope="rowgroup" style="vertical-align:middle">Nombre</th>
                <th scope="rowgroup" style="vertical-align:middle">Apellido</th>
                <th scope="rowgroup" style="vertical-align:middle">Distrito</th>
                <th scope="rowgroup" style="vertical-align:middle">Distrito</th>
                <th scope="colgroup" style="vertical-align:middle">Acción</th>
          </tr>
        </thead>
        <tbody>
         @foreach($users as $row)
           <tr id="{{$row->usuario_id}}"> 
              <td > 
                <p>{{$row->nombre}}</p> 
              </td> 
               <td> 
                <p>{{$row->apellido}}</p> 
              </td> 
              <td> 
                <p> {{$row->distrito}}</p> 
              </td> 
              <td >
               <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModaldesactivar{{$row->usuario_id}}"><span class="glyphicon glyphicon-ok"></span>Activar</button>
                  {{Form::open(['route'=>['usuarios.destroy',$row->usuario_id], 'method'=>'DELETE'])}}
                   <div id="myModaldesactivar{{$row->usuario_id}}" class="modal fade" role="dialog"> 
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">¿Desea activar a?</h4>
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

