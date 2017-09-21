@extends('base')
@section('title', 'Detalle de punto de acopio')
@section('content')

<div style="overflow-x: hidden;">
{{Form::open(['route'=>['puntos-de-acopio.destroy',$collectionPoint->acopio_id], 'method'=>'DELETE'])}}
  <div class="container">
          <div class="centrado-div1">
            <div class="col-md-3"> {!! $chartPapel->render() !!} </div>
            <div class="col-md-3"> {!! $chartVidrio->render() !!} </div>
            <div class="col-md-3"> {!! $chartPlastico->render() !!} </div>
          </div>
          <div class="centrado-div2">

                 <div class="col-sm-6">
                    <div>
                          <table style="height: 300px">
                           <tr>
                             <td>
                               <label class="input-group" style="width: 130px">Nombre:</label>
                             </td>
                             <td>
                               <label style="border:none" name="nombre" class="form-control" type="text">{{$collectionPoint->nombre}}</label>
                             </td>
                           </tr>
                           <tr>
                             <td>
                               <label class="input-group">Dirección: </label>
                             </td>
                             <td>
                               <label name="direccion" style="border:none" class="form-control cortar-direcc" type="text">{{$collectionPoint->direccion}}</label>
                             </td>
                           </tr>
                           <tr>
                             <td>
                               <label class="input-group">Distrito: </label>
                             </td>
                             <td>
                               <label name="distrito" class="form-control" style="border:none" type="text">{{$collectionPoint->distrito}}</label>
                             </td>
                           </tr>
                            <tr>
                              <td>
                                <label class="input-group">Papel máximo: </label>
                              </td>
                              <td>
                                <label name="papel_max" class="form-control" style="border:none" type="text">{{$collectionPoint->papel_max}}</label>
                              </td>
                            </tr>
                             <tr>
                               <td>
                                  <label class="input-group">Pástico máximo: </label>
                               </td>
                               <td>
                                  <label name="plastico_max" class="form-control" style="border:none"  type="text">{{$collectionPoint->plastico_max}}</label>
                               </td>
                             </tr>
                             <tr>
                               <td>
                                    <label class="input-group">Vidrio máximo: </label>
                               </td>
                               <td>
                                    <label name="vidrio_max" class="form-control" style="border:none" type="text">{{$collectionPoint->vidrio_max}}</label>
                               </td>
                             </tr>
                           </table>
                    </div>
                 </div>

                 <div class="col-sm-6">
                   <div>
                      <div id="map"  style="width:550px;height:290px"></div>
                    </div><br>
                 </div>
          </div>
 </div>


<div class="col-md-6 col-md-offset-10" >
    <button type="submit" style="background-color: #FC5C5C;color: white" class="btn">
          Desactivar
    </button>
    <a href="/puntos-de-acopio?estado=activo" class="btn btn-success">Cancelar</a>
</div>
  <!-- latitud y longitud-->
    <div style="visibility:hidden">
          <input id="latitudScript" name="latitud" class="form-control"  type="text" value="{{$collectionPoint->latitud}}"  />
          <input id="longitudScript" name="longitud" class="form-control"  type="text" value="{{$collectionPoint->longitud}}"  />
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
        draggable: false,
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
</div>



  @stop
