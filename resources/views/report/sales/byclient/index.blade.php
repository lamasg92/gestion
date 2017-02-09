@extends('app')
@section('styles')
    {!! Html::style('css/jquery.easy-autocomplete.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reporte Por cliente</div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-xs-6">

                            {!! Form::open(['class' => 'form']) !!}
                            {!! Field::text('client', ['class' => 'easy-autocomplete', 'placeholder' => "Nombre"]) !!}
                            {!! Field::hidden('client_id', null, ['id' => 'client_id']) !!}
                            {!! Form::submit('Reporte', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {!! Html::script('js/jquery.easy-autocomplete.js') !!}
    <script>
        $(document).ready(function () {
            $("#client").easyAutocomplete({
                url: "/invoices/clients",
                getValue: "nombre",
                template: {
                    type: "description",
                    fields: {
                        description: "email",
                    }
                },
                list: {
                    match: {
                        enabled: true
                    },
                    onClickEvent: function () {
                        var cliente = $("#client").getSelectedItemData();
                        $('#client_id').val(cliente.id);

                    }
                },
                theme: "bootstrap",
                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {}
                },
                preparePostData: function (data) {
                    data.term = $("#client").val();
                    return data;
                },
                requestDelay: 400

            }).change(function () {
                $('#client_id').val('');
            });
        });
    </script>

@endsection