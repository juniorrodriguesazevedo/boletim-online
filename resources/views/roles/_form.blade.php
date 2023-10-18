{!! Form::open([
    'route' => isset($role) ? ['roles.update', $role->id] : 'roles.store',
    'method' => isset($role) ? 'PUT' : 'POST',
]) !!}
<div class="row">
    <div class="col-md-6">
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', isset($role) ? $role->name : null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('description', 'Descrição') !!}
        {!! Form::text('description', isset($role) ? $role->description : null, ['class' => 'form-control']) !!}
    </div>

    @isset($permissions)
        <div class="col-md-12">
            <p>Permissões</p>
        </div>
        <div class="col-md-12">
            @foreach ($permissions as $permission)
                <div class="col">
                    {!! Form::checkbox(
                        'permissions[]',
                        $permission->name,
                        isset($role) && $role->permissions->contains($permission->id) ? true : false,
                        ['id' => $permission->id],
                    ) !!}
                    {!! Form::label($permission->id, $permission->name) !!}
                </div>
            @endforeach
        </div>
    @endisset

    <div class="col-md-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
