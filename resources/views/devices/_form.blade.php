{!! Form::open([
    'route' => isset($device) ? ['devices.update', $device->id] : 'devices.store',
    'method' => isset($device) ? 'PUT' : 'POST',
]) !!}
<div class="row">
    <div class="col-md-6">
        {!! Form::label('name', 'Nome', ['class' => 'required']) !!}
        {!! Form::text('name', isset($device) ? $device->name : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'name'])
    </div>
    <div class="col-md-4">
        {!! Form::label('ip', 'IP', ['class' => 'required']) !!}
        {!! Form::text('ip', isset($device) ? $device->ip : null, ['class' => 'form-control']) !!}
        @include('alerts.feedback', ['field' => 'ip'])
    </div>
    <div class="col-md-2">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', [1 => 'Ativo', 0 => 'Inativo'], isset($device) ? $device->status : null, [
            'class' => 'form-control',
        ]) !!}
        @include('alerts.feedback', ['field' => 'status'])
    </div>
    <div class="col-md-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
