@extends('layouts.main')

@section('header-title', 'Productos')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<div class="mdl-cell mdl-cell--12-col">
			<h4>Productos<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary right mdl-js-ripple-effect" href="{{ route('productos.create') }}"> Añadir producto</a></h4>
		</div>

		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Descripción</th>
					<th>Cantidad</th>
					<th>Categoria</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Banana</td>
					<td>Fruta amarilla dulce</td>
					<td>5</td>
					<td>Frutas</td>
					<td>300 BsS</td>
				</tr>
			</tbody>
		</table>
	</div>

@stop</h4>