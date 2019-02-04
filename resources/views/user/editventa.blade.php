@extends('layouts.main')

@section('header-title', 'Charcuteria El Avión de Punta de Oro')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<h4 class="mdl-cell--12-col mdl-cell">Modificar Venta</h4>

		<form action="{{ route('ventas.update', $sale->id) }}" class="mdl-grid" method="post">
			@csrf
			{{ method_field('PUT') }}

			<div class="mdl-cell mdl-cell--6-col">

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<select class="mdl-textfield__input" id="Categorias" name="product_id">
						@foreach($products as $product)
							@if ($sale->product->id == $product->id)
								<option selected value="{{ $product->id }}">{{ $product->name }}</option>
							@endif
							<option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
					</select>
					<label class="mdl-textfield__label" for="Productos">Productos registrados</label>
				</div>
			</div>

			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="price" name="total_price" pattern="^[\d]+(\.[\d]{2})?$" value="{{ $sale->total_price }}">
				<label class="mdl-textfield__label" for="price">Precio</label>
				<span class="mdl-textfield__error">Precio inválido</span>
			</div>
			<div class="mdl-textfield mdl-cell mdl-cell--6-col mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" id="quantity" name="quantity" pattern="[\d]+$" value="{{ $sale->quantity }}">
				<label class="mdl-textfield__label" for="quantity">Cantidad</label>
				<span class="mdl-textfield__error">Cantidad inválida</span>
			</div>

			<div class="mdl-cell mdl-cell--12-col">
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Actualizar</button>
			</div>
		</form>

	</div>

@stop