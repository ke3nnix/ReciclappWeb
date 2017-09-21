@extends('base')
@section('title', 'Editar Sponsor')
@section('content')

     {{Form::open(['route'=>['sponsors.update',$sponsor->sponsor_id], 'method'=>'PUT'])}}

           {{csrf_field()}}

           <div class="centrado-div">
             <table>
              <tr>
                <td>
                  <div class="group">
                    <input  name="contacto" class="form-control" title="Se necesita un Contacto"  type="text" value="{{$sponsor->contacto}}" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><span class="span-input">Contacto: </span></label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="group">
                    <input name="razon_social" class="form-control" title="Se necesita uan Razón Social" type="text" value="{{$sponsor->razon_social}}" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><span class="span-input">Razón Social: </span></label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="group">
                    <input name="ruc" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita RUC" placeholder="Número de 11 digitos" minlength="11" maxlength="11" size="11"  type="text" value="{{ $sponsor->ruc}}" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label><span class="span-input">RUC: </span></label>
                  </div>
                </td>
              </tr>
               <tr>
                 <td>
                   <div class="group">
                     <input name="direccion" class="form-control" title="Se necesita una Dirección" type="text" value="{{$sponsor->direccion}}" required>
                     <span class="highlight"></span>
                     <span class="bar"></span>
                     <label><span class="span-input">Dirección: </span></label>
                   </div>
                 </td>
               </tr>
                <tr>
                  <td>
                    <div class="group">
                      <input name="distrito" class="form-control" title="Se necesita un Distrito"  type="text" value="{{ $sponsor->distrito}}" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><span class="span-input">Distrito: </span></label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="group">
                      <input name="telefono" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" title="Se necesita un Teléfono"  minlength="7" maxlength="9" size="9"  type="text" value="{{ $sponsor->telefono}}">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label><span class="span-input">Télefono: </span></label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="centrar-btn">
                    <div >
                        <button type="submit" class="btn btn-success">
                          Actualizar
                        </button>
                        <a href="/sponsors?estado=activo" style="background-color: #FC5C5C;color: white" class="btn">Cancelar</a>
                    </div><br>
                  </td>
                </tr>
              </table>
      </div>




      {{Form::close()}}

@stop
