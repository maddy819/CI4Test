<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Orders;

class OrdersController extends BaseController
{
    public $validation;
    public $orders;

    public function __construct() {
        $this->orders = new Orders;
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        return view("orders");
    }

    public function saveOrder() {
        //echo "<pre>";
        //print_r($this->orders->validationRules);
        //exit;

        if(!$this->validate($this->orders->validationRules)){
            return view('orders', [
				'error' => $this->validation->listErrors()
			]);
        }

        $orders = array(
            'product_id' => $this->request->getVar('product_id'), 
            'price' => $this->request->getVar('price'), 
            'qty' => $this->request->getVar('qty')
        );

        if($this->request->getVar('save') == "save_order") {
            if($this->orders->insert($orders)) {
                return view('orders', [
                    'success' => "Order saved successfully"
                ]);
            }
        }
    }
}
