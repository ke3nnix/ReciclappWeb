@extends('base')


@section('title','Panel de control')

@section('content')
	<div class="container">
		{{-- reportes por fecha --}}
		<div class="row">
			<div class="col-lg-12">
				<h3>Reporte de entregas</h3>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				{!! $entregasDeLaSemana->render() !!}
			</div>
			<div class="col-lg-6">
				{!! $entregasDelAnho->render() !!}
			</div>
		</div>
		{{-- fin reportes por fecha --}}

		{{-- reportes por punto de acopio --}}
		<div class="row">
			<div class="col-lg-12">
				<h3>Entregas por punto de acopio</h3>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				{!! $puntoDeAcopioSemana->render() !!}
			</div>
			<div class="col-lg-6">
				{!! $puntoDeAcopioAnho->render() !!}
			</div>
		</div>

	</div>

@endsection