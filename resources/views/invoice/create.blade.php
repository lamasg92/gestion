@extends('app')

@section('styles')
    <link href="{{ asset('css/jquery.easy-autocomplete.css') }}" rel="stylesheet">
@endsection


@section('content')
    <div class="panel-heading">Facturacion</div>
    <div class="panel-body">

        {!! Field::text('fecha', null ,['class' => 'form-control']) !!}
        {!! Field::text('numero', null ,['class' => 'form-control']) !!}


        <div class="form-group">
            {!! Form::open([ 'class'=>'form']) !!}
               {!! Field::text('article',  ['class'=>'easy-autocomplete']) !!}
            {!! Form::close() !!}

            {!! Form::open([ 'class'=>'form']) !!}
                {!! Field::text('user',  ['class'=>'easy-autocomplete']) !!}
                {!! Field::hidden('user_id', null, ['id' => 'user_id']) !!}
            {!! Form::close() !!}

        </div>
    {!! Form::open(['method' => 'POST', 'route' => 'invoices.store']) !!}

        <div class="form-group">



        </div>
        <div class="form-group">
            {!! Form::label('payment_id', 'Forma de Pago') !!}
            {!! Form::select('payment_id', $payments, null, ['class' => 'form-control', 'placeholder' => 'Seleccion una opcion', 'required'])!!}
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Grabar</button>
            </div>
        </div>

    {!! Form::close() !!}

    </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>

    <script>
        $(document).ready(function () {
            var user_options = {
                url: "/invoices/users",
                getValue: "name",

                template: {
                    type: "description",
                    fields: {
                        description: "username"
                    }
                },
                list: {
                    match: {
                        enabled: true
                    },
                    onSelectItemEvent: function() {
                        var user = $("#user").getSelectedItemData();
                        $('#user_id').val(user.id);
                    },
                    onClickEvent: function () {
                        var user = $("#user").getSelectedItemData();
                        window.location.href = '/users/' + user.id;
                    }
                },
                theme: "bootstrap",

                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {
                    }
                },

                preparePostData: function(data) {
                    data.term = $("#user").val();
                    return data;
                },

                requestDelay: 400
            };

            $("#user").easyAutocomplete(user_options);

        });
    </script>
    <script>
        $(document).ready(function () {
            var article_options = {
                url: "/invoices/articles",
                getValue: "nombre",

                template: {
                    type: "description",
                    fields: {
                        description: "descripcion"
                    }
                },
                list: {
                    match: {
                        enabled: true
                    }
                },

                theme: "bootstrap",

                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {
                    }
                },

                preparePostData: function(data) {
                    data.term = $("#user").val();
                    return data;
                },

                requestDelay: 400
            };

            $("#article").easyAutocomplete(article_options);

        });
    </script>

@endsection
