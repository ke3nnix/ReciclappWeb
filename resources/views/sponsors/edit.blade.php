@extends('base')
@section('title', 'Editar punto de acopio')
@section('content')
   
     {{Form::open(['route'=>['sponsors.update',$sponsor->acopio_id], 'method'=>'PUT'])}}
       
           {{csrf_field()}}

           <div style="margin-left: 100px;">
          <div class="row">
           <div class="form-group">
            <label  class="col-md-4 control-label">Contacto</label>  
            <div class="col-md-6 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  name="nombre" class="form-control"  type="text" value="{{$sponsor->contacto}}">
              </div>
            </div>
          </div>
        </div> <br>
             <div class="row">
               <div class="form-group">
                <label class="col-md-4 control-label">Razón Social</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                    <input name="direccion" class="form-control" type="text" value="{{$sponsor->razon_social}}">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
               <div class="form-group">
                <label class="col-md-4 control-label">RUC</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                    <input name="distrito" class="form-control"  type="text" value="{{ $sponsor->ruc}}">
                  </div>
                </div>
              </div>
             </div><br>

             <div class="row">
              <div class="form-group">
              <label class="col-md-4 control-label">Dirección</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input name="papel_max" class="form-control"  type="text" value="{{$sponsor->direccion}}">
                  </div>
                </div>
              </div>
             </div><br>
            <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label">Distrito</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
                    <input name="vidrio_max" class="form-control"  type="text" value="{{ $sponsor->distrito}}">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
                <div class="form-group">
              <label class="col-md-4 control-label">Télefono</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                    <input name="plastico_max" class="form-control"  type="text" value="{{ $sponsor->telefono}}">
                  </div>
                </div>
              </div>
             </div><br>            
      </div>
            
            
                <div class="col-md-6 col-md-offset-8" >
                    <button type="submit" class="btn btn-success">
                      Actualizar
                    </button>   
                    <a href="{{route('puntos-de-acopio.index')}}" class="btn btn-danger">Cancelar</a>
                </div><br>
        
    <!--script>

              var map = null;
              var infoWindow = null;

              function openInfoWindow(marker) {
                var markerLatLng = marker.getPosition();
                infoWindow.setContent([
                  '<strong>La posicion del marcador es:</strong><br/>',
                  markerLatLng.lat(),
                  ', ',
                  markerLatLng.lng(),
                  
                  ].join(''));
                var latText=markerLatLng.lat(); 
                document.getElementById("latitudScript").value=latText;
                var logText=markerLatLng.lng();
                document.getElementById("longitudScript").value=logText;
                infoWindow.open(map, marker);
              }

              function myMap() {
                
                var LAT= document.getElementById("latitudScript").value;
                var LOG= document.getElementById("longitudScript").value;
                
                var lat_lng = {lat:parseFloat(LAT), lng: parseFloat(LOG)}; 
                 map = new google.maps.Map(document.getElementById('map'), {  
                    zoom: 15,  
                    center: lat_lng,  
                    mapTypeId: google.maps.MapTypeId.TERRAIN  
                  });  
                infoWindow = new google.maps.InfoWindow();

                var marker = new google.maps.Marker({
                  position: lat_lng,
                  draggable: true,
                  map: map,
                  title:"Ejemplo marcador arrastrable"
                }); 

                google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
                google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
                
              }

              $(document).ready(function() {
                myMap();
                gmaps_ads();
              });        
          </script>

          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB4ZIAHHHpeAmS-khq5zqLWWmTosyIrAg&callback=myMap"></script>
-->
      {{Form::close()}}
         
@stop