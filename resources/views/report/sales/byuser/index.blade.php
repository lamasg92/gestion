@extends('app')
@section('styles')
    {!! Html::style('css/jquery.easy-autocomplete.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reporte Por Usuario</div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-xs-6">

                            {!! Form::open(['class' => 'form']) !!}
                            {!! Field::text('user', ['class' => 'easy-autocomplete', 'placeholder' => "Nombre"]) !!}
                            {!! Field::hidden('user_id', null, ['id' => 'user_id']) !!}
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
            $("#user").easyAutocomplete({
                url: "/invoices/users",
                getValue: "name",
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
                        var user = $("#user").getSelectedItemData();
                        $('#user_id').val(user.id);

                    }
                },
                theme: "bootstrap",
                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {}
                },
                preparePostData: function (data) {
                    data.term = $("#user").val();
                    return data;
                },
                requestDelay: 400

            }).change(function () {
                $('#user_id').val('');
            });
        });
    </script>

@endsection