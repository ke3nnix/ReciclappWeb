@extends('base')
@section('title', 'Detalle de punto de acopio')
@section('content')

{{Form::open(['route'=>['puntos-de-acopio.destroy',$collectionPoint->acopio_id], 'method'=>'DELETE'])}}
  <div class="container">
          <div class="row">
                 
                 <div class="col-sm-5">
                    <div class="well">
                          <div class="row">
                                 <div class="form-group">
                                  <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <label name="nombre" class="form-control"  type="text">{{$collectionPoint->nombre}}</label>
                                    </div>
                                  </div>
                                </div>
                          </div><br>

                          <div class="row">
                             <div class="form-group">  
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                  <label name="direccion" class="form-control" type="text">{{$collectionPoint->direccion}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                           <div class="row">
                             <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                  <label name="distrito" class="form-control"  type="text">{{$collectionPoint->distrito}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>

                           <div class="row">
                            <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                  <label name="papel_max" class="form-control"  type="text">{{$collectionPoint->papel_max}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                          <div class="row">
                          <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                                  <label name="vidrio_max" class="form-control"  type="text">{{$collectionPoint->vidrio_max}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                           <div class="row">
                              <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                                  <label name="plastico_max" class="form-control"  type="text">{{$collectionPoint->plastico_max}}</label>
                                </div>
                              </div>
                            </div>
                           </div>
                    </div>
                 </div>
                 <div class="col-sm-6">
                   <div>
                      <div id="map"  style="width:400px;height:342px"></div>
                    </div><br>
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
          </div>   
   </div>
                     <div class="col-md-6 col-md-offset-8" >
                            <button type="submit" class="btn btn-primary">
                              Eliminar
                            </button>   
                            <a href="{{route('puntos-de-acopio.index')}}" class="btn btn-danger">Cancelar</a>
                      </div><br>

               {{Form::close()}}

      

   
  @stop