@extends('layouts.main')

@section('header-title', 'Proveedores')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<div class="mdl-cell mdl-cell--12-col">
			<h4>Proveedores<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary right mdl-js-ripple-effect" href="{{ route('proveedores.create') }}"> Registrar proveedor</a></h4>
		</div>

		@include('includes.message')

		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col" id="myTable">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>E-mail</th>
					<th>Teléfono</th>
					<th>RIF</th>
					<th>Acciones</th>
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
						<td>
							<a href="{{ route('proveedores.edit', $proveedor->id) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
							  <i class="material-icons">edit</i>
							</a>
							<a href="{{ route('proveedores.destroy', $proveedor->id) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" onclick="event.preventDefault(); alert('¿Seguro que desea eliminar este registro?'); document.getElementById('delete-form').submit();">
							  <i class="material-icons">delete</i>
							</a>

							<form id="delete-form" action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display: none;">
								{{ method_field('DELETE') }}
		            			@csrf
		          			</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop