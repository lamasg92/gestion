@foreach($categories as $category)
    <tr>
        <td>{{$category->id }}</td>
        <td>{{$category->nombre }}</td>
        <td>{{$category->descripcion }}</td>
        <td>
            <div class="row">
                <div class="col-xs-3">

                    {!! Form::open(['method' => 'GET', 'route' => ['categories.edit', $category]]) !!}
                    <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-edit"></i></button>
                    {!! Form::close() !!}
                </div>
                <div class="col-xs-3">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category]]) !!}
                    <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-trash"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
        </td>
    </tr>
@endforeach
