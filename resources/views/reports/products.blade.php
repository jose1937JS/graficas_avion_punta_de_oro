@extends('layouts.reports')

@section('listado-title', 'Productos')

@section('table-content')
	<table>
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
			@foreach($products as $product)
				<tr>
					<td>{{ $product->name }}</td>
					<td>{{ $product->description }}</td>
					<td>{{ $product->quantity }}</td>
					<td>{{ $product->category->category }}</td>
					<td>{{ $product->price }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop