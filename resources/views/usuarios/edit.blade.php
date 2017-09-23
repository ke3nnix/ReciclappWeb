@extends('base')
@section('title', 'Editar usuario')
@section('content')
   
     {{Form::open(['route'=>['usuarios.update',$user->usuario_id], 'method'=>'PUT'])}}
       
           {{csrf_field()}}
<div class="centrado-div">
  <div class="col-sm-5">
      <table>
         <tr>
           <td>
             <div class="group">
              <input  name="nombre" class="form-control"  type="text" title="Se necesita un Nombre" value="{{$user->nombre}}" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label><span class="span-input">Nombre </span></label>
            </div>
           </td>
          </tr>
          <tr>
           <td>
             <div class="group">
              <input name="apellido" class="form-control" type="text" title="Se necesita un Apellido" value="{{$user->apellido}}" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label><span class="span-input">Apellido </span></label>
            </div>
           </td>
        </tr>
        <tr>
         <td>
           <div class="group">
            <input name="email" class="form-control" title="example@example.com"  type="text" value="{{ $user->email}}" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label><span class="span-input">Email </span></label>
          </div>

         </td>
        </tr>
        <tr>
          <td>
            <div class="group">                                
              <input name="password" class="form-control" minlength="6" maxlength="255" size="255"  type="password" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label><span class="span-input">Contraseña</span></label>
            </div>
          </td>
        </tr>
        <tr>
         <td>
           <div class="group">
             <input name="dni" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita DNI" placeholder="Número de 8 dígitos" minlength="8" maxlength="8" size="8"  type="text" value="{{ $user->dni}}">
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
             <input name="direccion" class="form-control" title="Se necesita una Dirección" type="text" value="{{ $user->direccion}}" required>
             <span class="highlight"></span>
             <span class="bar"></span>
             <label><span class="span-input">Dirección </span></label>
           </div>
         </td>
       </tr>
       <tr>
         <td>
           <div class="group">
             <input name="distrito" class="form-control" title="Se necesita una Distrito" type="text" value="{{ $user->distrito}}" required>
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
                  @if($user->tipo==3)
                  <option value="0">--Seleccionar--</option>
                  <option value="3" selected>Adminsitrador</option>
                  <option value="2">Empleado</option>
                  @endif
                  @if($user->tipo==2)
                  <option value="0">--Seleccionar--</option>
                  <option value="3">Administrador</option>
                  <option value="2" selected>Empleado</option>
                  @endif
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
             <input name="nacimiento" class="form-control"  type="date" value="{{ $user->nacimiento}}" required>
             <span class="highlight"></span>
             <span class="bar"></span>
             
           </div>
         </td>
       </tr>
       <tr>
         <td>
           <div style="text-align:right;">
                    <button type="submit" class="btn btn-success">
                      Actualizar
                    </button>   
                    <a href="/usuarios?tipo=administradores&estado=activo" style="background-color: #FC5C5C;color: white" class="btn">Cancelar</a>
            </div>
         </td>
       </tr>
      </table>                         
  </div>
</div>
            
            
                
        
    
      {{Form::close()}}
         
@stop