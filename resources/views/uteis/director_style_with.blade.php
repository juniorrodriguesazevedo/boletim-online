{{ auth()->user()->hasPermissionTo('director_edit') ||
auth()->user()->hasRole('super_admin')
    ? 'width: 84px'
    : 'width: 50px' }}
