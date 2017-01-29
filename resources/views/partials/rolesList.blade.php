@foreach($roles as $role)
    <tr>
        <td>{{$role->nombre }}</td>
        <td>{{$role->descripcion }}</td>
    </tr>
@endforeach
