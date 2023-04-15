<?php

namespace App\Models;

use CodeIgniter\Model;

class Inventory_model extends Model
{
    public function get_products($org_id){
        $query = "SELECT * FROM product_$org_id";
        return $this->db->query($query)->getResult();
    }
    public function product_delete($product_id,$org_id){
        $query = "DELETE FROM product_$org_id WHERE id = $product_id";
        $this->db->query($query);
    }   
    public function get_details($product_id,$org_id){
        $query = "SELECT * FROM product_$org_id WHERE id = $product_id";
        return $this->db->query($query)->getResult()[0];
    }
    public function update_product($data,$org_id){
        $query = "UPDATE product_$org_id SET product_name = '{$data['product_name']}', sku_code = '{$data['sku_code']}', hsn = '{$data['hsn']}', description = '{$data['description']}', quantity = '{$data['quantity']}', gst = '{$data['gst']}', price = '{$data['price']}' WHERE id = {$data['id']}";
        $this->db->query($query);
    }
    
}   