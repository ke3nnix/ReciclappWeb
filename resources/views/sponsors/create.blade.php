@extends('base')
@section('title', 'Agregar Sponsor')
@section('content')
   
     {{Form::open(['route'=>'sponsors.store', 'method'=>'post'])}}

      <div class="centrado-div">
       <div class="col-sm-5">
           {{csrf_field()}}
           <table>
             <tr>
               <td>
                 <div class="group">
                  <input  name="contacto" class="form-control" title="Se necesita un Contacto"  type="text" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label><span class="span-input"> Contacto </span></label>
                </div>

              </td>
            </tr>
            <tr>
             <td>
               <div class="group">
                <input name="razon_social" class="form-control" title="Se necesita uan Razón Social" type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><span class="span-input">Razón Social </span></label>
              </div>
             </td>
            </tr>
            <tr>
             <td>
               <div class="group">
                <input name="ruc" class="form-control" onKeypress="if (event.keyCode <= 45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita RUC (11 digitos)" minlength="11" maxlength="11" size="11" type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><span class="span-input">Ruc </span></label>
              </div>

             </td>
            </tr>
            <tr>
              <td>
                <div class="group">
                 <input name="direccion" class="form-control" title="Se necesita una Dirección"  type="text" required>
                 <span class="highlight"></span>
                 <span class="bar"></span>
                 <label><span class="span-input">Dirección </span></label>
               </div>
              </td>
            </tr>
            <tr>
             <td>
               <div class="group">
                <input name="distrito" class="form-control"  title="Se necesita un Distrito" type="text" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label><span class="span-input">Distrito </span></label>
              </div>

             </td>
             </tr>
              <tr>
               <td>
                 <div class="group">
                   <input name="telefono" class="form-control" onKeypress="if (event.keyCode < =45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita un Teléfono" minlength="7" maxlength="9" size="9" type="text" required>
                   <span class="highlight"></span>
                   <span class="bar"></span>
                   <label><span class="span-input">Teléfono </span></label>
                 </div>
               </td>
             </tr>
             <tr>
               <td >
                        <div style="text-align:center;">
                          <button type="submit" class="btn btn-success">
                            Agregar
                          </button>
                           <a href="/sponsors?estado=activo"  style="background-color: #FC5C5C;color: white" class="btn">Cancelar</a>

                        </div>
                      
               </td>
             </tr>
            </table>  
            
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