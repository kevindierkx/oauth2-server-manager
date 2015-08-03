<div class="page-header">
    <div class="btn-toolbar pull-right">
        {{
            link_to_route(
                'oauth.clients.create',
                'Add client',
                [],
                ['class' => 'btn btn-primary']
            )
        }}
    </div>

    <h2>Clients</h2>
</div>

@include('clients.partials_index.clients', ['clients' => $clients])

<div class="btn-toolbar">
    {{ $clients->links() }}
</div>
