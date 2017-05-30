@extends('base')
@section('title', 'Agregar punto de acopio')
@section('content')
   
     {{Form::open(['route'=>'puntos-de-acopio.store', 'method'=>'post'])}}

       <div>
           {{csrf_field()}}
      <dir style="margin-left: 100px;">
          <div class="row">
           <div class="form-group">
            <label  class="col-md-4 control-label">Nombre</label>  
            <div class="col-md-6 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
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
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
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
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
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
                    <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
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
                    <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
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
                    <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                    <input name="plastico_max" class="form-control"  type="text">
                  </div>
                </div>
              </div>
             </div><br>
              <div class="row" >
                <label class="col-md-4 control-label">Ubica tu punto de acopio</label>
              </div>      
            
      </dir>
                         
            <div class="row" style="margin-left: 160px;"" >
              <div id="map"  style="width:700px;height:300px"></div>
            </div><br>
            
             <div class="row"  style="margin-left: 10px;">
                <div class="col-md-6 col-md-offset-8">
                    <button type="submit" class="btn btn-primary">
                      Agregar
                    </button>
                     <a href="{{route('puntos-de-acopio.index')}}" class="btn btn-danger">Cancelar</a>
                  </div>
             </div>
            <script>
                var map;  
                var markers = [];  
                  
                function myMap() {  
                  var lat_lng = {lat:-12.0563604, lng: -77.0856249};  
                  
                  map = new google.maps.Map(document.getElementById('map'), {  
                    zoom: 17,  
                    center: lat_lng,  
                    mapTypeId: google.maps.MapTypeId.TERRAIN  
                  });  
                  
                  // This event listener will call addMarker() when the map is clicked.  
                  map.addListener('click', function(event) {  
                    addMarker(event.latLng);  
                  });  
                  
                  // Adds a marker at the center of the map.  
                  addMarker(lat_lng);  
                }  
                  
                // Adds a marker to the map and push to the array.  
                function addMarker(location) {  
                  var marker = new google.maps.Marker({  
                    position: location,  
                    map: map  
                  });  
                  markers.push(marker);  
                }  
              </script>

              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB4ZIAHHHpeAmS-khq5zqLWWmTosyIrAg&callback=myMap"></script>

        </div>
     {{Form::close()}}


@stop