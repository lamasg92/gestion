<?php

namespace App\Http\Controllers\Report;


use App\Entities\Client;
use App\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    public function index(Request $request)
    {

        $report_name = 'report.sales.'. $request->filter . '.index';


        return view($report_name);
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

    public function showuser(Request $request)
    {
        $user_id = $request->input('user_id');

        $invoices = \DB::table('invoices')
            ->select('user_id','id','created_at','total')
            ->where('client_id', "$user_id")
            ->get();

        $user = User::find($user_id);

        return view('report.sales.byuser.show' , compact('invoices', 'user'));
    }
}
