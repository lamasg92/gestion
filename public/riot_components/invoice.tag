<invoice>
    <div class="well well-sm">
        <div class="row">
            <div class="col-xs-4">
                <input id="client" class="form-control typeahead" type="text" placeholder="Cliente" />
            </div>
            <div class="col-xs-5">
                <input class="form-control" type="text" placeholder="Direccion" readonly value="{direccion}" />
            </div>
            <div class="col-xs-3">
                <input class="form-control" type="text" placeholder="Email" readonly value="{email}" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-7">
            <input id="article" class="form-control" type="text" placeholder="Nombre del articulo" />
        </div>
        <div class="col-xs-2">
            <input id="cantidad" class="form-control" type="text" placeholder="Cantidad" />
        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Precio" value="{precio }" readonly />
            </div>
        </div>
        <div class="col-xs-1">
            <button onclick={__addProductoToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <hr />

    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Producto</th>
            <th style="width:100px;">Cantidad</th>
            <th style="width:100px;">P.U</th>
            <th style="width:100px;">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail}>
            <td>
                <button onclick={__removeProductFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{name}</td>
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

    <button if={detail.length > 0 && client_id > 0} onclick={__save} class="btn btn-default btn-lg btn-block">
        Guardar
    </button>

    <script>
        var self = this;

        // Detalle del comprobante
        self.client_id = 0;
        self.detail = [];
        self.total = 0;

        self.on('mount', function(){
            clientAutocomplete();
            articleAutocomplete();
        })

        __removeProductFromDetail(e) {
            var item = e.item,
                index = this.detail.indexOf(item);

            this.detail.splice(index, 1);
            __calculate();
        }

        __addProductoToDetail() {
            self.detail.push({
                id: self.product_id,
                name: self.product.value,
                quantity: parseFloat(self.quantity.value),
                price: parseFloat(self.price),
                total: parseFloat(self.price * self.quantity.value)
            });

            self.product_id = 0;
            self.product.value = '';
            self.quantity.value = '';
            self.price = '';

            __calculate();
        }

        __save() {
            $.post(baseUrl('invoice/save'), {
                client_id: self.client_id,
                total: self.total,
                detail: self.detail
            }, function(r){
                if(r.response) {
                    window.location.href = baseUrl('invoice');
                } else {
                    alert('Ocurrio un error');
                }
            }, 'json')
        }

        function __calculate() {
            var total = 0;

            self.detail.forEach(function(e){
                total += e.total;
            });

            self.total = total;
        }

        function clientAutocomplete(){
            var client = $("#client"),
                options = {
                    url: "/invoices/clients",
                getValue: 'name',
                list: {
                    onClickEvent: function() {
                        var client = client.getSelectedItemData();
                        self.client_id = client.id;
                        self.ruc = client.direccion;
                        self.address = client.email;

                        self.update();
                    }
                }
            };

            client.easyAutocomplete(options);
        }

        function articleAutocomplete(){
            var articulo = $("#article"),
                options = {
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
                    onClickEvent: function() {
                        var art = articulo.getSelectedItemData();
                        self.product_id = art.id;
                        self.precio = art.precio_unitario;

                        self.update();
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
                        data.term = $("#article").val();
                        return data;
                    },
                    requestDelay: 400
            };

            articulo.easyAutocomplete(options);
        }
    </script>
</invoice>