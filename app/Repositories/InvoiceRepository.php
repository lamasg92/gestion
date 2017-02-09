<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 06/02/17
 * Time: 22:29
 */

namespace app\Repositories;


use App\Entities\Article;
use App\Entities\Invoice;
use App\Entities\Invoice_Detail;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class InvoiceRepository
{
    private $model;

    public function __construct(){
        $this->model = new Invoice();
    }

    /**
     * find an invoice givin the id
     * @param $id
     * @return mixed
     */
    public function get($id) {
        return $this->model->find($id);
    }

    /**
     * find all invoices
     * @return mixed
     */
    public function getAll() {
        return $this->model->orderBy('id', 'desc')->get();
    }

    /**
     * saves the data to DB
     * @param $data
     * @return string
     */
    public function save($data) {
        $respuesta = (object)[
            'response' => false
        ];


        try {
            DB::beginTransaction();

                $this->model->client_id = $data->client_id;
                $this->model->payment_id = $data->payment_id;
                $this->model->cupon = $data->cupon;
                $this->model->total = $data->total;
                $this->model->user_id = Auth::id();;
                $this->model->save();

                $detail = [];

                foreach($data->detail as $d) {
                    $obj = new Invoice_Detail();
                    $obj->cantidad = $d->cantidad;
                    $obj->article_id = $d->article_id;
                    $obj->precio = $d->precio;
                    $obj->total_line = $d->total_line;

                    $article = Article::findOrFail($d->article_id);
                    $article->stock = $article->stock - $d->cantidad;;
                    $article->save();

                    $detail[] = $obj;
                }
                $this->model->invoice_details()->saveMany($detail);

            $respuesta->response = true;

            DB::commit();

        } catch (Exception $e){
            DB::rollBack();
        }

        return json_encode($respuesta);
    }

}