@extends('base')
@section('title', 'Puntos de acopio')
@section('content')

<div class="col-lg-12">
  
  <div class="col-md-12">
    <div class="row">
      <form action="{{route('collection-points.create')}}">
        <div class="pull-right">
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </form>
    </div>
    
    <div class="row">           
      <div class="table-responsive">

        
        <table id="mytable" class="table table-bordred table-striped">
         
         <thead>
           
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Distrito</th>
          <th>Papel Max</th>
          <th>Vidrio Max</th>
          <th>Plastico Max</th>
          <th>Acciones</th>

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
                                            <p> {{$row->papel_max}}</p>
                                        </td>
                                        <td>
                                            <p> {{$row->vidrio_max}}</p>
                                        </td>
                                        <td>
                                            <p> {{$row->plastico_max}}</p>
                                        </td>
                                        <td>
                                            
                                            <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('collection-points.show',['id'=>$row->id])}}'"><span class="glyphicon glyphicon-chevron-left"></span></button>
                                            <button class="btn btn-primary btn-xs" onclick="window.location.href='{{route('collection-points.edit',['id'=>$row->id])}}'" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" onclick="window.location.href='{{route('collection-points.destroy',['id'=>$row->id])}}'" ><span class="glyphicon glyphicon-trash"></span></button>
                                        </td>
                                        </tr>                                                     
          @endforeach     
      </tbody>
    </table>

    <ul class="pagination pull-right">
      <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
    </ul>
    
  </div>
  
</div>  
</div>

</div>



@stop

