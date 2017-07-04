@extends('base')
@section('title','Reportes')
@section('content')

	<div class="container">
		<div class="container row">
            <div class="col-md-12"> {!! $papelbar->render() !!} </div>
        </div>

        <div class="container row">
            <div class="col-md-12"> {!! $vidriobar->render() !!} </div>
        </div>

        <div class="container row">
            <div class="col-md-12"> {!! $plasticobar->render() !!} </div>
        </div>
	</div>

@endsection