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
			<!-- <div class="circulo">
				<h4>Ganancias</h4>
				<p>{{ count($ganancias) }} %</p>
			</div> -->
		</div>

		<div class=" mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
			<p class="font-16">Filtrar por Fecha</p>
			<input type="date" class="mdl-textfield__input" id="fecha">
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mt-5" id="fechabtn">Filtrar</button>
		</div>

		<div class=" mdl-cell mdl-cell--12-col">
			<div class="chart-container mdl-shadow--2dp mdl-color--white">
				<div class="demo-graphs">
					<canvas id="piechart" width="400px" height="400px"></canvas>
				</div>
				<br>
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="piebtn">Download PNG file</button>
			</div>
			<!--<div class="chart-container mdl-shadow--2dp mdl-color--white mt-5">
				<div class="demo-graphs">
					<canvas id="pie" width="400px" height="400px"></canvas>
					<br><br>
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="piebtn">Download PNG file</button>
				</div>
			</div> -->
		</div>

	</div>
@stop

@section('js')
	<script>

		function chart(d = []) {

			$.ajax({
				url : 'http://127.0.0.1:8000/weekly_sales',
			})

			.done((data) => {

				console.log(data)

				let labels = [],
					daata  = [],
					kolors = [],
					date   = new Date(),
					fecha  = $('#fecha').val(),
					colors = ['red', 'blue', 'darkorange', 'purple','green', 'chocolate', 'snow', 'deepskyblue','pink', 'yellow','grey', 'cyan', 'lime', 'cornflowerblue', 'deeppink', 'black', 'teal','midnightblue'];

				if ( data.length ) {
					for ( let i = 0; i < data.length; i++ ){
						labels.push(data[i].category)
						daata.push(data[i].sales)
						kolors.push(colors[i])
					}
				}
				else if( d.length ) {
					for ( let i = 0; i < d.length; i++ ){
						labels.push(d[i].category)
						daata.push(d[i].sales)
						kolors.push(colors[i])
					}
				}
				else {
					daata = [1],
					labels = ['No hay datos para mostrar']
				}


				// Para mostrar la fecha de hoy en elgrafico cuadnose carsga por primera vez
				if ( fecha == '' ){
					fecha = `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`
				}

				let ctx = document.getElementById('piechart').getContext('2d');
				let pie = new Chart(ctx, {
					type: 'pie',
					data: {
						datasets: [{
							data: daata,
							backgroundColor: kolors,
							label: 'Cantidad expresadas en Kilogramos'
						}],
						labels: labels
					},
					options: {
						responsive: true,
						title : {
							display: true,
							fontSize: '20',
							text : `Cantidad de productos vendidos por categoria en una semana desde ${fecha}`
						}
					}
				})

			})

			.fail(e => {
				console.error(e)
			})
		}

		chart()

		$('#fechabtn').click(() => {

			$.ajax({
				url : 'http://127.0.0.1:8000/weekly_sales',
				data: { from : $('#fecha').val() }
			})

			.done((data) => {

				chart(data)
				console.log('dinamic date:')
				console.log(data)

			})

			.fail(e => {
				alert(e)
			})

		})


		$('#piebtn').click(() => {
			$('#piechart').get(0).toBlob((blob) => {
				saveAs(blob, 'chart_pie.png')
			})
		})

	</script>















	{{-- <script>
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
	</script> --}}
@stop