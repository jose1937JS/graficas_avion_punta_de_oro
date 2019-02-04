@extends('layouts.main')

@section('header-title', 'Charcuteria El Avión de Punta de Oro')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<h4 class="mdl-cell--12-col mdl-cell">Añadir Producto</h4>


		<form action="{{ route('productos.update', $product->id) }}" class="mdl-grid" method="post">
			@csrf
			{{ method_field('PUT') }}
			<div class="mdl-cell mdl-cell--6-col">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<select class="mdl-textfield__input" id="Categorias" name="category_id">
						@foreach($categories as $category)
							@if ($product->category->id == $category->id)
								<option selected value="{{ $category->id }}">{{ $category->category }}</option>
							@endif
							<option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
					</select>
					<label class="mdl-textfield__label" for="Productos">Productos registrados</label>
				</div>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="name" name="name" maxlength="255" pattern="^[a-zA-Záéíóúñ]+(?:\s?[a-zA-Záéíóúñ]\s?)+$" value="{{ $product->name }}">
				<label class="mdl-textfield__label" for="name">Nombre</label>
				<span class="mdl-textfield__error">Nombre del producto inválido</span>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="description" name="description" maxlength="255" value="{{ $product->description }}">
				<label class="mdl-textfield__label" for="description">Descripción</label>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="quantity" name="quantity" pattern="^[\d]+$" value="{{ $product->quantity }}">
				<label class="mdl-textfield__label" for="quantity">Cantidad</label>
				<span class="mdl-textfield__error">Cantidad inválida</span>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="price" name="price" pattern="^[\d]+(\.[\d]{2})?$" value="{{ $product->price }}">
				<label class="mdl-textfield__label" for="price">Precio ejm: 200.00</label>
				<span class="mdl-textfield__error">Precio inválido</span>
			</div>
			
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Guardar</button>
		</form>

	</div>

@stop