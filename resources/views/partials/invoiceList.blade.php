@foreach ($model as $m)
    <tr>
        <td>
            <a href="{{url('invoice/detail/' . $m->id )}}">
                {{ $m->client->name }}
            </a>
        </td>
        <td class="text-right">{{ $m->created_at  }}</td>

        <td class="text-right">$ {{number_format($m->total, 2)}}</td>

        <td class="text-right">
            <a class="btn btn-success btn-block btn-xs" href="{{ url('invoice/topdf/' . $m->id) }}">
                <i class="fa fa-file-pdf-o"></i> Descargar
            </a>
        </td>
    </tr>
@endforeach