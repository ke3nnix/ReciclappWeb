@extends('base')
@section('title', 'Agregar punto de acopio')
@section('content')
   <form action="{{route('collection-points.store')}}" method="POST">
       <div>
           {{csrf_field()}}
            @include('collection-points.partials._inputs')

             <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      Agregar
                    </button>
                  </div>
          
             </div>
           
        </div>
                
   </form>                      
    

@stop