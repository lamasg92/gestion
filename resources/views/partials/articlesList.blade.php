@foreach($articles as $article)
    <tr>
        <td>{{$article->nombre }}</td>
        <td>{{$article->descripcion }}</td>
        <td>{{$article->stock }}</td>

        <td>{{$article->category->nombre }}</td>

        <td>{{$article->precio_unitario }}</td>
        <td >

            {!! Form::open(['method' => 'GET', 'route' => ['articles.edit', $article]]) !!}
                <button type="submit" class="btn "> <i class="glyphicon glyphicon-edit"></i></button>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article]]) !!}
                <button type="submit" class="btn"> <i class="glyphicon glyphicon-trash"></i></button>
            {!! Form::close() !!}

        </td>
    </tr>

@endforeach