<table class="table table-bordered">
	<thead>
		<th class="col-sm-4">ID</th>
		<th class="col-sm-4">Description</th>
		<th class="col-sm-4">Created At</th>
	</thead>

	<tbody>
		@foreach( $scopes as $scope )
			@include('scopes.partials_index.scope', ['scope' => $scope])
		@endforeach
	</tbody>
</table>
