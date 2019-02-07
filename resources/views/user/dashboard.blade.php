@extends('layouts.main')

@section('css')
	<style>
	.circulos {
		display: flex;
		justify-content: space-around;
	}
	.mt-5 { margin-top: 20px }
	.circulo {
		width: 200px;
		height: 200px;
		background: linear-gradient(red, #FF9F9F);
		border-radius: 50%;
		margin: 10px 0;
		text-align: center;
		color: white;
	}
	.font-16 { font-size: 16px }
	.circulo h4 { line-height: 60px; text-shadow: 1px 1px 1px #3B3B3B }
	.circulo p { font-size: 27px; text-shadow: 1px 1px 1px #3B3B3B }
	</style>
@stop

@section('content')
	<div class="mdl-grid demo-content">
		<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid circulos">
			<div class="circulo">
				<h4>Productos</h4>
				<p>{{ count($productos) }}</p>
			</div>
			<div class="circulo">
				<h4>Proveedores</h4>
				<p>{{ count($proveedores) }}</p>
			</div>
			<div class="circulo">
				<h4>Ventas</h4>
				<p>{{ count($ventas) }}</p>
			</div>
			{{-- <div class="circulo">
				<h4>Ganancias</h4>
				<p>{{ count($ganancias) }} %</p>
			</div> --}}
		</div>

		<div class=" mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
			<p class="font-16">Filtrar por Fecha</p>
			<input type="date" class="mdl-textfield__input" id="fecha">
		</div>

		<div class=" mdl-cell mdl-cell--12-col mt-5">
			<div class="demo-graphs mdl-shadow--2dp mdl-color--white">
				<div id="line"></div>
			</div>
			<div class="demo-graphs mdl-shadow--2dp mdl-color--white mt">
				<div id="pie"></div>
			</div>
		</div>

	</div>
@stop

@section('js')
	<script>
		var myPieChart = new Chart(ctx,{
		    type: 'pie',
		    data: data,
		    options: options
		});
	</script>
	<script>
		var myLineChart = new Chart(ctx, {
		    type: 'line',
		    data: data,
		    options: options
		});
	</script>
@stop
