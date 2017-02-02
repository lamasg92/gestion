<?php

namespace App\Http\Controllers\Invoice;

use App\Entities\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {

        //search options
        $invoices = Invoice::name($request->get('numero'))->orderby('id', 'DESC')->paginate();


        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice.create');
    }

    public function store()
    {
        //save invoice info

        //saves invoice_detail info

        //return index

    }


    public function show()
    {
        //showinvoice info
    }


    public function storepdf()
    {
        //save invoice info

        //saves invoice_detail info


        //to pdf
    }





}
