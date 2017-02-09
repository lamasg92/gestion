<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 06/02/17
 * Time: 22:13
 */

namespace app\Repositories;


use App\Entities\Client;

class ClientRepository
{

    private $model;

    public function __construct(){
        $this->model = new Client();
    }


}