<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 06/02/17
 * Time: 22:15
 */

namespace app\Repositories;


use App\Entities\Article;

class ArticleRepository
{
    private $model;

    public function __construct(){
        $this->model = new Article();
    }


}