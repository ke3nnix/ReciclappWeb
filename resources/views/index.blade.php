@extends('base')


@section('title','Panel de control')

@section('content')
	<div class="container">
		{{-- reportes por fecha --}}
		<div class="row">
			<div class="container">
				<h3>Reporte de entregas por fecha</h3>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="container col-lg-6">
				{!! $entregasDeLaSemana->render() !!}
			</div>
			<div class="container col-lg-6">
				{!! $entregasDelAnho->render() !!}
			</div>
		</div>
		{{-- fin reportes por fecha --}}

		{{-- reportes por peso --}}
		<div class="row">
			<div class="container">
				<h3>Peso de las entregas</h3>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="container col-lg-6">
				{!! $pesoDeLaSemana->render() !!}
			</div>
			<div class="container col-lg-6">
				{!! $pesoAnho->render() !!}
			</div>
		</div>
		{{-- fin reportes por peso --}}

		{{-- reportes secundarios --}}
		<div class="row">
			<div class="container col-lg-6">
				{{-- reporte de entregas por punto de acopio --}}
				<div class="container">
					<h3>Entregas por punto de acopio</h3>
					<hr>
				</div>
				<div class="container">
					{!! $puntoDeAcopioAnho->render() !!}
				</div>
				{{-- fin reporte de entregas por punto de acopio --}}
			</div>

			<div class="container col-lg-6">
				{{-- beneficios reclamados --}}
				<div class="col-lg-12">
					<h3>Beneficios reclamados</h3>
					<hr>
				</div>
				<div class="col-lg-12">
					{!! $beneficiosAnho->render() !!}
				</div>
				{{-- fin de beneficios reclamados --}}
			</div>
		</div>
		{{-- fin reportes secundarios --}}
	</div>

@endsection