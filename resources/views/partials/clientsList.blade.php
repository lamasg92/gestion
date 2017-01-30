@foreach($clients as $client)
    <tr>
        <td>{{$category->nombre }}</td>
        <td>{{$category->apellido }}</td>
        <td>{{$category->direccion }}</td>
        <td>{{$category->telefono }}</td>
        <td>{{$category->email }}</td>
        <td >

            <a href="{{ route('clients.edit', $client ) }}" class="btn btn-info">
                <i class="glyphicon glyphicon-edit"></i>
                Editar
            </a>

            {!! Form::open(['method' => 'DELETE', 'route' => ['clients.destroy', $client]]) !!}
            <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-trash"></i>Eliminar</button>
            {!! Form::close() !!}

        </td>
    </tr>

@endforeach