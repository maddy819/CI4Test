<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ShopController extends BaseController
{
    public $shopname = "Pet Care";
    public $category;

    public function index()
    {
        //$data = array();
        $data['shopname'] = $this->shopname;
        return view("shop", $data);
    }

    public function category() {
        $this->category = "Animal Toys";
        $data['category'] = $this->category;
        return view("shop-category", $data);
    }
}
