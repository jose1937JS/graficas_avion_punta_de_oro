@extends('layouts.main')

@section('header-title', 'Categorias')

@section('content')
<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
	<div class="mdl-cell mdl-cell--12-col">
		<h4>Categorias<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary right mdl-js-ripple-effect" href="{{ route('categorias.create') }}"> Añadir categoria</a></h4>
	</div>
	
	@include('includes.message')

	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col" id="myTable">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->category }}</td>
				<td>
					<a href="{{ route('categorias.edit', $category->id) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
					  <i class="material-icons">edit</i>
					</a>
					<a href="{{ route('categorias.destroy', $category->id) }}" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" onclick="event.preventDefault(); alert('¿Seguro que desea eliminar este registro?'); document.getElementById('delete-form').submit();">
					  <i class="material-icons">delete</i>
					</a>

					<form id="delete-form" action="{{ route('categorias.destroy', $category->id) }}" method="POST" style="display: none;">
						{{ method_field('DELETE') }}
            			@csrf
          			</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

