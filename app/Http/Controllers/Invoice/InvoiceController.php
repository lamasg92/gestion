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
    public function show($id)
    {
      return view('invoice.show', [
            'model' => $this->_invoiceRepo->get($id)
        ]);
    }

    public function create(Request $request)
    {

        return view('invoice.create');
    }

    public function store(Request $request)
    {

        $data = (object)[
            'client_id' => $request->input('client_id'),
            'payment_id' => $request->input('payment_id'),
            'total' => $request->input('total'),
            'cupon' => $request->input('cupon'),
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
        return 'print pdf';
    }


}
