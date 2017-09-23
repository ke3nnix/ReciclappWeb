 <div class="col-sm-5">
    <div class="text-center">
        <b>Sponsor</b>
    </div><br>
    <table style="height: 300px">
      <tr>
        <td>
          <label class="input-group" style="width: 130px">Contacto: </label>
        </td>
        <td>
          <label style="border:none" name="contacto" class="form-control"  type="text">{{$sponsor->contacto}}</label>
        </td>
      </tr>
      <tr>
        <td>
          <label class="input-group">Razón Social: </label>
        </td>
        <td>
          <label style="border:none" name="razon_social" class="form-control" type="text">{{$sponsor->razon_social}}</label>
        </td>
      </tr>
      <tr>
        <td>
          <label class="input-group">RUC: </label>
        </td>
        <td>
          <label style="border:none" name="ruc" class="form-control"  type="text">{{$sponsor->ruc}}</label>
        </td>
      </tr>
      <tr>
        <td>
          <label class="input-group">Dirección: </label>
        </td>
        <td>
          <label style="border:none" name="direccion" class="form-control cortar-direcc"  type="text">{{$sponsor->direccion}}</label>
        </td>
      </tr>
      <tr>
        <td>
          <label class="input-group">Distrito: </label>
        </td>
        <td>
          <label style="border:none" name="distrito" class="form-control"  type="text">{{$sponsor->distrito}}</label>
        </td>
      </tr>
      <tr>
        <td>
          <label class="input-group">Teléfono: </label>

        </td>
        <td>
          <label style="border:none" name="telefono" class="form-control"  type="text">{{$sponsor->telefono}}</label>
        </td>
      </tr>
    </table>

</div>
