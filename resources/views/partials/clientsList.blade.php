@foreach($clients as $client)
    <tr>
        <td>{{$client->nombre }}</td>
        <td>{{$client->apellido }}</td>
        <td>{{$client->direccion }}</td>
        <td>{{$client->telefono }}</td>
        <td>{{$client->email }}</td>
        <td >
            <div class="row">
                <div class="col-xs-3">
                    {!! Form::open(['method' => 'GET', 'route' => ['clients.edit', $client]]) !!}
                    <button type="submit" class="btn "> <i class="glyphicon glyphicon-edit"></i></button>
                    {!! Form::close() !!}
                </div>
                <div class="col-xs-3">

                    {!! Form::open(['method' => 'DELETE', 'route' => ['clients.destroy', $client]]) !!}
                    <button type="submit" class="btn"> <i class="glyphicon glyphicon-trash"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
        </td>
    </tr>

@endforeach