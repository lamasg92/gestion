<?php

namespace App\Http\Controllers\Report;

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

        dd($request);
    }

}
