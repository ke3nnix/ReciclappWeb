@extends('base')
@section('title', 'Agregar')
@section('content')
   
     {{Form::open(['route'=>'usuarios.store', 'method'=>'post'])}}
<div class="centrado-div">

           {{csrf_field()}}
      <div class="col-sm-5">
        <table>
         <tr>
           <td>
             <div class="group">
              <input  name="nombre" class="form-control" title="Se necesita un Nombre"  type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label><span class="span-input">Nombre </span></label>
            </div>
           </td>
          </tr>
          <tr>
           <td>
             <div class="group">
              <input name="apellido" class="form-control" title="Se necesita un Apellido" type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label><span class="span-input">Apellido </span></label>
            </div>
           </td>
        </tr>
        <tr>
         <td>
           <div class="group">
            <input name="email" class="form-control" title="example@example.com" type="email" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label><span class="span-input">Email </span></label>
          </div>

         </td>
        </tr>
        <tr>
          <td>
            <div class="group">                                
              <input name="password" class="form-control" title="Se necesita una contraseña"  type="password" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label><span class="span-input">Contraseña</span></label>
            </div>
          </td>
        </tr>
        <tr>
         <td>
           <div class="group">
             <input name="dni" class="form-control"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita DNI" minlength="8" maxlength="8" size="8" type="text" required>
             <span class="highlight"></span>
             <span class="bar"></span>
             <label><span class="span-input">DNI </span></label>
           </div>
         </td>
       </tr>
      </table>
    </div>

    <div class="col-sm-5">
      <br>
      <table>
       <tr>
         <td>
           <div class="group">
             <input name="direccion" class="form-control" title="Se necesita una Dirección" type="text" required>
             <span class="highlight"></span>
             <span class="bar"></span>
             <label><span class="span-input">Dirección </span></label>
           </div>
         </td>
       </tr>
       <tr>
         <td>
           <div class="group">
             <input name="distrito" class="form-control" title="Se necesita un Distrito" type="text" required>
             <span class="highlight"></span>
             <span class="bar"></span>
             <label><span class="span-input">Distrito </span></label>
           </div>
         </td>
       </tr>
        <tr>
         <td>
           <label><span class="span-input">Tipo </span></label>
           <div class="group">
             <select name="tipo" class="form-control" required>
                      <option value="0" selected="">--Seleccionar--</option>
                      <option value="3" >Adminsitrador</option>
                      <option value="2">Empleado</option>
              </select>
             <span class="highlight"></span>
             <span class="bar"></span>
           </div>

         </td>
       </tr>
       <tr>
         <td>
          <label><span class="span-input">Fecha de Nacimiento </span></label>
           <div class="group">
             <input name="nacimiento" class="form-control"  type="date" required>
             <span class="highlight"></span>
             <span class="bar"></span>
             
           </div>
         </td>
       </tr>
       <tr>
         <td>
           <div style="text-align:right;">
                <div class="col-md-6 col-md-offset-9">
                    <button type="submit" class="btn btn-success">
                      Agregar
                    </button>
                     <a href="/usuarios?tipo=administradores&estado=activo" style="background-color: #FC5C5C;color: white" class="btn">Cancelar</a>

                  </div>
             </div>
         </td>
       </tr>
      </table>
   
      </div>                
            
             
           

</div>
     {{Form::close()}}


@stop