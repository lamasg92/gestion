{!! Field::text('nombre', null ,['class' => 'form-control']) !!}
{!! Field::text('descripcion', null ,['class' => 'form-control']) !!}
{!! Field::text('stock', null ,['class' => 'form-control']) !!}
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('nombre', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccion una opcion', 'required'])!!}
</div>

{!! Field::text('precio_unitario', null ,['class' => 'form-control']) !!}

