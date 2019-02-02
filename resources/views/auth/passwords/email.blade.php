@include('includes.header')

<div class="mdl-grid">
	<div class="mdl-card mdl-shadow--16dp util-center util-spacing-h--40px" style="width:400px;">
		<div class="mdl-card__title mdl-color--orange-800">
			<h2 class="mdl-card__title-text mdl-color-text--white">Reseteo de contraseña</h2>
		</div>

		<div style="padding: 20px 30px">

			@if (session('status'))
				<p>{{ session('status') }}</p>
			@endif

			<form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
				@csrf

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
					<label for="email" class="mdl-textfield__label mdl-color-text--grey">{{ __('Correo Electrónico') }}</label>

					<input id="email" type="email" class="mdl-textfield__input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
						<strong class="mdl-color-text--accent">{{ $errors->first('email') }}</strong>
					@endif
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored mdl-color--primary">
							{{ __('Enviar') }}
						</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>

@include('includes.footer')