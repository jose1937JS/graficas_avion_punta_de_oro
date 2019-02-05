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
			<div class="demo-graphs mdl-shadow--2dp mdl-color--white">
				<div id="line"></div>
			</div>
			<div class="demo-graphs mdl-shadow--2dp mdl-color--white mt">
				<div id="pie"></div>
			</div>
		</div>

		{{-- <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell---col-tablet mdl-grid mdl-grid--no-spacing">
			<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
				<div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
					<h2 class="mdl-card__title-text">Updates</h2>
				</div>
				<div class="mdl-card__supporting-text mdl-color-text--grey-600">
					Non dolore elit adipisicing ea reprehenderit consectetur culpa.
				</div>
				<div class="mdl-card__actions mdl-card--border">
					<a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a>
				</div>
			</div>
			<div class="demo-separator mdl-cell--1-col"></div>
			<div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
				<div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
					<h3>Recordatorio</h3>
					<ul>
						<li>
							<label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
								<input type="checkbox" id="chkbox1" class="mdl-checkbox__input">
								<span class="mdl-checkbox__label">Click per object</span>
							</label>
						</li>
						<li>
							<label for="chkbox2" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
								<input type="checkbox" id="chkbox2" class="mdl-checkbox__input">
								<span class="mdl-checkbox__label">Views per object</span>
							</label>
						</li>
						<li>
							<label for="chkbox3" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
								<input type="checkbox" id="chkbox3" class="mdl-checkbox__input">
								<span class="mdl-checkbox__label">Objects selected</span>
							</label>
						</li>
						<li>
							<label for="chkbox4" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
								<input type="checkbox" id="chkbox4" class="mdl-checkbox__input">
								<span class="mdl-checkbox__label">Objects viewed</span>
							</label>
						</li>
					</ul>
				</div>
				<div class="mdl-card__actions mdl-card--border">
					<a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Change location</a>
					<div class="mdl-layout-spacer"></div>
					<i class="material-icons">location_on</i>
				</div>
			</div>
		</div> --}}
	</div>
@stop

@section('js')
	{{-- <script>
		document.addEventListener('DOMContentLoaded', function () {
			Highcharts.setOptions({
			    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
			        return {
			            radialGradient: {
			                cx: 0.5,
			                cy: 0.3,
			                r: 0.7
			            },
			            stops: [
			                [0, color],
			                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
			            ]
			        };
			    })
			});
			Highcharts.chart('pie', {
			    chart: {
			        plotBackgroundColor: null,
			        plotBorderWidth: null,
			        plotShadow: false,
			        type: 'pie'
			    },
			    title: {
			        text: 'Ganancias en base a las categorias'
			    },
			    tooltip: {
			        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    plotOptions: {
			        pie: {
			            allowPointSelect: true,
			            cursor: 'pointer',
			            dataLabels: {
			                enabled: true,
			                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
			                style: {
			                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
			                },
			                connectorColor: 'silver'
			            }
			        }
			    },
			    series: [{
			        name: 'Share',
			        data: [
			            { name: 'Carnes', y: 58.41 },
			            { name: 'Lacteos', y: 14.84 },
			            { name: 'Embutidos', y: 10.85 },
			            { name: 'Quesos', y: 4.67 },
			            { name: 'Otros', y: 7.05 }
			        ]
			    }]
			});
		});
	</script> --}}
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			Highcharts.chart('line', {

			    title: {
			        text: 'Productos vendidos en la semana'
			    },

			    subtitle: {
			        text: 'Charcuteria El Avión de Punta de Oro'
			    },

			    yAxis: {
			        title: {
			            text: 'Cantidad de ventas'
			        }
			    },
			    legend: {
			        layout: 'vertical',
			        align: 'right',
			        verticalAlign: 'middle'
			    },

			    plotOptions: {
			        series: {
			            label: {
			                connectorAllowed: false
			            },
			            pointStart: 1
			        }
			    },

			    series: [{
			        name: 'Carnes',
			        data: {{ json_encode([7, 5, 9, 5, 3, 5, 6]) }}
			    }, {
			        name: 'Embutidos',
			        data: {{ json_encode([23, 29, 30, 28, 20, 18, 26]) }}
			    }, {
			        name: 'Lacteos',
			        data: {{ json_encode([2, 3, 1, 8, 5, 2, 3]) }}
			    }, {
			        name: 'Quesos',
			        data: {{ json_encode([10, 8, 11, 13, 11, 7, 8]) }}
			    }, {
			        name: 'Otros',
			        data:{{ json_encode([20, 25, 27, 21, 17, 21, 20]) }}
			    }],

			    responsive: {
			        rules: [{
			            condition: {
			                maxWidth: 500
			            },
			            chartOptions: {
			                legend: {
			                    layout: 'horizontal',
			                    align: 'center',
			                    verticalAlign: 'bottom'
			                }
			            }
			        }]
			    }

			});
		});
	</script>
@stop
