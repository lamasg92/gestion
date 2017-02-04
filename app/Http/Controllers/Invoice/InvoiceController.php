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
        $payments = Payment::all();

        return view('invoice.create', compact('payments'));
    }

    public function store(Request $request)
    {
    }

}
