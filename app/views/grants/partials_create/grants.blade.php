@foreach($grants as $grant)
    {{
        BootForm::checkbox('<strong>' . $grant->id . '</strong>', 'grants[]')
            ->value($grant->id)
    }}
@endforeach
