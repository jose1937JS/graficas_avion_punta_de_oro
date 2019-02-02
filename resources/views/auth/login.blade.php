@include('includes.header')

<!-- LOGIN FORM -->
<div class="mdl-grid">

	<div class="mdl-card mdl-shadow--16dp util-center util-spacing-h--40px" style="width:400px;">
		<div class="mdl-card__title mdl-color--orange-800">
			<h2 class="mdl-card__title-text mdl-color-text--white">Inicio de sesión</h2>
		</div>
		<div class="mdl-card__supporting-text mdl-grid">

			<form method="POST" action="{{ route('login') }}">
				@csrf

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
					<label class="mdl-textfield__label mdl-color-text--grey" for="email">Correo Electrónico</label>
					<input class="mdl-textfield__input" value="{{ old('email') }}" type="email" id="email" name="email" required autofocus />
					@if ($errors->has('email'))
						<span class="mdl-textfield__error">{{ $errors->first('email') }}</span>
					@endif
				</div>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
					<label class="mdl-textfield__label mdl-color-text--grey" for="password">Contraseña</label>
					<input class="mdl-textfield__input" type="password" id="password" name="password" required />
					@if ($errors->has('password'))
						<span class="mdl-textfield__error">{{ $errors->first('password') }}</span>
					@endif
				</div>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
					<input class="mdl-checkbox__input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
					<label class="form-check-label" for="remember">{{ __('Recuérdame') }}</label>
					<a class="btn btn-link" href="{{ route('password.request') }}">{{ __('¿Olvidastes tu clave?') }}</a>
				</div>

				<div class="mdl-cell mdl-cell--12-col send-button" align="center">
					<button type="submit"  class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored mdl-color--primary">Entrar</button>
				</div>

			</form>
		</div>
	</div>
</div>


@include('includes.footer')