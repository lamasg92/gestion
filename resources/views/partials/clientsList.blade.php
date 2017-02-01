@foreach($clients as $client)
    <tr>
        <td>{{$client->nombre }}</td>
        <td>{{$client->apellido }}</td>
        <td>{{$client->direccion }}</td>
        <td>{{$client->telefono }}</td>
        <td>{{$client->email }}</td>
        <td >

            {!! Form::open(['method' => 'GET', 'route' => ['clients.edit', $article]]) !!}
                <button type="submit" class="btn "> <i class="glyphicon glyphicon-edit"></i></button>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'route' => ['clients.destroy', $article]]) !!}
            <button type="submit" class="btn"> <i class="glyphicon glyphicon-trash"></i></button>
            {!! Form::close() !!}

        </td>
    </tr>

@endforeach