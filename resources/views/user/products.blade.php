@extends('layouts.main')

@section('header-title', 'Charcuteria El Avión de Punta de Oro')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<div class="mdl-cell mdl-cell--12-col">
			<h4>Productos<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary right mdl-js-ripple-effect" href="{{ route('productos.create') }}"> Añadir producto</a></h4>
		</div>

		@include('includes.message')

		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Descripción</th>
					<th>Cantidad</th>
					<th>Categoria</th>
					<th>Precio</th>
					<th>Acciones</th>
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
						<td>
							<a href="{{ route('productos.edit', $product->id) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
							  <i class="material-icons">edit</i>
							</a>
							<a href="{{ route('productos.destroy', $product->id) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" onclick="event.preventDefault(); alert('¿Seguro que desea eliminar este registro?'); document.getElementById('delete-form').submit();">
							  <i class="material-icons">delete</i>
							</a>

							<form id="delete-form" action="{{ route('productos.destroy', $product->id) }}" method="POST" style="display: none;">
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