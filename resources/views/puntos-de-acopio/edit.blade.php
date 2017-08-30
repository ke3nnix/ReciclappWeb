@extends('base')
@section('title', 'Editar punto de acopio')
@section('content')

     {{Form::open(['route'=>['puntos-de-acopio.update',$collectionPoint->acopio_id], 'method'=>'PUT'])}}

           {{csrf_field()}}

    <div style="overflow-x: hidden;">
      <div class="centrado-div">
             <div class="col-sm-6">
                <div>
                      <table style="height: 300px">
                       <tr>
                         <td>
                           <label class="input-group" style="width: 130px">Nombre:</label>
                         </td>
                         <td>
                           <input name="nombre" class="form-control" type="text" value="{{$collectionPoint->nombre}}">
                         </td>
                       </tr>
                       <tr>
                         <td>
                           <label class="input-group">Dirección: </label>
                         </td>
                         <td>
                           <input name="direccion" class="form-control cortar-direcc" value="{{$collectionPoint->direccion}}" >
                         </td>
                       </tr>
                       <tr>
                         <td>
                           <label class="input-group">Distrito: </label>
                         </td>
                         <td>
                           <input name="distrito" class="form-control" value="{{$collectionPoint->distrito}}">
                         </td>
                       </tr>
                        <tr>
                          <td>
                            <label class="input-group">Papel máximo: </label>
                          </td>
                          <td>
                            <input name="papel_max" class="form-control"  type="number" value="{{$collectionPoint->papel_max}}">
                          </td>
                        </tr>
                         <tr>
                           <td>
                              <label class="input-group">Pástico máximo: </label>
                           </td>
                           <td>
                              <input name="papel_max" class="form-control"  type="number" value="{{$collectionPoint->plastico_max}}">
                           </td>
                         </tr>
                         <tr>
                           <td>
                                <label class="input-group">Vidrio máximo: </label>
                           </td>
                           <td>
                                <input name="vidrio_max" class="form-control" type="number" value="{{$collectionPoint->vidrio_max}}">
                           </td>
                         </tr>
                       </table>
                </div>
             </div>

      </div>

    </div>
          <div class="centrado-div2">
              <div id="map"  style="width:700px;height:300px"></div>
          </div><br>
          <div class="row"  style="margin-left: 10px;">
                <div class="col-md-6 col-md-offset-9" >
                    <button type="submit" class="btn btn-success">
                      Actualizar
                    </button>
                    <a href="/puntos-de-acopio?estado=activo" style="background-color: #FC5C5C;color: white" class="btn">Cancelar</a>
                </div><br>
          </div>

          <!-- latitud y longitud-->
          <div class="row">
            <div class="form-group">
              <div class="col-md-12 inputGroupContainer">
                <div class="input-group">

                  <input id="latitudScript" name="latitud" class="form-control"  type="text" value="{{$collectionPoint->latitud}}"  style="visibility:hidden" required />
                </div>
              </div>
            </div>
          </div><br>

          <div class="row">
            <div class="form-group">
              <div class="col-md-12 inputGroupContainer">
                <div class="input-group">
                  <input id="longitudScript" name="longitud" class="form-control"  type="text" value="{{$collectionPoint->longitud}}"  style="visibility:hidden" required />
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

      {{Form::close()}}

@stop
