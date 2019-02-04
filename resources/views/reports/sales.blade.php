@extends('layouts.reports')

@section('listado-title', 'Ventas')

@section('table-content')
	<table>
		<thead>
			<tr>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Precio Total</th>
			</tr>
		</thead>
		<tbody>
		@foreach($sales as $sale)
			<tr>
				<td>{{ $sale->product->name }}</td>
				<td>{{ $sale->quantity }}</td>
				<td>{{ $sale->total_price }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@stop