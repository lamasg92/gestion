<invoice>
    <div class="well well-sm">
        <div class="row">
            <div class="col-xs-4">
                <input id="client" class="form-control typeahead" type="text" placeholder="Cliente"/>
            </div>
            <div class="col-xs-5">
                <input class="form-control" type="text" placeholder="Direccion" readonly value="{address}"/>
            </div>
            <div class="col-xs-3">
                <input class="form-control" type="text" placeholder="Email" readonly value="{mail}"/>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-xs-7">
            <input id="product" class="form-control" type="text" placeholder="Nombre del articulo"/>
        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Precio" value="{price}" readonly/>
            </div>
        </div>
        <div class="col-xs-2">
            <input id="quantity" class="form-control" type="text" placeholder="Cantidad"/>
        </div>
        <div class="col-xs-1">
            <button onclick={__addRow} class="btn
                                              btn-primary
                                              form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <hr/>

    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Articulo</th>
            <th style="width:100px;">Cantidad</th>
            <th style="width:100px;">P.U</th>
            <th style="width:100px;">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail}>
            <td>
                <button onclick={__removeDetail} class="btn
                                                        btn-danger
                                                        btn-xs
                                                        btn-block">X
                </button>
            </td>
            <td>{nombre}</td>
            <td class="text-right">{quantity}</td>
            <td class="text-right">$ {price}</td>
            <td class="text-right">$ {total}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>Total</b></td>
            <td class="text-right">$ {total.toFixed(2)}</td>
        </tr>
        </tfoot>
    </table>

    <div class="row">
        <div class="col-xs-4">
            <input id="payment" class="form-control" type="text" placeholder="Forma de pago"/>
        </div>
        <div class="col-xs-6">
            <input if={payment_nombre == "tarjeta"} id="cupon" class="form-control" type="text" placeholder="Cupon" />
        </div>
    </div>
    <hr/>

    <button if={detail.length> 0 && client_id > 0}
        onclick={__saveData}
        class="btn btn-default btn-lg btn-block">
        Guardar
    </button>

    <script>
        //references to all controls
        var self = this;
        var article_id;
        var payment_nombre = "";
        var cantidad_stock = 0;
        // Detail
        self.client_id = 0;
        self.payment_id = 0;
        self.detail = [];
        self.total = 0;
        article_id = '';

        //set autocomplete functionality
        //first thing to load
        self.on('mount', function () {
            __clientAutocomplete();
            __articleAutocomplete();
            __paymentAutocomplete();
        })

        __addRow()
        {
            var quantity = parseFloat($("#quantity").val());

            if (quantity > 0) {
                if ((cantidad_stock - $("#quantity").val()) >= 0) {

                    if ((article_id > 0) && (quantity > 0 )) {
                        self.detail.push({
                            id: article_id,
                            nombre: $("#product").val(),
                            quantity: parseFloat($("#quantity").val()),
                            price: self.price,
                            total: self.price * parseFloat($("#quantity").val())
                        });

                        $("#product").val('');
                        $("#quantity").val('')
                        self.price = '';
                        __totals();
                    }
                } else {
                    alert('Intenta Facturar sin Stock Suficiente!!', 'Ok')
                }
            }else{
                alert('La Cantidad debe ser mayor que cero!', 'Ok')
            }

            }

            __saveData()
        {
            if ( $("#cupon").val() != "") {
                $.post(baseUrl('invoices/store'), {
                    client_id: self.client_id,
                    payment_id: self.payment_id,
                    total: self.total,
                    cupon: $("#cupon").val(),
                    detail: self.detail
                }, function (r) {
                    if (r.response) {
                        window.location.href = baseUrl('invoices/index');
                    } else {
                        alert('Ocurrio un error');
                    }
                }, 'json')

            }else{
                alert('Ingrese el Número de Cupon!', 'Ok')
            }
        }

                function __totals() {
                    var total = 0;
                    self.detail.forEach(function (e) {
                        total += e.total;
                    });
                    self.total = total;
                }

                __removeDetail(e)
                {
                    var item = e.item,
                        index = this.detail.indexOf(item);

                    this.detail.splice(index, 1);
                    __totals();
                }

                function __clientAutocomplete() {
                    var client = $("#client"),
                        client_options = {
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
                                    var e = $("#client").getSelectedItemData();
                                    self.client_id = e.id;
                                    self.address = e.direccion;
                                    self.mail = e.email;
                                    self.update();
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
                        };
                    client.easyAutocomplete(client_options);
                }

                function __articleAutocomplete() {
                    var article = $("#product"),
                        article_options = {
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
                                },
                                onClickEvent: function () {
                                    var e = article.getSelectedItemData();
                                    article_id = e.id;
                                    self.price = e.precio_unitario;
                                    cantidad_stock = e.stock;
                                    self.update();
                                }
                            },
                            theme: "bootstrap",
                            ajaxSettings: {
                                dataType: "json",
                                method: "GET",
                                data: {}
                            },
                            preparePostData: function (data) {
                                data.term = $("#product").val();
                                return data;
                            },
                            requestDelay: 400
                        };
                    article.easyAutocomplete(article_options);
                }

                function __paymentAutocomplete() {
                    var pago = $("#payment"),
                        payment_options = {
                            url: "/invoices/payments",
                            getValue: "nombre",

                            list: {
                                match: {
                                    enabled: true
                                },
                                onClickEvent: function () {
                                    var e = pago.getSelectedItemData();
                                    self.payment_id = e.id;
                                    self.payment_nombre = e.nombre;


                                    self.update();
                                }
                            },
                            theme: "bootstrap",
                            ajaxSettings: {
                                dataType: "json",
                                method: "GET",
                                data: {}
                            },
                            preparePostData: function (data) {
                                data.term = $("#payment").val();
                                return data;
                            },
                            requestDelay: 400
                        };
                    pago.easyAutocomplete(payment_options);
                }

    </script>
</invoice>