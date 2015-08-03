<header class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-bar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{ link_to_route('manager.index', 'OAuth2 Server Manager', [], ['class' => 'navbar-brand']) }}
        </div>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="nav navbar-nav navbar-right">
                <li>{{ link_to_route('oauth.clients.index', 'Clients') }}</li>
                <li>{{ link_to_route('oauth.grants.index', 'Grants') }}</li>
                <li>{{ link_to_route('oauth.scopes.index', 'Scopes') }}</li>
            </ul>
        </div>
    </div>
</header>
