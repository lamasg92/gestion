<?php

namespace App\Http\Controllers\Invoice;

use App\Entities\{Article, Invoice, User};
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

    public function articles(Request $request)
    {
        $term = Request::get('term');

        return Article::findByNameorDescription($term);

    }

    public function user(Request $request)
    {
        $term = Request::get('term');

        return User::findByNameorUserName($term);
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
