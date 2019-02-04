@extends('layouts.reports')

@section('listado-title', 'Proveedores')

@section('table-content')
	<table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Dirección</th>
				<th>E-mail</th>
				<th>Teléfono</th>
				<th>RIF</th>
			</tr>
		</thead>
		<tbody>
			@foreach($proveedores as $proveedor)
				<tr>
					<td>{{ $proveedor->name }}</td>
					<td>{{ $proveedor->address }}</td>
					<td>{{ $proveedor->email }}</td>
					<td>{{ $proveedor->phone }}</td>
					<td>{{ $proveedor->rif }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop