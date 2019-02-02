@extends('layouts.main')

@section('header-title', 'Proveedores')

@section('content')

	<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
		<div class="mdl-cell mdl-cell--12-col">
			<h4>Proveedores<a class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary right mdl-js-ripple-effect" href="{{ route('proveedores.create') }}"> Registrar proveedor</a></h4>
		</div>

		<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>E-mail</th>
					<th>Teléfono</th>
					<th>RIF</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Bananas Inc</td>
					<td>Avenida los placeres calleurdaneta</td>
					<td>bananainc@gmail.com</td>
					<td>05250000000</td>
					<td>J-12331</td>
				</tr>
			</tbody>
		</table>
	</div>

@stop</h4>