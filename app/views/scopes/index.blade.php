<div class="page-header">
	<h2>Scopes</h2>
</div>

@include('scopes.partials_index.scopes', ['scopes' => $scopes])

<div class="btn-toolbar">
	{{ $scopes->links() }}
</div>
