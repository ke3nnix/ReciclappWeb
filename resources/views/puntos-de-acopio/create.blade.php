@extends('base')
@section('title', 'Agregar punto de acopio')
@section('content')
   
     {{Form::open(['route'=>'puntos-de-acopio.store', 'method'=>'post'])}}

       <div>
           {{csrf_field()}}
      <dir style="position: relative;right: -100px" >
          <div class="row">
           <div class="form-group">
            <label  class="col-md-4 control-label">Nombre</label>  
            <div class="col-md-6 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"></span>
                <input  name="nombre" class="form-control"  type="text">
              </div>
            </div>
          </div>
        </div> <br>
             <div class="row">
               <div class="form-group">
                <label class="col-md-4 control-label">Dirección</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input name="direccion" class="form-control" type="text">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
               <div class="form-group">
                <label class="col-md-4 control-label">Distrito</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input name="distrito" class="form-control"  type="text">
                  </div>
                </div>
              </div>
             </div><br>

             <div class="row">
              <div class="form-group">
              <label class="col-md-4 control-label">Papel maximo</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input name="papel_max" class="form-control"  type="text">
                  </div>
                </div>
              </div>
             </div><br>
            <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label">Vidrio maximo</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input name="vidrio_max" class="form-control"  type="text">
                  </div>
                </div>
              </div>
             </div><br>
             <div class="row">
                <div class="form-group">
              <label class="col-md-4 control-label">Plástico maximo</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input name="plastico_max" class="form-control"  type="text">
                  </div>
                </div>
              </div>
             </div><br><br>

             <div class="row">
                <div class="form-group">
              <label class="col-md-4 control-label">Ubica tu punto de acopio</label>  
                <div class="col-md-6 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="label" id="latitudScript" name="latitud" class="form-control" readonly="readonly">
                    <span class="input-group-addon"></span>
                    <input type="label" id="longitudScript" name="longitud" class="form-control" readonly="readonly" >
                  </div>
                </div>
              </div>
             </div><br>
            
      </dir>
                         
            <div class="row" style="margin-left: 160px;position: relative;right: -100px" >
              <div id="map"  style="width:700px;height:300px"></div>
            </div><br>
            
             <div class="row"  style="margin-left: 10px;">
                <div class="col-md-6 col-md-offset-9">
                    <button type="submit" class="btn btn-success">
                      Agregar
                    </button>
                     <a href="/puntos-de-acopio?estado=activo" style="background-color: #FC5C5C;color: white" class="btn">Cancelar</a>

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
                  '<br/>Arrástrame para actualizar la posición.'
                  ].join(''));
                //mandar a un label latitud
                var latText=markerLatLng.lat(); 
                document.getElementById("latitudScript").value=latText;
                var logText=markerLatLng.lng();
                document.getElementById("longitudScript").value=logText;

                infoWindow.open(map, marker);
              }

              function myMap() {
               

                var lat_lng = {lat:-12.0563604, lng: -77.0856249};  
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
              });        </script>

              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB4ZIAHHHpeAmS-khq5zqLWWmTosyIrAg&callback=myMap"></script>

        </div>
     {{Form::close()}}


@stop