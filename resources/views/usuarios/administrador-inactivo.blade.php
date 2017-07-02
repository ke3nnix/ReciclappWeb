@extends('base') 
@section('title', 'Administradores Inactivos')
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
        <li><a href="/usuarios?tipo=administradores&estado=activo">Activos</a></li>
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
                <th scope="colgroup" style="vertical-align:middle">Estado</th>
          </tr>
        </thead>
        <tbody>
         @foreach($users as $row)
           <tr id="{{$row->usuario_id}}"> 
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
                {{Form::open(['route'=>['usuarios.destroy',$row->usuario_id], 'method'=>'DELETE'])}}
                  <button type="submit" class="btn btn-default btn-xs" onMouseOver="this.style.backgroundColor='#1ABC9C'" onMouseOut="this.style.backgroundColor='#F3F1F1'">Activar</button>
                {{Form::close()}}
              </td>
              <td style="width: 100px">
                <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('usuarios.show',['id'=>$row->usuario_id])}}'"><span class="glyphicon glyphicon-eye-open"></span></button>
                <button class="btn btn-success btn-xs" onclick="window.location.href='{{route('usuarios.edit',['id'=>$row->usuario_id])}}'" ><span class="glyphicon glyphicon-pencil"></span></button> 
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

