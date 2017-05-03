@extends('base')
@section('title', 'Detalle de punto de acopio')
@section('content')

<div class="row">
  <div class="row">
    <div class="col-md-12">
          <div class="row">
                <label class="col-md-4 control-label">Nombre</label>
                  <div class="col-md-6">
                    <label class="col-md-4 control-label"><p>{{$collectionPoint->nombre}}</p></label>
                  </div>
            </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Dirección</label>
                  <div class="col-md-6">
                    <label class="col-md-4 control-label"><p> {{$collectionPoint->direccion}}</p></label>
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Distrito</label>
                  <div class="col-md-6">
                    <label class="col-md-4 control-label"><p> {{$collectionPoint->distrito}}</p></label>
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Papel maximo</label>
                  <div class="col-md-6">
                    <label class="col-md-4 control-label"> <p> {{$collectionPoint->papel_max}}</p></label>
                  </div>
             </div><br>
            <div class="row">
                <label class="col-md-4 control-label">Vidrio maximo</label>
                  <div class="col-md-6">
                    <label class="col-md-4 control-label"> <p> {{$collectionPoint->vidrio_max}}</p></label>
                  </div>
             </div><br>
             <div class="row">
                <label class="col-md-4 control-label">Plástico maximo</label>
                  <div class="col-md-6">
                    <label class="col-md-4 control-label"><p> {{$collectionPoint->plastico_max}}</p></label>
                  </div>
             </div><br>


    


      


      


     


     


      

    </div>
  </div>

  @stop