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
                      <input  name="contacto" class="form-control"  type="text" value="{{$sponsor->contacto}}">
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
                          <input name="razon_social" class="form-control" type="text" value="{{$sponsor->razon_social}}">
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
                          <input name="ruc" class="form-control"  type="text" value="{{ $sponsor->ruc}}">
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
                          <input name="direccion" class="form-control"  type="text" value="{{$sponsor->direccion}}">
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
                          <input name="distrito" class="form-control"  type="text" value="{{ $sponsor->distrito}}">
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
                          <input name="telefono" class="form-control"  type="text" value="{{ $sponsor->telefono}}">
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