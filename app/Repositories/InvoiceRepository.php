<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 06/02/17
 * Time: 22:29
 */

namespace app\Repositories;


use App\Entities\Invoice;
use App\Entities\Invoice_Detail;
use DB;

class InvoiceRepository
{
    private $model;

    public function __construct(){
        $this->model = new Invoice();
    }
    public function get($id) {
        return $this->model->find($id);
    }
    public function getAll() {
        return $this->model->orderBy('id', 'desc')->get();
    }
    public function save($data) {
        $return = (object)[
            'response' => false
        ];
        try {
            DB::beginTransaction();
            $this->model->total = $data->total;
            $this->model->client_id = $data->client_id;
            $this->model->save();
            $detail = [];
            foreach($data->detail as $d) {
                $obj = new Invoice_Detail();
                $obj->article_id = $d->article_id;
                $obj->cantidad = $d->quantity;
                $obj->precio = $d->price;
                $obj->total_line = $d->total;
                $detail[] = $obj;
            }
            $this->model->detail()->saveMany($detail);
            $return->response = true;
            DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
        }
        return json_encode($return);
    }

}