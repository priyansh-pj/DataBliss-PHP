<?php

namespace App\Models;

use CodeIgniter\Model;

class Organization_model extends Model
{
    public function get_org_role($org_id,$uid){
        $query = "SELECT role FROM role WHERE uid = ? AND organization_id = ? ";
        return $this->db->query($query, [$uid,$org_id])->getResult();
    }
    public function get_organization_name($data){
        $query = "SELECT organization_id, organization_name FROM organisation WHERE organization_id IN ($data)";
        return $this->db->query($query)->getResult();
    }

    public function get_uid_from_buffer($current_org_id){
        $query = "SELECT employee_buffer.uid,user_credentials.username,user_credentials.first_name,user_credentials.last_name,user_credentials.contact_no,employee_buffer.organization_id,user_credentials.email
        FROM employee_buffer
        LEFT JOIN user_credentials ON employee_buffer.uid = user_credentials.uid
        WHERE employee_buffer.organization_id = ? ";
        return $this->db->query($query, [$current_org_id])->getResult();
    }
    //public function fetch data from uid updated version of get_uid_from duffer
    //+
    public function fetch_user_data($uid){
        $query="SELECT uid,username,first_name,last_name,contact_no,email,organization_id from user_credentials WHERE uid = ? ";
        return $this->db->query($query, [$uid])->getResult()[0];

    }
    public function insert_employee($user, $data , $org_id,$current_org_id){
        // First, update the organization_id in user_credentials table
        $update_org_query = "UPDATE user_credentials SET organization_id = '$org_id' WHERE uid = $user->uid";
        $this->db->query($update_org_query);

        // Then, execute the INSERT statement for employee table
        $insert_query = "INSERT INTO employee (employee_id, employee_name, email, contact_no, gov_id, address, organization_id, employee_username, role, salary, active) 
            VALUES ('" . $user->uid . "','" . $user->first_name . " " . $user->last_name . "','" . $user->email . "','" . $user->contact_no. "','" . $data['gov_id'] . "','" . $data['address'] . "','" . $current_org_id . "','" . $user->username . "','" . $data['employee_role'] . "','" . $data['salary']."', 1)";
        $this->db->query($insert_query);

        foreach(explode(',',$data['employee_role']) as $role){
            $query_insertion_role = "INSERT INTO role (uid,organization_id,role) VALUES ('". $user->uid."','".$current_org_id."','" . $role . "')";
            $this->db->query($query_insertion_role);
        }

            // If the INSERT query was successful, execute the DELETE statement
        $delete_query = "DELETE FROM employee_buffer WHERE uid IN ( SELECT uid FROM user_credentials WHERE username = '".$user->username."') AND organization_id = '".$current_org_id."'";
        $this->db->query($delete_query);
    }
    public function fetch_employee($org_id){
        $query = "SELECT * FROM `employee` WHERE organization_id = $org_id  AND active =  1 ";
        return  $this->db->query($query)->getResult();
    }
    public function active_to_O($org_id,$emp_id){
        $query ="UPDATE employee SET active = 0 WHERE organization_id = $org_id AND employee_id = $emp_id";
        $this->db->query($query);
    }
    public function update_edit_employee($data,$org_id,$emp_id){

        $query ="UPDATE employee SET role = '{$data['employee_role']}' , gov_id ='{$data['gov_id']}', salary='{$data['salary']}', address='{$data['address']}' WHERE organization_id = $org_id AND employee_id = $emp_id";
        $this->db->query($query);

        $query = "DELETE FROM role WHERE uid = $emp_id AND organization_id = $org_id";
        $this->db->query($query);

        foreach(explode(',',$data['employee_role']) as $role){
            $query = "INSERT INTO role (uid,organization_id,role) VALUES ('". $emp_id."','".$org_id."','" . $role . "')";
            $this->db->query($query);
        }

    }

}   