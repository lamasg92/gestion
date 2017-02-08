<?php

namespace App\Http\Controllers\Report;


use App\Entities\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    public function index()
    {

        return view('report.sales.byclient.index');
    }

    public function show(Request $request)
    {
        $client_id = $request->input('client_id');

        $invoices = \DB::table('invoices')
            ->select('client_id','id','created_at','total')
            ->where('client_id', "$client_id")
            ->get();

        $cliente = Client::find($client_id);

        return view('report.sales.byclient.show' , compact('invoices', 'cliente'));
    }

}
