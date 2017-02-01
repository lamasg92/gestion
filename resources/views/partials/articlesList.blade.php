@foreach($articles as $article)
    <tr>
        <td>{{$article->nombre }}</td>
        <td>{{$article->detalle }}</td>
        <td>{{$article->stock }}</td>

        <td>{{$article->category->nombre }}</td>

        <td>{{$article->presio_unitario }}</td>
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