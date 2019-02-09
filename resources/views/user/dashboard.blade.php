@extends('layouts.main')

@section('css')
	<style>
	.circulos {
		display: flex;
		justify-content: space-around;
	}
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
	.mt-5 { margin-top: 15px }
	.demo-graphs { position: relative; width:70%;  }
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

		<div class=" mdl-cell mdl-cell--12-col">
			<div class="chart-container mdl-shadow--2dp mdl-color--white">
				<div class="demo-graphs">
					<canvas id="line" width="400px" height="400px"></canvas>
					<br><br>
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="linebtn">Download PNG file</button>
				</div>
			</div>
			<div class="chart-container mdl-shadow--2dp mdl-color--white mt-5">
				<div class="demo-graphs">
					<canvas id="pie" width="400px" height="400px"></canvas>
					<br><br>
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="piebtn">Download PNG file</button>
				</div>
			</div>
		</div>

	</div>
@stop

@section('js')
	<script>
		$.ajax({
			url : 'http://127.0.0.1:8000/weekly_sales?from=2019-02-07'
		})

		.done((data) => {

			var ctx = document.getElementById("line").getContext("2d");
			var result = [];

			for (var i = 0; i <= data.length; i++)
			{
				result[i] = data[i]['quantity'];
			}
			console.log(result);

			var chartLine = new Chart(ctx, {
				type : 'line',
				data : {
					labels: data,
					datasets: [{
						data: data,
						label: 'something',
					}],
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					},
					title: {
			            display: true,
			            text: 'Cantidad de ventas por categorias'
			        }
				}
			})

			$('#linebtn').click(() => {
				$('#line').get(0).toBlob((blob) => {
					saveAs(blob, 'chart_line.png')
				})
			})
		})

		.fail(e => {
			alert(e)
		})
	</script>
	<script>
		$.ajax({
			url: 'http://127.0.0.1:8000/weekly_sales',

		})

		.done((data) => {

			var ctx = document.getElementById("pie").getContext("2d");
			var myPieChart = new Chart(ctx,{
			    type: 'pie',
			    data: {
					datasets: [{
						data: data,
						backgroundColor: ['red', 'yellow', 'blue', 'black', 'purple', 'green', 'orange'],
					}],
					labels: [
						'Lunes',
						'Martes',
						'Miercoles',
						'Jueves',
						'Viernes',
						'Sabado',
						'Domingo',
					],
			    },
			    options: {
			    	title: {
			            display: true,
			            text: 'Ganancias a lo largo de la semana'
			        }
			    }
			});

			$('#piebtn').click(() => {
				$('#pie').get(0).toBlob((blob) => {
					saveAs(blob, 'chart_pie.png')
				})
			})
		})

		.fail(e => {
			alert(e)
		})
	</script>
@stop