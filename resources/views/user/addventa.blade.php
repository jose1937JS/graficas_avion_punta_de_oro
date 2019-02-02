@extends('layouts.main')

@section('header-title', 'Charcuteria El Avión de Punta de Oro')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<h4 class="mdl-cell--12-col mdl-cell">Registrar Venta</h4>


		<form action="{{ route('ventas.store') }}" class="mdl-grid" method="post">
			@csrf

			{{-- <div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="product" name="product" pattern="^[a-zA-Záéíóúñ]+(?:\s?[a-zA-Záéíóúñ]\s?)+$">
				<label class="mdl-textfield__label" for="product">Producto</label>
				<span class="mdl-textfield__error">El nombre del producto es inválido</span>
			</div> --}}

			<div class="mdl-cell mdl-cell--6-col">

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<select class="mdl-textfield__input" id="Productos" name="producto">
						<option disabled selected>Selecciona un producto</option>
						<option value="85">85</option>
						<option value="87">87</option>
						<option value="89">89</option>
						<option value="91">91</option>
						<option value="diesel">Diesel</option>
					</select>
					<label class="mdl-textfield__label" for="Productos">Productos registrados</label>
				</div>
			</div>

			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="price" mame="price" pattern="^[\d]+(\.[\d]{2})?$">
				<label class="mdl-textfield__label" for="price">Precio</label>
				<span class="mdl-textfield__error">Precio inválido</span>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="quantity" name="quantity" pattern="[\d]+$">
				<label class="mdl-textfield__label" for="quantity">Cantidad</label>
				<span class="mdl-textfield__error">Cantidad inválida</span>
			</div>

			<div class="mdl-cell mdl-cell--12-col">
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Guardar</button>
			</div>
		</form>

	</div>

@stop