@extends('base')
@section('title', 'Editar perfil')
@section('content')
	{{Form::open(['route'=>['usuarios.update',Auth::user()->usuario_id], 'method'=>'PUT'])}}
                            <div style="position: relative;right: -100px">
               <div class="row">
                 <div class="form-group">
                  <label  class="col-md-4 control-label">Nombre</label>  
                  <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"></span>
                      <input  name="nombre" class="form-control"  type="text" title="Se necesita un Nombre" value="{{Auth::user()->nombre}}" required>
                    </div>
                  </div>
                </div>
              </div> <br>
                   <div class="row">
                     <div class="form-group">
                      <label class="col-md-4 control-label">Apellido</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="apellido" class="form-control" type="text" title="Se necesita un Apellido" value="{{Auth::user()->apellido}}" required>
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                     <div class="form-group">
                      <label class="col-md-4 control-label">Email</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="email" class="form-control"  type="text" value="{{ Auth::user()->email}}" required>
                        </div>
                      </div>
                    </div>
                   </div><br>

                   <div class="row">
                    <div class="form-group">
                    <label class="col-md-4 control-label">Contraseña</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="password" class="form-control" minlength="6" maxlength="255" size="255"  type="password" required>
                        </div>
                      </div>
                    </div>
                   </div><br>
                  <div class="row">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Tipo</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <select name="tipo" class="form-control" required>
                            @if(Auth::user()->tipo==3)
                              <option value="0">--Seleccionar--</option>
                              <option value="3" selected>Adminsitrador</option>
                              <option value="2">Empleado</option>
                            @endif
                            @if(Auth::user()->tipo==2)
                              <option value="0">--Seleccionar--</option>
                              <option value="3">Administrador</option>
                              <option value="2" selected>Empleado</option>
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">DNI</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="dni" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita DNI" placeholder="Número de 8 dígitos" minlength="8" maxlength="8" size="8"  type="text" value="{{ Auth::user()->dni}}">
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">Dirección</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="direccion" class="form-control" title="Se necesita una Dirección" type="text" value="{{ Auth::user()->direccion}}" required>
                        </div>
                      </div>
                    </div>
                   </div><br><div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">Distrito</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="distrito" class="form-control" title="Se necesita una Distrito" type="text" value="{{ Auth::user()->distrito}}" required>
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">Fecha de Nacimiento</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="nacimiento" class="form-control"  type="date" value="{{ Auth::user()->nacimiento}}" required>
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">Fecha de Nacimiento</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="imagen" type="file" />

                        </div>
                      </div>
                    </div>
                   </div><br>              
                   <div class="col-md-6 col-md-offset-9" >
                    <button type="submit" class="btn btn-success">
                      Guardar
                    </button>   
                    <a href="{{route('perfil.edit')}}" style="background-color: #FC5C5C;color: white" class="btn">Cancelar</a>
                </div><br>                       
      </div>

@stop