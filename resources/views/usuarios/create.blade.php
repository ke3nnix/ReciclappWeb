@extends('base')
@section('title', 'Agregar')
@section('content')
   
     {{Form::open(['route'=>'usuarios.store', 'method'=>'post'])}}

       <div>
           {{csrf_field()}}
      <div style="position: relative;right: -100px">
          <div class="row">
           <div class="form-group">
            <label  class="col-md-4 control-label">Nombre</label>  
            <div class="col-md-6 inputGroupContainer">
              <div class="input-group">
                <span class="input-group-addon"></i></span>
                <input  name="nombre" class="form-control" title="Se necesita un Nombre"  type="text" required>
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
                    <input name="apellido" class="form-control" title="Se necesita un Apellido" type="text" required>
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
                    <input name="email" class="form-control"  type="email" required>
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
                    <input name="password" class="form-control"  type="password" required>
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
                      <option value="0" selected="">--Seleccionar--</option>
                      <option value="3" >Adminsitrador</option>
                      <option value="2">Empleado</option>
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
                    <input name="dni" class="form-control"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita RUC" placeholder="Número de 8 dígitos" minlength="8" maxlength="8" size="8" type="text" required>
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
                    <input name="direccion" class="form-control" title="Se necesita una Dirección" type="text" required>
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
                    <input name="distrito" class="form-control" title="Se necesita un Distrito" type="text" required>
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
                    <input name="nacimiento" class="form-control"  type="date" required>
                  </div>
                </div>
              </div>
             </div>         
      </div>                
            
             <div class="row"  style="margin-left: 10px;">
                <div class="col-md-6 col-md-offset-9">
                    <button type="submit" class="btn btn-success">
                      Agregar
                    </button>
                     <a href="/usuarios?tipo=administradores&estado=activo" style="background-color: #FC5C5C;color: white" class="btn">Cancelar</a>

                  </div>
             </div>
           

        </div>
     {{Form::close()}}


@stop