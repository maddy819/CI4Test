<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Orders;

class OrdersController extends BaseController
{
    public $validation;
    public $orders;
    public $data;
    public $session;

    public function __construct() {
        $this->session = session();
        $this->orders = new Orders;
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $this->data['save'] = "save_order";
        $this->data['orders'] = $user = $this->orders->find();
        return view("orders", $this->data);
    }

    public function saveOrder() {
        // echo "<pre>";
        // print_r($this->orders->validationRules);
        // exit;

        if(!$this->validate($this->orders->validationRules)){
            //return view('orders', ['error' => $this->validation->listErrors()]);
            $this->session->setFlashdata('error', $this->validation->listErrors());
            return redirect()->back();
        }

        $orders = array(
            'product_id' => $this->request->getVar('product_id'), 
            'price' => $this->request->getVar('price'), 
            'qty' => $this->request->getVar('qty')
        );

        if($this->request->getVar('save') == "save_order") {
            if($this->orders->insert($orders)) {
                $this->session->setFlashdata('success', "Order Placed Successfully.");
                return redirect()->back();
            }
        }

        if($this->request->getVar('save') == "update_order") {
            $id = $this->request->getVar('id');

            if($this->orders->update($id, $orders)) {
                $this->session->setFlashdata('success', "order updated successfully");
                return redirect()->back();
            }
        }
    }

    public function editOrder($orderId) {
        $this->data['save'] = "update_order";
        $this->data['orders'] = $this->orders->find();
        $this->data['order'] = $this->orders->find($orderId);
        return view("orders", $this->data);
    }

    public function deleteOrder($orderId) {
        $this->orders->delete($orderId);
        $this->session->setFlashdata('success', "order deleted successfully");
        return redirect()->back();
    }
}
