<?php

namespace App\Http\Controllers\Invoice;

use App\Entities\{
     Invoice, Payment
};

use App\Http\Controllers\Controller;
use App\Repositories\{ArticleRepository, ClientRepository, InvoiceRepository}   ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth,
    App\Http\Requests,
    PDF;

class InvoiceController extends Controller
{
    private $_clientRepo;
    private $_productRepo;


    //  InvoiceRepository $invoiceRepo
    public function __CONSTRUCT(ClientRepository $clientRepo, ArticleRepository $articleRepo, InvoiceRepository $invoiceRepo  )
    {
        $this->_clientRepo = $clientRepo;
        $this->_articleRepo = $articleRepo;
        $this->_invoiceRepo = $invoiceRepo;
    }

    public function index(Request $request)
    {
        return view(
            'invoice.index', [
                'model' => $this->_invoiceRepo->getAll()
            ]
        );
        //search options
//        $invoices = Invoice::name($request->get('numero'))->orderby('id', 'DESC')->paginate();
//        return view('invoice.index', compact('invoices'));
    }


    //shows detail of invoice row
    public function detail($id)
    {
        return view('invoice.detail', [
            'model' => $this->_invoiceRepo->get($id)
        ]);
    }

    public function create(Request $request)
    {

        return view('invoice.create');
    }

    public function store(Request $request)
    {

//        client_id:3
//payment_id:2
//total:135894.2
//cupon:123355sss
//detail[0][id]:1

        //'client_id', 'user_id', 'payment_id', 'cupon', 'total

        $userId = Auth::user()->id;

        $data = (object)[
            'iva' => $request->input('iva'),
            'subTotal' => $request->input('subTotal'),
            'total' => $request->input('total'),
            'client_id' => $request->input('client_id'),
            'detail' => []
        ];
        foreach($request->input('detail') as $d){
            $data->detail[] = (object)[
                'article_id' => $d['id'],
                'cantidad'   => $d['quantity'],
                'precio'  => $d['price'],
                'total_line'      => $d['total']
            ];
        }
        return $this->_invoiceRepo->save($data);
    }


    public function topdf($id)
    {
//        $model = $this->_invoiceRepo->get($id);
//        $invoice_name = sprintf('comprobante-%s.pdf', str_pad ($model->id, 7, '0', STR_PAD_LEFT));
//        $pdf = PDF::loadView('invoice.pdf', [
//            'model' => $model
//        ]);
//        return $pdf->download($invoice_name);
        return 'gola pdf';
    }


}
