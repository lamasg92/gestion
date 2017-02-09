@foreach ($model as $m)
    <tr>
        <td>
            <a href="{{url('invoices/show/' . $m->id )}}">{{ $m->client->nombre }} </a>
        </td>
        <td >{{ $m->created_at  }}</td>
        <td >{{ $m->payment->nombre  }}</td>
        <td >$ {{number_format($m->total, 2)}}</td>

        <td class="text-right">
            <a class="btn btn-success btn-block btn-xs" href="{{ url('invoices/topdf/' . $m->id) }}">
                <i class="fa fa-file-pdf-o"></i> Descargar
            </a>
        </td>
    </tr>
@endforeach