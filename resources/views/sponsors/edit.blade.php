@extends('base')
@section('title', 'Editar Sponsor')
@section('content')
   
     {{Form::open(['route'=>['sponsors.update',$sponsor->sponsor_id], 'method'=>'PUT'])}}
       
           {{csrf_field()}}

           <div style="position: relative;right: -100px">
                <div class="row">
                 <div class="form-group">
                  <label  class="col-md-4 control-label">Contacto</label>  
                  <div class="col-md-6 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"></span>
                      <input  name="contacto" class="form-control" title="Se necesita un Contacto"  type="text" value="{{$sponsor->contacto}}" required>
                    </div>
                  </div>
                </div>
              </div> <br>
                   <div class="row">
                     <div class="form-group">
                      <label class="col-md-4 control-label">Razón Social</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="razon_social" class="form-control" title="Se necesita uan Razón Social" type="text" value="{{$sponsor->razon_social}}" required>
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                     <div class="form-group">
                      <label class="col-md-4 control-label">RUC</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="ruc" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita RUC" placeholder="Número de 11 digitos" minlength="11" maxlength="11" size="11"  type="text" value="{{ $sponsor->ruc}}" required>
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
                          <input name="direccion" class="form-control" title="Se necesita una Dirección" type="text" value="{{$sponsor->direccion}}" required>
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
                          <input name="distrito" class="form-control" title="Se necesita un Distrito"  type="text" value="{{ $sponsor->distrito}}" required>
                        </div>
                      </div>
                    </div>
                   </div><br>
                   <div class="row">
                      <div class="form-group">
                    <label class="col-md-4 control-label">Télefono</label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="input-group">
                          <span class="input-group-addon"></span>
                          <input name="telefono" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita un Teléfono"  minlength="7" maxlength="9" size="9"  type="text" value="{{ $sponsor->telefono}}">
                        </div>
                      </div>
                    </div>
                   </div><br>            
      </div>
            
            
                <div class="col-md-6 col-md-offset-9" >
                    <button type="submit" class="btn btn-success">
                      Actualizar
                    </button>   
                    <a href="/sponsors?estado=activo" style="background-color: #FC5C5C;color: white" class="btn">Cancelar</a>
                </div><br>
        
      {{Form::close()}}
         
@stop