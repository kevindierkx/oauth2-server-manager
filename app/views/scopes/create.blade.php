{{ BootForm::open()->action(route('oauth.scopes.store')) }}
{{ BootForm::token() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">
                Add Scope
            </h2>
        </div>

        <div class="panel-body">
            @include('scopes.partials_create.form')
        </div>

        <div class="panel-footer">
            {{ BootForm::submit('Add scope', 'btn-primary') }}
        </div>
    </div>
{{ BootForm::close() }}
