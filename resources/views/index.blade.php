@extends('base')


@section('title','Panel de control')

@section('content')
	<div class="container">
  <div class="row">
		<div class="col-lg-6">
		{!! $entregasDeLaSemana->render() !!}
		</div>
		<div class="col-lg-6">
		{!! $entregasDelAnho->render() !!}
		</div>
  </div>
  <div class="row">
		<div class="col">
		
		</div>
  </div>
</div>

@endsection