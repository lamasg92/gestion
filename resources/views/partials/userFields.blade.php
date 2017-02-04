{!! Field::text('name', null ,['class' => 'form-control']) !!}
{!! Field::text('username', null ,['class' => 'form-control']) !!}
{!! Field::text('email', null ,['class' => 'form-control']) !!}
<div class="form-group">
    {!! Form::label('role_id', 'Rol') !!}
    {!! Form::select('role_id', $roles, $user->role->id, ['class' => 'form-control', 'placeholder' => 'Seleccion una opcion', 'required'])!!}
</div>
{!! Field::text('password', null ,['class' => 'form-control']) !!}

