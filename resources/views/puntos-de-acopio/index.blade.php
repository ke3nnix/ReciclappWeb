@extends('base') 
@section('title', 'Puntos de acopio')
@section('content')

<div class="col-lg-12">

  <div class="col-md-12">
    <div class="row">
      <form action="{{route('puntos-de-acopio.create')}}">
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
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Nombre</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Dirección</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Distrito</th>
                <th colspan="3" scope="colgroup"style="text-align:center">Cantidades actuales</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Acciones</th>
          </tr>
          <tr>
                <th scope="row">Papel</th>
                <th>Vidrio</th>
                <th>Plástico</th>
          </tr>
        </thead>
        <tbody>
         @foreach($collectionPoints as $row)
           <tr>
              <td>
                <p>{{$row->nombre}}</p>
              </td>
              <td>
                <p> {{$row->direccion}}</p>
              </td>
              <td>
                <p> {{$row->distrito}}</p>
              </td>
              <td>
                <p> {{$row->papel_actual}}</p>
              </td>
              <td>
                <p> {{$row->vidrio_actual}}</p>
              </td>
              <td>
                <p> {{$row->plastico_actual}}</p>
              </td>
              <td>
                <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('puntos-de-acopio.show',['id'=>$row->acopio_id])}}'"><span class="glyphicon glyphicon-eye-open"></span></button>
                <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('puntos-de-acopio.edit',['id'=>$row->acopio_id])}}'" ><span class="glyphicon glyphicon-pencil"></span></button>
                <button id="elimiar" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button>
                {{Form::open(['route'=>['puntos-de-acopio.destroy',$row->acopio_id], 'method'=>'DELETE'])}}
                <div id="myModal" class="modal fade" role="dialog">
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

                        <button type="submit" class="btn btn-primary">Eliminar</button>

                        {{Form::close()}}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
        {!! $collectionPoints->links(); !!}
      </div>
    </div>
  </div>  
</div>

</div>


@stop

