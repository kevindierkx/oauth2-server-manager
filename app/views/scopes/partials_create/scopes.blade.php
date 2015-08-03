@foreach($scopes as $scope)
    {{
        BootForm::checkbox('<strong>' . $scope->id . '</strong> <small>' . $scope->description . '</small>', 'scopes[]')
            ->value($scope->id)
    }}
@endforeach
