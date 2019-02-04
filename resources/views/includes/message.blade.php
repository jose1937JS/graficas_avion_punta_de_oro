<div class="mdl-cell mdl-cell--12-col">
	@if(Session::has('message'))
		<p style="color: green">{{ Session::get('message') }}</p>
	@endif
</div>