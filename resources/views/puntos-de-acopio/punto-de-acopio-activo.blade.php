@extends('base') 
@section('title', 'Puntos de acopio activos')
@section('content')

<div class="col-lg-12">

  <div class="col-md-12">
    <div class="row">
      <form action="{{route('puntos-de-acopio.create')}}">
        <div class="pull-right">
          <button type="submit" class="btn btn-success">Agregar</button>
        </div>
      </form>
        <div class="pull-right col-lg-1 " >
          <button type="submit" id="enviar" data-toggle="modal" data-target="#myModal" class="btn btn-danger">Recoger</button>
        </div>
    </div>


    <div class="row">
      <ul class="nav nav-tabs">
        <li class="active"><a  href="#">Activos</a></li>
        <li><a href="/puntos-de-acopio?estado=inactivo">Inactivos</a></li>
      </ul>           
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
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Nombre</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Dirección</th>
                <th rowspan="2" scope="rowgroup" style="vertical-align:middle">Distrito</th>
                <th colspan="3" scope="colgroup" style="text-align:center">Cantidades actuales</th>
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
          @if($row->papel_actual>=0.8*$row->papel_max || $row->vidrio_actual>=0.8*$row->vidrio_max || $row->plastico_actual>=0.8*$row->plastico_max )
            <tr id="{{$row->acopio_id}}" style="background-color: #E5B3B3">
              @include('puntos-de-acopio.tabla-acopio')
            </tr>
          @endif
         @if($row->papel_actual<0.8*$row->papel_max && $row->vidrio_actual<0.8*$row->vidrio_max && $row->plastico_actual<0.8*$row->plastico_max)
           <tr id="{{$row->acopio_id}}"> 
           @include('puntos-de-acopio.tabla-acopio')
            </tr>
          @endif                                                    
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#enviar').click(function(){
        var selected = '';
        var ids='';   
        $('#formid input[type=checkbox]').each(function(){
            if (this.checked) {
                selected += $(this).val()+', ';
                ids += $(this).val()+', ';
            }
        }); 

        if (selected != ''){ 
            document.getElementById("test").innerHTML=selected;
            $('#myModal').modal('show');
            }  
        else
            alert('Debes seleccionar al menos una opción.');

        return false;
    });         
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#enviar').click(function(){
        var ids='';   
        $('#formid input[calss=hidden]').each(function(){
            if (this.checked) {
                ids += $(this).val()+', ';
            }
        }); 

        if (selected != ''){ 
            alert(ids);
            }  
        else
            alert('Debes seleccionar al menos una opción.');

        return false;
    });         
});
</script>
@stop

