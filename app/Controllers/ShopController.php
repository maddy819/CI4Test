<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ShopController extends BaseController
{
    public $shopname = "Pet Care";
    public $category;
    public $StripeConfig;

    public function __construct() {
        $this->appConfig = config('app');
        $this->StripeConfig = config('stripe');
    }

    public function index()
    {
        //$data = array();
        $data['shopname'] = $this->shopname;
        $data['stripekey'] = $this->StripeConfig->KEY;
        return view("shop", $data);
    }

    public function category() {
        $this->category = "Animal Toys";
        $data['category'] = $this->category;
        return view("shop-category", $data);
    }
}
