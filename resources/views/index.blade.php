@extends('base')


@section('title','Panel de control')

@section('content')
	<div class="container">
		{{-- reportes por fecha --}}
		<div class="row">
			<div class="col-lg-12">
				<h3>Reporte de entregas por fecha</h3>
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

		{{-- reportes secundarios --}}
		<div class="row">
			<div class="col-lg-6">
				{{-- reporte de entregas por punto de acopio --}}
				<div class="row">
					<h3>Entregas por punto de acopio</h3>
				</div>
				<div class="row">
					{!! $puntoDeAcopioAnho->render() !!}
				</div>
				{{-- fin reporte de entregas por punto de acopio --}}
			</div>

			<div class="col-lg-6">
				{{-- beneficios reclamados --}}
				<div class="row">
					<h3>Beneficios reclamados</h3>
				</div>
				<div class="row">
					{!! $beneficiosAnho->render() !!}
				</div>
				{{-- fin de beneficios reclamados --}}
			</div>
		</div>
		{{-- fin reportes secundarios --}}
	</div>

@endsection