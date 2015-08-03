<fieldset class="form-row">
    {{ BootForm::text('Application name', 'name') }}

    {{ BootForm::text('Authorization callback URL', 'redirect_uri') }}
    <span class="help-block">
        Your application's callback URL, users will be send to this URL after authorization.
    </span>
</fieldset>

<fieldset class="form-row">
    <legend class="form-heading">
        Grants
    </legend>

    <div class="form-body">
        <span class="help-block">
            The client receives an authorization grant, which is a credential representing the resource owner's authorization, expressed using one of four grant types defined in this specification: <a href="http://tools.ietf.org/html/rfc6749">RFC6749</a>
        </span>

        @include('grants.partials_create.grants')
    </div>
</fieldset>

<fieldset class="form-row">
    <legend class="form-heading">
        Scopes
    </legend>

    <div class="form-body">
        <span class="help-block">
            Scopes let you specify exactly what type of access you need. Scopes limit access for OAuth tokens.<br />
            They do not grant any additional permission beyond that which the user already has.
        </span>

        @include('scopes.partials_create.scopes')
    </div>
</fieldset>
