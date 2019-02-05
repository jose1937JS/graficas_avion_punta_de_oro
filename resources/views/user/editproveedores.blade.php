@extends('layouts.main')

@section('header-title', 'Charcuteria El Avión de Punto de Oro')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<h4 class="mdl-cell--12-col mdl-cell">Modificar Proveedor</h4>

		<form action="{{ route('proveedores.update', $proveedor->id) }}" class="mdl-grid" method="post">
			@csrf
			{{ method_field('PUT') }}

			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="name" name="name" pattern="^[a-zA-Záéíóúñ]+(?:\s?[a-zA-Záéíóúñ]\s?)+$" value="{{ $proveedor->name }}">
				<label class="mdl-textfield__label" for="name">Nombre</label>
				<span class="mdl-textfield__error">El nombre del proveedor es inválido</span>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="price" placeholder="J-0000000000" name="rif" pattern="^(J|G)-[\d]{9,10}$" value="{{ $proveedor->rif }}">
				<label class="mdl-textfield__label" for="price">RIF</label>
				<span class="mdl-textfield__error">El RIF es inválido</span>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="email" id="email" name="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" value="{{ $proveedor->email }}">
				<label class="mdl-textfield__label" for="email">E-mail</label>
				<span class="mdl-textfield__error">Correo Electrónico inválido</span>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="phone" name="phone" maxlength="11" minlength="10" pattern="^[\d]{10,11}" value="{{ $proveedor->phone }}">
				<label class="mdl-textfield__label" for="phone">Teléfono</label>
				<span class="mdl-textfield__error">El teléfono es inválido</span>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--12-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="description" name="address" value="{{ $proveedor->address }}">
				<label class="mdl-textfield__label" for="description">Dirección</label>
			</div>

			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Actualizar</button>
		</form>

	</div>

@stop