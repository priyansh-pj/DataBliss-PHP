<?php

namespace App\Controllers;
use App\Models\Inventory_model;
class Inventory extends BaseController
{
    public function __construct(){
        $this->inventory_model = new Inventory_model();
        $this->session = \Config\Services::session();
    }
    public function index(){
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name')." - Inventory";
        $data['details'] = $this->inventory_model->get_products($this->session->get('org_id'));
        $data['org_id'] = $this->session->get('org_id');
        echo view('Templates/header',$data);
        echo view('Inventory/dashboard',$data);
        echo view('Templates/footer');
    }
    public function product_delete($product_id){
        $this->inventory_model->product_delete($product_id,$this->session->get('org_id'));
        return redirect()->to(base_url("databliss/Inventory"));
    }
    public function product_edit($product_id){
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name')." - Inventory > Product Edit";
        $data['product'] = $this->inventory_model->get_details($product_id,$this->session->get('org_id'));
        echo view('Templates/header',$data);
        echo view('Inventory/edit_product',$data);
        echo view('Templates/footer');
    }
    public function update_product(){
        $this->inventory_model->update_product($_POST,$this->session->get('org_id'));
        return redirect()->to(base_url('databliss/Inventory'));
    }
}
