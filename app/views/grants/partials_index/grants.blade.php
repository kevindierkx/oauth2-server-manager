<table class="table table-bordered">
    <thead>
        <th class="col-sm-6">ID</th>
        <th class="col-sm-6">Created At</th>
    </thead>

    <tbody>
        @foreach( $grants as $grant )
            @include('grants.partials_index.grant', ['grant' => $grant])
        @endforeach
    </tbody>
</table>
