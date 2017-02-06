@extends('app')

@section('styles')
    <link href="{{ asset('css/jquery.easy-autocomplete.css') }}" rel="stylesheet">
@endsection


@section('content')
 <div class="panel-heading">Facturacion</div>
  <div class="panel-body">

      <div class="row">
          <div class="col-md-12">
              <invoice></invoice>
          </div>
      </div>


  </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>
    <script src="{{asset('riot_components/invoice.tag')}}" type="riot/tag"></script>
    <script>
        $(document).ready(function(){
            riot.mount('invoice');
        })
    </script>


    <script>

        //self data
        var self = this;
        var client_id = 0;
         var detail = [];
        var total = 0;


        //funtions for detail table
        function agregarProducto()
        {
            detail.push({
                id: article_id,
                nombre: descripcion.value,
                cantidad: parseInt(cantidad.value),
                precio: parseFloat(precio.value),
                total: parseFloat(precio.value * cantidad.value)
            });

            cleanInfo();
            calcularTotales();
        }

        function calcularTotales() {
            var total = 0;

            self.detail.forEach(function(e){
                total += e.total;
            });

            self.total = total;
        }

        function cleanInfo() {
            self.article_id = 0;
            self.article.value = '';
            self.cantidad.value = '';
            self.precio = '';


        }

        $('#grabar').click(function() {

//            ['numero', 'fecha', 'client_id', 'user_id', 'payment_id', 'cupon', 'total'];  inoice table fields
//            ['invoice_id', 'cantidad', 'article_id', 'precio', 'total_line'];             Invoice_detail filds
                if (detail.length > 0 && client_id > 0) {

                    $.post(baseUrl('self/store'), {
                        client_id: self.client_id,
                        total: self.total,
                        payment: self.payment_id,
                        cupon: self.cupon,
                        detail: self.detail
                    }, function (r) {
                        if (r.response) {
                            window.location.href = baseUrl('invoice.index');
                        } else {
                            alert('Ocurrio un error');
                        }
                    }, 'json')
                }
                else {

                }
            }
        )
        function deleteDetailRow() {
            alert('borra la fila');
        }

    </script>

        {{--Autocomplete scripst--}}
        <script>

        $(document).ready(function () {

            $("#client").easyAutocomplete({
                url: "/invoices/clients",
                getValue: "nombre",

                template: {
                    type: "description",
                    fields: {
                        description: "direccion"
                    }
                },
                list: {
                    match: {
                        enabled: true
                    }
                    ,
                    onSelectItemEvent: function() {
                        var client = $("#client").getSelectedItemData();
                        $('#client_id').val(client.id);
                        $('#direccion').val(client.direccion);
                        $('#email').val(client.email);
                    },
//                    onClickEvent: function () {
//                        var user = $("#user").getSelectedItemData();
//                        window.location.href = '/users/' + user.id;
//                    }
                },
                theme: "bootstrap",

                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {
                    }
                },

                preparePostData: function(data) {
                    data.term = $("#client").val();
                    return data;
                },

                requestDelay: 400
            }).change(function () {
                $('#client_id').val('');

            });

        });
    </script>
    <script>
        $(document).ready(function () {

            $("#article").easyAutocomplete({
                url: "/invoices/articles",
                getValue: "nombre",

                template: {
                    type: "description",
                    fields: {
                        description: "descripcion",

                    }
                },
                list: {
                    match: {
                        enabled: true
                    }
                    ,
//                    onSelectItemEvent: function() {
//                        var article = $("#article").getSelectedItemData();
//                        $('#article_id').val(article.id);
//                    },
                    onClickEvent: function () {
                        var article = $("#article").getSelectedItemData();

                        $('#precio_unnitario').val(article.precio_unnitario);

                        article_id = article.id;
                        precio = article.precio_unitario;
                        descripcion = article.descripcion;

                        $('#precio').val(article.precio_unitario);
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
            }).change(function () {
                $('#article_id').val('');
            });
        });
    </script>

@endsection
