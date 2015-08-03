<div class="page-header">
    <div class="btn-toolbar pull-right">
        {{
            link_to_route(
                'oauth.scopes.create',
                'Add Scope',
                [],
                ['class' => 'btn btn-primary']
            )
        }}
    </div>

    <h2>Scopes</h2>
</div>

@include('scopes.partials_index.scopes', ['scopes' => $scopes])

<div class="btn-toolbar">
    {{ $scopes->links() }}
</div>
