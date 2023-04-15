<?php

namespace App\Controllers;
use App\Models\Billing_model;
class Billing extends BaseController
{
    public function __construct(){
        $this->billing_model = new Billing_model();
        $this->session = \Config\Services::session();
    }
    public function index(){
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name')." - Billing";
        echo view('Templates/header',$data);
        echo view('Billing/dashboard',$data);
        echo view('Templates/footer');
    }

    public function fetch_details(){
        if(isset($_GET['customer_phone'])){
            $customer = $this->billing_model->customer_data($_GET['customer_phone'],$this->session->get('org_id'))[0];
        }
        else{
            $customer = $this->billing_model->customer_data($_GET['seller_phone'],$this->session->get('org_id'))[0];
        }
        return $this->response->setJSON($customer);
    }
    public function fetch_products(){
        $products = $this->billing_model->get_products($this->session->get('org_id'));
        return $this->response->setJSON($products);
    }
    public function get_product_details(){
        $products = $this->billing_model->get_product_details($_GET['product_id'],$this->session->get('org_id'))[0];
        return $this->response->setJSON($products);
    }
    // Invoicing
    public function generate_invoice(){
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name')." - Billing > Generate Invoice";
        echo view('Templates/header',$data);
        echo view('Billing/generate_invoice');
        echo view('Templates/footer');
    }
    public function invoice_data(){
        
        $contact_id = $this->billing_model->insert_contact($_POST,$this->session->get('org_id'));
        $bill_id = $this->billing_model->insert_sales($_POST,$contact_id,$this->session->get('org_id'));
        $this->billing_model->insert_sales_log($_POST,$this->session->get('org_id'),$bill_id);
        // echo "<pre>";
        // var_dump($_POST);
        // var_dump($this->session->get());
        // var_dump($bill_id);
        // die();
        return redirect()->to(base_url("databliss/Billing/print_invoice/$bill_id"));
    }
    public function invoice_history(){
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name')." - Billing > Invoice History";
        $bills_details['details'] = $this->billing_model->fetch_bill($this->session->get('org_id'));
        // echo "<pre>";
        // var_dump($bills_details);
        // die();
        echo view('Templates/header',$data);
        echo view('Billing/invoice_history',$bills_details);
        echo view('Templates/footer');
    }

    public function invoice_delete($bill_id){
        $this->billing_model->invoice_delete($bill_id,$this->session->get('org_id'));
        return redirect()->to(base_url('databliss/Billing/Invoice_history/'));
    }
    public function invoice_print($bill_id){
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name')." - Billing > Invoice History";

        echo view('Templates/header',$data);
        echo view('Billing/invoice_edit');
        echo view('Templates/footer');
    }

    // Purchasing
    public function enter_purchase_invoice(){
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name')." - Billing > Enter Purchase Invoice";
        echo view('Templates/header',$data);
        echo view('Billing/purchase_invoice');
        echo view('Templates/footer');
    }
    public function purchase_data(){
        $contact_id = $this->billing_model->insert_contact_seller($_POST,$this->session->get('org_id'));
        $bill_id = $this->billing_model->insert_purchase($_POST,$contact_id,$this->session->get('org_id'));
        $this->billing_model->insert_purchase_log($_POST,$this->session->get('org_id'),$bill_id);
        return redirect()->to(base_url("databliss/Billing/Enter_purchase_invoice"));
    }
    public function purchase_history(){
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name')." - Billing > Purchase History";
        $purchase_details['details'] = $this->billing_model->fetch_bill_purchase($this->session->get('org_id'));

        echo view('Templates/header',$data);
        echo view('Billing/purchase_history',$purchase_details);
        echo view('Templates/footer');
    }
    public function purchase_delete($bill_id){
        $this->billing_model->purchase_delete($bill_id,$this->session->get('org_id'));
        return redirect()->to(base_url('databliss/Billing/Purchase_history/'));
    }
    public function print_invoice($bill_id){
        $data['bill'] = $this->billing_model->get_invoice($bill_id,$this->session->get('org_id'));
        // echo '<pre>';
        // var_dump($data['bill']);
        // die();
        echo view('Billing/invoice_preview',$data);
    }
}
