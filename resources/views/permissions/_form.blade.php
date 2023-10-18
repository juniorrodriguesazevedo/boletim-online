{!! Form::open([
    'route' => isset($permission) ? ['roles.update', $permission->id] : 'roles.store',
    'method' => isset($permission) ? 'PUT' : 'POST',
]) !!}
<div class="row">
    <div class="col-md-6">
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', isset($permission) ? $permission->name : null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('description', 'Descrição') !!}
        {!! Form::text('description', isset($permission) ? $permission->description : null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-md-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
