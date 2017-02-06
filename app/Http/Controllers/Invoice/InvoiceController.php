<?php

namespace App\Http\Controllers\Invoice;

use App\Entities\{
    Article, Invoice, Payment, User
};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        //search options
        $invoices = Invoice::name($request->get('numero'))->orderby('id', 'DESC')->paginate();
        return view('invoice.index', compact('invoices'));
    }

    public function create(Request $request)
    {
        //search options
        $payments =  Payment::pluck('nombre', 'id');

        return view('invoice.create', compact('payments'));
    }

    public function store(Request $request)
    {
        //['numero', 'fecha', 'client_id', 'user_id', 'payment_id', 'cupon', 'total'];
      //  ['invoice_id', 'cantidad', 'article_id', 'precio', 'total_line'];

        $data = (object)[
            'total' => $request->input('total'),
            'client_id' => $request->input('client_id'),
            'payment_id' => $request->input('payment_id'),
            'detail' => []
        ];
        foreach($request->input('detail') as $d){
            $data->detail[] = (object)[
                'product_id' => $d['id'],
                'cantidad'   => $d['quantity'],
                'precio_unitario'  => $d['price'],
                'total'      => $d['total']
            ];
        }

    }

}
