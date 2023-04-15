<?php

namespace App\Models;

use CodeIgniter\Model;

class Credentials_model extends Model
{
    public function get_info_username($username){
        $query = "SELECT password FROM login WHERE username = ? ";
        return $this->db->query($query, [$username])->getResult();
    }
    public function get_info_email($email){
        $query = "SELECT password FROM login WHERE email = ? ";
        return $this->db->query($query, [$email])->getResult();
    }
    public function register_user($data){
        $query = "INSERT INTO user_credentials (username, first_name, last_name, email, contact_no) VALUES(?, ?, ?, ?, ?)";
        $this->db->query($query, [$data['username'], reset($data['name']), end($data['name']), $data['email'],$data['contact']]);

        $query_login = "INSERT INTO login (username, email, password) VALUES (?, ?, ?)";
        $this->db->query($query_login, [$data['username'], $data['email'], $data['password']]);

    }

    public function get_uid($username){
        $query = "SELECT uid FROM user_credentials WHERE username = ?";
        return $this->db->query($query, [$username])->getResult();
    }
    public function get_organization($username){
        $query = "SELECT organization_id FROM user_credentials WHERE username = ?";
        return $this->db->query($query, [$username])->getResult();
    }
    public function get_profile($username){
        $query = "SELECT uid,username,first_name,last_name,email,contact_no FROM user_credentials WHERE username = ?";
        return $this->db->query($query, [$username])->getResult();
    }

    public function insert_organization($data){
        $query = "INSERT INTO organisation (organization_name,gst_id,contact_no,email,address,city,state,pincode) VALUES ('".$data['org_name']."','".$data['org_gstin']."','".$data['org_phone']."','".$data['org_email']."','".$data['org_address']."','".strtolower($data['org_city'])."','".strtolower($data['org_state'])."','".$data['org_pincode']."')";
        $this->db->query($query);
    }
    public function find_org_id($data){
        $query = "SELECT organization_id from organisation where " . ($data['org_gstin'] ? "gst_id = '{$data['org_gstin']}' AND " : "") . "organization_name = '{$data['org_name']}' AND contact_no = '{$data['org_phone']}' AND email = '{$data['org_email']}' AND address = '{$data['org_address']}' AND pincode = '{$data['org_pincode']}'";
        return $this->db->query($query)->getResult();
    }
    public function create_organization_role($org_id,$uid){
        $query_insertion = "INSERT INTO role (uid,organization_id,role) VALUES ('".$uid."','".$org_id."','OWNER')";
        $select = "SELECT uid,username,first_name,last_name,email,contact_no,organization_id FROM user_credentials WHERE uid = $uid";
        $this->db->query($query_insertion);
        return $this->db->query($select)->getResult();
    }
    public function set_up_new_organization($org_id){
        $table = array(
            "purchase_".$org_id,
            "purchase_log_".$org_id,
            "sales_".$org_id,
            "sales_log_".$org_id,
            "product_".$org_id,
            "expense_".$org_id,
            "contact_".$org_id,
        );
        
        $purchase_org_id = "CREATE TABLE $table[0] (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            contact_id int(50) NOT NULL,
            purchase_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            taxable_amount DECIMAL(10,2),
            discount DECIMAL(10,0),
            amount DECIMAL(10,2) NOT NULL,
            payment_method VARCHAR(20),
            transport_name VARCHAR(50),
            transport_number VARCHAR(20),
            vehical_number VARCHAR(20)
        )";
        
        $purchase_log_org_id = "CREATE TABLE $table[1] (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            purchase_id INT NOT NULL,
            product_id VARCHAR(100) NOT NULL,
            quantity INT NOT NULL,
            discount DECIMAL(5,2),
            price DECIMAL(10,2) NOT NULL
        )";
        
        $sales_org_id = "CREATE TABLE $table[2] (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            contact_id int(50) NOT NULL,
            sales_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            taxable_amount DECIMAL(10,2),
            discount DECIMAL(10,0),
            amount DECIMAL(10,2) NOT NULL,
            payment_method VARCHAR(20),
            transport_name VARCHAR(50),
            transport_number VARCHAR(20),
            vehical_number VARCHAR(20)
        )";
        
        $sales_log_org_id = "CREATE TABLE $table[3] (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            sales_id INT NOT NULL,
            product_id VARCHAR(100) NOT NULL,
            quantity INT NOT NULL,
            discount DECIMAL(5,2),
            price DECIMAL(10,2) NOT NULL
        )";
        
        $product_org_id = "CREATE TABLE $table[4] (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            product_name VARCHAR(50) NOT NULL,
            sku_code VARCHAR(50),
            hsn VARCHAR(50),
            description VARCHAR(255),
            quantity INT NOT NULL,
            gst INT(11),
            price BIGINT(20)
        )";
        
        $expense_org_id = "CREATE TABLE $table[5] (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            expense_name VARCHAR(50) NOT NULL,
            expense_type VARCHAR(50) NOT NULL,
            amount DECIMAL(10,2) NOT NULL
        )";
        $contact_org_id = "CREATE TABLE $table[6] (
            contact_id INT AUTO_INCREMENT PRIMARY KEY,
            contact_name VARCHAR(50) NOT NULL,
            contact_email VARCHAR(100) NOT NULL,
            contact_phone VARCHAR(20),
            contact_pincode int(11),
            gst_number VARCHAR(20)
        )";
        
        $this->db->query($purchase_org_id);
        $this->db->query($purchase_log_org_id);
        $this->db->query($sales_org_id);
        $this->db->query($sales_log_org_id);
        $this->db->query($product_org_id);
        $this->db->query($expense_org_id);
        $this->db->query($contact_org_id);
    }
    public function update_organization($org_id,$uid){
        $query = "UPDATE `user_credentials` SET `organization_id` = '$org_id' WHERE `user_credentials`.`uid` = $uid"; //error
        $this->db->query($query);
    }
    public function get_name($data){
        
        $query = "SELECT organization_id, organization_name FROM organisation WHERE organization_id IN ($data)";
        return $this->db->query($query)->getResult();
    }
    public function all_org_name(){
        $query = "SELECT organization_id, organization_name FROM organisation";
        return $this->db->query($query)->getResult();
        
    }
    public function employee_request_buffer($organization_id, $sender_uid) {
        $query = "INSERT INTO employee_buffer (uid, organization_id) SELECT ?, organisation.organization_id FROM organisation WHERE organisation.organization_id = ?";
         $this->db->query($query, [$sender_uid, $organization_id]);
    }
}   