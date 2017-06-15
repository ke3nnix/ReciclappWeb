@extends('base')
@section('title', 'Detalle de Sponsor')
@section('content')

{{Form::open(['route'=>['sponsors.destroy',$sponsor->sponsor_id], 'method'=>'DELETE'])}}
  <div class="container">
          <div class="row">
                 
                 <div class="col-sm-5">
                    <div class="well">
                          <div class="row">
                                 <div class="form-group">
                                  <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <label name="contacto" class="form-control"  type="text">{{$sponsor->contacto}}</label>
                                    </div>
                                  </div>
                                </div>
                          </div><br>

                          <div class="row">
                             <div class="form-group">  
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                  <label name="razon_social" class="form-control" type="text">{{$sponsor->razon_social}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                           <div class="row">
                             <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                  <label name="ruc" class="form-control"  type="text">{{$sponsor->ruc}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>

                           <div class="row">
                            <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                  <label name="direccion" class="form-control"  type="text">{{$sponsor->direccion}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                          <div class="row">
                          <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-fire"></i></span>
                                  <label name="distrito" class="form-control"  type="text">{{$sponsor->distrito}}</label>
                                </div>
                              </div>
                            </div>
                           </div><br>
                          <div class="row">
                              <div class="form-group">
                              <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-retweet"></i></span>
                                  <label name="telefono" class="form-control"  type="text">{{$sponsor->telefono}}</label>
                                </div>
                              </div>
                            </div>
                          </div><br>
                    </div>
                 </div>

                 <div class="col-sm-6">
                   <div>
                      <div id="map" class="well" style="width:400px;height:342px">
                          <div class="text-center" >
                            <b>Beneficios</b>
                          </div><br>
                          <div>
                            <table>
                              <tr>
                                <td>
                                  <div class="row">
                                   <div class="form-group">
                                    <div class="col-md-12 inputGroupContainer">
                                      <div class="input-group">
                                        <label name="nombre" class="form-control" style="height: 36px; width: 310px"  type="text">Producto 30</label>
                                        <span class="input-group-addon"><a class="glyphicon glyphicon-remove btn btn-danger btn-xs"></a></span>
                                      </div>
                                    </div>
                                  </div>
                                </div><br>
                                </td>
                                
                              </tr>
                            </table>
                            <div class="text-center" >
                                <a  data-toggle="modal" data-target="#myModal{{$sponsor->sponsor_id}}" class="btn btn-success btn-xs " >Añadir <span class="glyphicon glyphicon-plus"></span></a>
                            </div>
                          </div>
                      </div>
                       <div id="myModal{{$sponsor->sponsor_id}}" class="modal fade" role="dialog"> 
                          <div class="modal-dialog ">
                            <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Agregar Beneficio</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Nombre</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                                          <input  name="contacto" class="form-control"  type="text">
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>
                                  <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Descripcion</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-align-left"></i></span>
                                          <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>
                                  <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Puntaje Requerido</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i></span>
                                          <input  name="contacto" class="form-control"  type="number">
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>
                                  <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Tipo</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                                          <input  name="contacto" class="form-control"  type="text">
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>
                                  <div class="row">
                                     <div class="form-group">
                                      <label  class="col-md-4 control-label">Stock</label>  
                                      <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-warning-sign"></i></span>
                                          <input  name="contacto" class="form-control"  type="number">
                                        </div>
                                      </div>
                                    </div>
                                  </div> <br>                                    
                                  </div>

                                  <div class="modal-footer">

                                        <button type="submit" class="btn btn-success">Añadir</button>

                                        
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                  </div>
                                </div>
                          </div>
                       </div>
                    </div><br>
                 </div>
          </div>   
   </div>
                     <div class="col-md-6 col-md-offset-8" >
                            <button type="submit" class="btn btn-warning">
                              Eliminar
                            </button>   
                            <a href="{{route('sponsors.index')}}" class="btn btn-danger">Cancelar</a>
                      </div><br>
                      <!-- latitud y longitud-->
                      <!--div class="row">
                      <div class="form-group">
                        <div class="col-md-12 inputGroupContainer">
                          <div class="input-group">
                           
                            <input id="latitudScript" name="latitud" class="form-control"  type="text" value="#"  style="visibility:hidden"/>
                          </div>
                        </div>
                      </div>
                    </div><br>

                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-12 inputGroupContainer">
                          <div class="input-group">
                            <input id="longitudScript" name="longitud" class="form-control"  type="text" value="#"  style="visibility:hidden"/>
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
                    -->


               {{Form::close()}}

      

   
  @stop