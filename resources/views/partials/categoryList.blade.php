@foreach($categories as $category)
    <tr>
        <td>{{$category->id }}</td>
        <td>{{$category->nombre }}</td>
        <td>{{$category->descripcion }}</td>
        <td>
            <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> </a>
            <a href="{{route('categories.destroy', $category->id)}}" onclick="return confirm('Desea eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> </a>
        </td>
    </tr>
@endforeach
