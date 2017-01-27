@foreach($categories as $category)
    <tr>
        <td>{{$category->id }}</td>
        <td>{{$category->nombre }}</td>
        <td>{{$category->descripcion }}</td>
        <td>
            {!!   Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE'])  !!}
                <button type="submit" title="Eliminar">  <i class="glyphicon glyphicon-trash"></i> </button>
            {!!  Form::close()  !!}
        </td>
    </tr>
@endforeach
