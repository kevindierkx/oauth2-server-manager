{{ BootForm::open()->action(route('oauth.clients.store')) }}
{{ BootForm::token() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                Add client
            </h2>
        </div>

        <div class="panel-body">
            @include('clients.partials_create.form')
        </div>

        <div class="panel-footer">
            {{ BootForm::submit('Add client', 'btn-primary') }}
        </div>
    </div>
{{ BootForm::close() }}
