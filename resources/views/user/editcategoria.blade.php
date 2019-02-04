@extends('layouts.main')

@section('header-title', 'Charcuteria El Avión de Punta de Oro')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<h4 class="mdl-cell--12-col mdl-cell">Editar Categoria</h4>


		<form action="{{ route('categorias.update', $category) }}" class="mdl-grid" method="post">
			@csrf
			{{ method_field('PUT') }}

			<div class="mdl-textfield mdl-cell mdl-cell--12-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="name" name="category" maxlength="255" pattern="^[a-zA-Záéíóúñ]+(?:\s?[a-zA-Záéíóúñ]\s?)+$" value="{{ $category->category }}">
				<label class="mdl-textfield__label" for="name">Nombre</label>
				<span class="mdl-textfield__error">Nombre del producto inválido</span>
			</div>

			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Actualizar</button>
		</form>

	</div>

@stop