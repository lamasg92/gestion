@foreach($users as $user)
    <tr>
        <td>{{$user->name }}</td>
        <td>{{$user->username }}</td>
        <td>{{$user->email }}</td>
        <td>{{$user->role->nombre }}</td>

        <td >
            <div class="row">
                <div class="col-xs-3">
                    {!! Form::open(['method' => 'GET', 'route' => ['users.edit', $user]]) !!}
                    <button type="submit" class="btn "> <i class="glyphicon glyphicon-edit"></i></button>
                    {!! Form::close() !!}
                </div>
                <div class="col-xs-3">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user]]) !!}
                    <button type="submit" class="btn"> <i class="glyphicon glyphicon-trash"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
        </td>
    </tr>

@endforeach