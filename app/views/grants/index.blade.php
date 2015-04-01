<div class="page-header">
	<div class="btn-toolbar pull-right">
		{{
			link_to_route(
				'oauth.grants.create',
				'Add grant',
				[],
				['class' => 'btn btn-primary']
			)
		}}
	</div>

	<h2>Grants</h2>
</div>

@include('grants.partials_index.grants', ['grants' => $grants])
