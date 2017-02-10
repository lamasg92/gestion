<html>
<head>
    <style>
        .header{background:#eee;color:#444;border-bottom:1px solid #ddd;padding:10px;}
        .client-detail{background:#ddd;padding:10px;}
        .client-detail th{text-align:left;}
        .items{border-spacing:0;}
        .items thead{background:#ddd;}
        h1 small{display:block;font-size:16px;color:#888;}
        table{width:100%;}
        .text-right{text-align:right;}
    </style>
</head>
<body>

<div class="header">
    <h1>
        Comprobante  {{ str_pad ($model->id, 7, '0', STR_PAD_LEFT) }} Fecha: {{ $model->created_at }}
    </h1>
</div>
<table class="client-detail">
    <tr>
        <th style="width:100px;">
            Cliente
        </th>
        <td>{{ $model->client->nombre }}</td>
    </tr>
    <tr>
        <th>Direccion</th>
        <td>{{ $model->client->direccion }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $model->client->email }}</td>
    </tr>
</table>

<hr />

<table class="items">
    <thead>
    <tr>
        <th class="text-left">Articulo</th>
        <th class="text-right" style="width:100px;">Cantidad</th>
        <th class="text-right" style="width:100px;">Precio</th>
        <th class="text-right" style="width:100px;">Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($model->invoice_details as $d)
        <tr>
            <td>{{$d->article->nombre}}</td>
            <td class="text-right">{{$d->cantidad}}</td>
            <td class="text-right">$ {{number_format($d->precio, 2)}}</td>
            <td class="text-right">$ {{number_format($d->total_line, 2)}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <hr />
    <tr>
        <hr />
        <td colspan="3" class="text-right"><b>Total</b></td>
        <td class="text-right">$ {{ number_format($model->total, 2) }}</td>
    </tr>
    </tfoot>
</table>
</body>
</html>