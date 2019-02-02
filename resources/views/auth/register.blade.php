{{-- @extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Registra una nueva cuenta') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
						@csrf

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

								@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Register') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
 --}}

 @include('includes.header')

 <!-- REGISTER FORM -->
<div class="mdl-grid" >
	<div class="mdl-card mdl-shadow--16dp util-center util-spacing-h--40px" style="width: 600px">
		<div class="mdl-card__title mdl-color--teal-500">
			<h2 class="mdl-card__title-text mdl-color-text--white">Registra una nueva cuenta</h2>
		</div>
		<div class="mdl-card__supporting-text mdl-grid">

			<form method="POST" action="">

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
					<label class="mdl-textfield__label mdl-color-text--grey" for="name">Nombre</label>
					<input class="mdl-textfield__input" type="text" pattern="^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$" required id="name" name="name" />
					@if ($errors->has('name'))
						<span class="mdl-textfield__error">{{ $errors->first('name') }}</span>
					@endif
				</div>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
					<label class="mdl-textfield__label mdl-color-text--grey" for="email">Correo Electrónico</label>
					<input class="mdl-textfield__input" type="email" id="email" name="email" required />
					@if ($errors->has('email'))
						<span class="mdl-textfield__error">{{ $errors->first('email') }}</span>
					@endif
				</div>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
					<label class="mdl-textfield__label mdl-color-text--grey" for="password">Password</label>
					<input class="mdl-textfield__input" type="password" id="password" name="password" required />
				   @if ($errors->has('password'))
						<span class="mdl-textfield__error">{{ $errors->first('password') }}</span>
					@endif
				</div>

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
					<label class="mdl-textfield__label mdl-color-text--grey" for="textfield_password_confirm">Repita contraseña</label>
					<input class="mdl-textfield__input" type="password" id="textfield_password_confirm" required name="password_confirmation"/>
				</div>

				<div class="mdl-cell mdl-cell--12-col send-button" align="center">
					<button type="submit" class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored" id="login">
						Registrar
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('includes.footer')