@extends('base')
@section('title', 'Editar punto de acopio')
@section('content')
   
     {{Form::open(['route'=>['puntos-de-acopio.update',$collectionPoint->acopio_id], 'method'=>'PUT'])}}
       
           {{csrf_field()}}

           <div style="margin-left: 100px;">
          <div class="row">
           <div class="form-group">
            <label  class="col-md-4 control-label">Nombre</label>  
            <div class="col-md-6 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  name="nombre" class="form-control"  type="text" value="{{ $collectionPoint->nombre }}">
              </div>
            </div>
          </div>
        </div> <br>
             <div class="row">
               <div class="form-group">
                <label class="col-md-4 control-label">Dirección</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input name="direccion" class="form-control" type="text" value="{{$collectionPoint->direccion}}">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
               <div class="form-group">
                <label class="col-md-4 control-label">Distrito</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input name="distrito" class="form-control"  type="text" value="{{ $collectionPoint->distrito}}">
                  </div>
                </div>
              </div>
             </div><br>

             <div class="row">
              <div class="form-group">
              <label class="col-md-4 control-label">Papel maximo</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                    <input name="papel_max" class="form-control"  type="text" value="{{$collectionPoint->papel_max}}">
                  </div>
                </div>
              </div>
             </div><br>
            <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label">Vidrio maximo</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                    <input name="vidrio_max" class="form-control"  type="text" value="{{ $collectionPoint->vidrio_max}}">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
                <div class="form-group">
              <label class="col-md-4 control-label">Plástico maximo</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                    <input name="plastico_max" class="form-control"  type="text" value="{{ $collectionPoint->plastico_max}}">
                  </div>
                </div>
              </div>
             </div><br>
              <div class="row" >
                <label class="col-md-4 control-label">Editar ubicacion</label>
              </div>      
            
      </div>
            <div class="row" style="margin-left: 160px;"" >
              <div id="map"  style="width:700px;height:300px"></div>
            </div><br>
            
                <div class="col-md-6 col-md-offset-8" >
                    <button type="submit" class="btn btn-success">
                      Actualizar
                    </button>   
                    <a href="{{route('puntos-de-acopio.index')}}" class="btn btn-danger">Cancelar</a>
                </div><br>

                
                      <!-- latitud y longitud-->
                      <div class="row">
                      <div class="form-group">
                        <div class="col-md-12 inputGroupContainer">
                          <div class="input-group">
                           
                            <input id="latitudScript" name="latitud" class="form-control"  type="text" value="{{$collectionPoint->latitud}}"  style="visibility:hidden"/>
                          </div>
                        </div>
                      </div>
                    </div><br>

                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-12 inputGroupContainer">
                          <div class="input-group">
                            <input id="longitudScript" name="longitud" class="form-control"  type="text" value="{{$collectionPoint->longitud}}"  style="visibility:hidden"/>
                          </div>
                        </div>
                      </div>        
    <script>

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
                    zoom: 17,  
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

      {{Form::close()}}
         
@stop