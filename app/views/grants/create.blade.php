{{ BootForm::open()->action(route('oauth.grants.store')) }}
{{ BootForm::token() }}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">
				Add Grant
			</h2>
		</div>

		<div class="panel-body">
			@include('grants.partials_create.form')
		</div>

		<div class="panel-footer">
			{{ BootForm::submit('Add Grant', 'btn-primary') }}
		</div>
	</div>
{{ BootForm::close() }}
