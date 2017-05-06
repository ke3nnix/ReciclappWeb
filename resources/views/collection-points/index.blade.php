@extends('base')
@section('title', 'Puntos de acopio')
@section('content')

<div id="page-wrapper" class="col-lg-10">
  
  <div class="col-md-12">
    <div class="row">
      <form action="{{route('collection-points.create')}}">
        <div class="pull-right">
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </form>
      <h3>Puntos de acopio</h3>
    </div>
    
    <div class="row">           
      <div class="table-responsive">

        
        <table id="mytable" class="table table-bordred table-striped">
         
         <thead>
           
          <th>First Name</th>
          <th>Last Name</th>
          <th>Address</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          
          <tr>
            <td>Mohsin</td>
            <td>Irshad</td>
            <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
            
            <td>
              <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
            </td>
            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
          </tr>
          
          <tr>
            <td>Mohsin</td>
            <td>Irshad</td>
            <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
            
            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
          </tr>
          
          
          <tr>
            <td>Mohsin</td>
            <td>Irshad</td>
            <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
            
            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
          </tr>
          
          
          
          <tr>
           <td>Mohsin</td>
           <td>Irshad</td>
           <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
           
           <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
           <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
         </tr>
         
         
         <tr>
          <td>Mohsin</td>
          <td>Irshad</td>
          <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
          
          <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
          <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
        </tr>
        
        
        
        
        
      </tbody>
    </table>

    <ul class="pagination pull-right">
      <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
    </ul>
    
  </div>
  
</div>  
</div>

</div>



@stop

