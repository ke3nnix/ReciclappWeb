@extends('base')
@section('title', 'Agregar punto de acopio')
@section('content')

     {{Form::open(['route'=>'puntos-de-acopio.store', 'method'=>'post'])}}
           {{csrf_field()}}
          <div class="centrado-div">
                 <div class="col-sm-5">
                    <div>
                          <table>
                           <tr>
                             <td>
                               <div class="group">
                                <input name="nombre" class="form-control" title="Se necesita un nombre" value="" type="text" required/>
                                 <span class="highlight"></span>
                                 <span class="bar"></span>
                                 <label><span class="span-input"> Nombre: </span></label>
                               </div>

                             </td>
                           </tr>
                           <tr>
                             <td>
                               <div class="group">
                                <input name="direccion" class="form-control" title="Se necesita una Dirección" type="text" required />
                                 <span class="highlight"></span>
                                 <span class="bar"></span>
                                 <label><span class="span-input">Dirección: </span></label>
                               </div>
                             </td>
                           </tr>
                           <tr>
                             <td>
                               <div class="group">
                                <input name="distrito" class="form-control" title="Se necesita un Distrito" value=""  type="text" required />
                                 <span class="highlight"></span>
                                 <span class="bar"></span>
                                 <label><span class="span-input">Distrito: </span></label>
                               </div>

                             </td>
                           </tr>
                            <tr>
                              <td>
                                <div class="group">
                                 <input name="papel_max" class="form-control" min="1" type="number" value="" required/>
                                  <span class="highlight"></span>
                                  <span class="bar"></span>
                                  <label><span class="span-input">Papel máximo: </span></label>
                                </div>
                              </td>
                            </tr>
                             <tr>
                               <td>
                                 <div class="group">
                                  <input name="plastico_max" class="form-control" min="1" type="number" value="" required/>
                                   <span class="highlight"></span>
                                   <span class="bar"></span>
                                   <label><span class="span-input">Pástico máximo: </span></label>
                                 </div>

                               </td>
                             </tr>
                             <tr>
                               <td>
                                 <div class="group">
                                   <input name="vidrio_max" class="form-control" min="1" type="number" value="" required />
                                   <span class="highlight"></span>
                                   <span class="bar"></span>
                                   <label><span class="span-input">Vidrio máximo: </span></label>
                                 </div>
                               </td>
                             </tr>
                            </table>
                    </div>
                 </div>



            <div class="col-sm-5">
              <table>
                <tr>
                  <td>
                     <label class="input-group">Ubicación: </label>
                  </td>
                 </tr>
                 <tr>
                   <td>
                     <div id="map"  style="width:450px;height:230px;"></div><br>
                   </td>
                 </tr>
                 <tr>
                  <td>
                      <div class="group">
                        <input type="label" id="latitudScript" name="latitud" class="form-control" readonly="readonly" required />
                        <span class="highlight"></span>
                        <span class="bar"></span>
                      </div>
                      <div class="group">
                        <input type="label" id="longitudScript" name="longitud" class="form-control" readonly="readonly" required/>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                      </div>
                  </td>
                 </tr>
              </table>
            </div><br>
</div>
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
