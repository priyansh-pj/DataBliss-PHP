<?php

namespace App\Models;

use CodeIgniter\Model;

class Billing_model extends Model
{
    public function customer_data($contact,$org_id){
        $query = "SELECT contact_name,contact_email,contact_pincode,gst_number FROM contact_$org_id WHERE contact_phone = $contact ";
        return $this->db->query($query)->getResult();
    }
    public function get_products($org_id){
        $query = "SELECT id,product_name,sku_code,hsn,quantity,price FROM product_$org_id WHERE quantity > 0 ";
        return $this->db->query($query)->getResult();
    }
    public function get_product_details($id,$org_id){
        $query = "SELECT id,product_name,sku_code,hsn,quantity,price,gst FROM product_$org_id WHERE id = $id ";
        return $this->db->query($query)->getResult();
    }
    //data inserstion after billing
    public function insert_contact($data,$org_id){
        $query = "INSERT INTO contact_$org_id (contact_name, contact_phone, contact_email, contact_pincode, gst_number) SELECT '".$data['customer_name']."', '".$data['customer_phone']."', '".$data['customer_email']."', '".$data['customer_pincode']."', '".$data['customer_gstin']."' FROM dual WHERE NOT EXISTS (SELECT 1 FROM contact_$org_id WHERE contact_phone = '".$data['customer_phone']."')";
                $this->db->query($query);
        $query_fetch = "SELECT contact_id FROM contact_$org_id WHERE contact_phone = '".$data['customer_phone']."'";
        return ($this->db->query($query_fetch)->getResult()[0])->contact_id;
    }
    public function insert_sales($data, $contact_id, $org_id) {
        $query = "INSERT INTO sales_$org_id (contact_id, taxable_amount, discount, amount, payment_method, transport_name, transport_number, vehical_number) 
                  VALUES ('".$contact_id."', '".$data['total_tax']."', '".$data['final_discount']."', '".$data['final_total']."', '".$data['payment_mode']."', '".$data['transport_name']."', '".$data['transport_number']."', '".$data['vehical_number']."')";
        $this->db->query($query);
        
        return $this->db->insertID();
    }
    public function insert_sales_log($data,$org_id,$bill_id){
        for($i = 0; $i < (count($data["total"])); $i++){
        $query = "INSERT INTO sales_log_$org_id (sales_id,product_id,quantity,discount,unit_price,gst,price) VALUES ('".$bill_id."','".$data["product"][$i]."','".$data["quantity"][$i]."','".$data["discount"][$i]."','".$data["price"][$i]."','".$data["gst"][$i]."','".$data["total"][$i]."')";
        $this->db->query($query);
            if(is_numeric($data['product'][$i])){
                $query_update = "UPDATE product_$org_id SET quantity = quantity - {$data['quantity'][$i]} WHERE id = {$data['product'][$i]}";
                $this->db->query($query_update);
            }
        }
    }
    public function fetch_bill($org_id){
        $query = "SELECT sales_$org_id.id,contact_$org_id.contact_name,contact_$org_id.contact_phone,contact_$org_id.gst_number,contact_$org_id.contact_pincode,sales_$org_id.discount,sales_$org_id.taxable_amount,sales_$org_id.amount,sales_$org_id.payment_method,sales_$org_id.sales_date FROM sales_$org_id LEFT JOIN contact_$org_id ON contact_$org_id.contact_id = sales_$org_id.contact_id ";
        return $this->db->query($query)->getResult();
    }
    public function invoice_delete($bill_id,$org_id){
        $query1 = "DELETE FROM sales_log_$org_id WHERE sales_id = '$bill_id'";
        $query = "DELETE FROM sales_$org_id WHERE id= '$bill_id'";
        $this->db->query($query1);
        $this->db->query($query);
    }
    public function insert_contact_seller($data,$org_id){
        $query = "INSERT INTO contact_$org_id (contact_name, contact_phone, contact_email, contact_pincode, gst_number) SELECT '".$data['seller_name']."', '".$data['seller_phone']."', '".$data['seller_email']."', '".$data['seller_pincode']."', '".$data['seller_gstin']."' FROM dual WHERE NOT EXISTS (SELECT 1 FROM contact_$org_id WHERE contact_phone = '".$data['seller_phone']."')";
                $this->db->query($query);
        $query_fetch = "SELECT contact_id FROM contact_$org_id WHERE contact_phone = '".$data['seller_phone']."'";
        return ($this->db->query($query_fetch)->getResult()[0])->contact_id;
    }
    public function insert_purchase($data, $contact_id, $org_id) {
        $query = "INSERT INTO purchase_$org_id (contact_id, taxable_amount, discount, amount, payment_method, transport_name, transport_number, vehical_number) 
                  VALUES ('".$contact_id."', '".$data['total_tax']."', '".$data['final_discount']."', '".$data['final_total']."', '".$data['payment_mode']."', '".$data['transport_name']."', '".$data['transport_number']."', '".$data['vehical_number']."')";
        $this->db->query($query);
        
        return $this->db->insertID();
    }

    public function insert_purchase_log($data,$org_id,$bill_id){
        for($i = 0; $i < (count($data["total"])); $i++){
            if(!is_numeric($data['product'][$i])){
                $query_insert_product = "INSERT INTO product_$org_id (product_name,sku_code,hsn,quantity,gst,price) VALUES ('{$data['product'][$i]}', '{$data['sku'][$i]}', '{$data['hsn'][$i]}' ,' {$data['quantity'][$i]}', '{$data['gst'][$i]}', '{$data['price'][$i]}')";
                $this->db->query($query_insert_product);
                $data['product'][$i] = $this->db->insertID();
            }
            else{
                $query_update = "UPDATE product_$org_id SET quantity = quantity + {$data['quantity'][$i]} WHERE id = {$data['product'][$i]}";
                $this->db->query($query_update);
            }
            $query_insert_record = "INSERT INTO purchase_log_$org_id (purchase_id,product_id,quantity,discount,price) VALUES ('{$bill_id}', '{$data['product'][$i]}', '{$data['quantity'][$i]}', '{$data['discount'][$i]}', '{$data['price'][$i]}')";
            $this->db->query($query_insert_record);
        }
    }

    public function fetch_bill_purchase($org_id){
        $query = "SELECT purchase_$org_id.id,contact_$org_id.contact_name,contact_$org_id.contact_phone,contact_$org_id.gst_number,contact_$org_id.contact_pincode,purchase_$org_id.discount,purchase_$org_id.taxable_amount,purchase_$org_id.amount,purchase_$org_id.payment_method,purchase_$org_id.purchase_date FROM purchase_$org_id LEFT JOIN contact_$org_id ON contact_$org_id.contact_id = purchase_$org_id.contact_id ";
        return $this->db->query($query)->getResult();
    }
    public function purchase_delete($bill_id,$org_id){
        $query1 = "DELETE FROM purchase_log_$org_id WHERE purchase_id = '$bill_id'";
        $query = "DELETE FROM purchase_$org_id WHERE id= '$bill_id'";
        $this->db->query($query1);
        $this->db->query($query);
    }
    public function get_invoice($bill_id,$org_id){
        $query = "SELECT sales_{$org_id}.id, contact_{$org_id}.*, sales_{$org_id}.sales_date, sales_{$org_id}.taxable_amount, sales_{$org_id}.discount, sales_{$org_id}.amount, sales_{$org_id}.payment_method, sales_{$org_id}.transport_name, sales_{$org_id}.transport_number, sales_{$org_id}.vehical_number, sales_log_{$org_id}.product_id,sales_log_{$org_id}.quantity,sales_log_{$org_id}.discount,sales_log_{$org_id}.price,product_{$org_id}.product_name,product_{$org_id}.sku_code,product_{$org_id}.hsn,product_{$org_id}.description,sales_log_{$org_id}.gst,sales_log_{$org_id}.unit_price FROM sales_{$org_id} LEFT JOIN contact_{$org_id} ON sales_{$org_id}.contact_id = contact_{$org_id}.contact_id LEFT JOIN sales_log_{$org_id} ON sales_{$org_id}.id = sales_log_{$org_id}.sales_id LEFT JOIN product_{$org_id} ON product_{$org_id}.id = sales_log_{$org_id}.product_id WHERE sales_{$org_id}.id = $bill_id;";
        return $this->db->query($query)->getResult();
    }
}   

// ALTER TABLE `organisation` AUTO_INCREMENT = 1;
// ALTER TABLE `role` AUTO_INCREMENT = 1;