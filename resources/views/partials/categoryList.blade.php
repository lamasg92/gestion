@foreach($categories as $category)
    <tr>
        <td>{{$category->id }}</td>
        <td>{{$category->nombre }}</td>
        <td>{{$category->descripcion }}</td>
        <td >

                <a href="{{ route('categories.edit', $category ) }}" class="btn btn-info">
                    <i class="glyphicon glyphicon-edit"></i>
                    Editar
                </a>

                {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category]]) !!}
                    <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-trash"></i>Eliminar</button>
                {!! Form::close() !!}

        </td>
    </tr>

@endforeach
