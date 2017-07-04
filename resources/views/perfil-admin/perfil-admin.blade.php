@extends('base')
@section('title', 'Perfil')
@section('content')

<div class="perfil-admin"></div>
    <div style="display:block; width:100%"></div>
    <div style="position:relative; z-index:9; text-align:center;">
        <img src="{{ URL::to('/') }}/uploads/avatars/{{Auth::user()->imagen}}" class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="{{ Auth::user()->nombre }} avatar">
        
    </div>
<br><div style="position: relative; left: 300px;">
<div class="container">
          <div class="row">
                 
                 <div class="col-sm-4">
                    <div>
                            <table style="height: 250px">
                                        <tr>
                                            <td>
                                                <label style="width: 150px">Nombre: </label>
                                            </td>
                                            <td>
                                                <label name="nombre" class="form-control" style="width: 380px" type="text">{{Auth::user()->nombre}} {{Auth::user()->apellido}}</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Email: </label>
                                            </td>
                                            <td>
                                                <label name="nombre" class="form-control"  type="text">{{Auth::user()->email}}</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>DNI: </label>
                                            </td>
                                            <td>
                                                <label name="nombre" class="form-control"  type="text">{{Auth::user()->dni}}</label>                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Direccón: </label>
                                            </td>
                                            <td>
                                                <label name="nombre" class="form-control"  type="text">{{Auth::user()->direccion}}</label>         
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Distrito: </label>
                                            </td>
                                            <td>
                                                <label name="nombre" class="form-control"  type="text">{{Auth::user()->distrito}}</label>         
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Fecha de nacimiento: </label>
                                            </td>
                                            <td>
                                                <label name="nombre" class="form-control"  type="text">{{Auth::user()->nacimiento}}</label>         
                                            </td>
                                        </tr>   
                                    </table>
                         </div><br>
                         <div style="position: relative; left: 225px">
                         <a href="{{route('perfil.edit')}}" class="btn btn-primary">Editar Perfil</a>
                         </div>          
                     </div>               
            </div>
</div>
    
       
@stop