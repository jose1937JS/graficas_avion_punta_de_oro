@extends('layouts.main')

@section('header-title', 'Ventas')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<div class="mdl-cell mdl-cell--12-col">
			<h4>Ventas<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary right mdl-js-ripple-effect" href="{{ route('ventas.create') }}"> Registrar venta</a></h4>
		</div>

		@include('includes.message')

		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio Total</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			@foreach($sales as $sale)
				<tr>
					<td>{{ $sale->product->name }}</td>
					<td>{{ $sale->quantity }}</td>
					<td>{{ $sale->total_price }}</td>
					<td>
						<a href="{{ route('ventas.edit', $sale->id) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
						  <i class="material-icons">edit</i>
						</a>
						<a href="{{ route('ventas.destroy', $sale->id) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" onclick="event.preventDefault(); alert('¿Seguro que desea eliminar este registro?'); document.getElementById('delete-form').submit();">
						  <i class="material-icons">delete</i>
						</a>

						<form id="delete-form" action="{{ route('ventas.destroy', $sale->id) }}" method="POST" style="display: none;">
							{{ method_field('DELETE') }}
	            			@csrf
	          			</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>

@stop</h4>