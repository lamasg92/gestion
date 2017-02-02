@foreach($invoices as $invoice)
    <tr>
        <td>{{$invoice->fecha }}</td>
        <td>{{$invoice->numero }}</td>
        <td>{{$invoice->client }}</td>
        <td>{{$invoice->total }}</td>

        <td >
            {!! Form::open(['method' => 'GET', 'route' => ['invoice.show', $article]]) !!}
                <button type="submit" class="btn"> <i class="glyphicon glyphicon-list"></i></button>
            {!! Form::close() !!}

        </td>
    </tr>

@endforeach