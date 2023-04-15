<?php

namespace App\Controllers;
use App\Models\Organization_model;
use App\Models\Credentials_model;

class Owner extends BaseController
{
    public function __construct()
    {
        $this->credentials_model = new Credentials_model();
        $this->Organization_model = new Organization_model();
        $this->session = \Config\Services::session();
        helper('request');
    }

    //+
    public function add_employee_request(){
        $data['profile'] = ($this->credentials_model->get_profile($this->session->get('username')))[0];
        $data['title'] = $this->session->get('organization_name');
        $data['role'] = $this->session->get('role');
        $data["data"]= $this->Organization_model->get_uid_from_buffer($this->session->get('org_id'));
        if(empty($data["data"])) {
                 echo view('Templates/header',$data);
                 echo view('Templates/footer');
            }
        else {
                echo view('Templates/header',$data);
                echo view('Owner/add_employee',$data);
                echo view('Templates/footer');
        }  
    }
    //+
    public function add_employee($uid){
        $data['profile'] = ($this->credentials_model->get_profile($this->session->get('username')))[0];
        $data['title'] = 'Add Employee details';
        $data['role'] = $this->session->get('role');
        $data['uid'] = $uid;
        echo view('Templates/header',$data);
        echo view('Owner/employee_add_details');
        echo view('Templates/footer');
    }
    

    public function insert_employee(){
        $data['profile'] = ($this->credentials_model->get_profile($this->session->get('username')))[0];
        $data['title'] =  $this->session->get('organization_name');
        $data['role'] = $this->session->get('role');
        $user =$this->Organization_model->fetch_user_data($_POST['uid']);
        $org_id_formate = empty($user->organization_id) ? $this->session->get('org_id') : $user->organization_id.",".$this->session->get('org_id'); 
        // var_dump($org_id_formate);
        // var_dump($_POST);
        // var_dump($org_id_formate);
        // die();
        $this->Organization_model->insert_employee($user ,$_POST,$org_id_formate,$this->session->get('org_id')); 
        return redirect()->to(base_url('databliss/employee_list'));
    }
    public function emp_list(){
        $data['profile'] = ($this->credentials_model->get_profile($this->session->get('username')))[0];
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name');
        $data["emp_detail"] = $this->Organization_model->fetch_employee($this->session->get('org_id'));
        echo view('Templates/header',$data);
        echo view('Owner/emp_list',$data);
        echo view('Templates/footer');

    }






    public function employee_management(){
        $data['profile'] = ($this->credentials_model->get_profile($this->session->get('username')))[0];
        $data['title'] = 'Employee Management';
        $data['role'] = $this->session->get('role');
        echo view('Templates/header',$data);
        echo view('Owner/emp_management');
        echo view('Templates/footer');
    }
    
    
    
    public function terminate_employee_list(){
        $data['profile'] = ($this->credentials_model->get_profile($this->session->get('username')))[0];
        $data['title'] = $this->session->get('organization_name');
        $data['role'] = $this->session->get('role');
        $data["emp_detail"] = $this->Organization_model->fetch_employee($this->session->get('org_id'));

        echo view('Templates/header',$data);
        echo view('Owner/terminate_emp', $data);
        echo view('Templates/footer');
    }


    public function terminate_employee($emp_id){ 
        $data['title'] = $this->session->get('organization_name');
        $this->Organization_model->active_to_O($this->session->get("org_id"), $emp_id);
        return redirect()->to(base_url('/databliss/Owner/terminate_employee_list'));
    }
      
    public function access_employee_list(){

        $data['profile'] = ($this->credentials_model->get_profile($this->session->get('username')))[0];
        $data['title'] = $this->session->get('organization_name');
        $data['role'] = $this->session->get('role');
        $data["emp_detail"] = $this->Organization_model->fetch_employee($this->session->get('org_id'));
        echo view('Templates/header',$data);
        echo view('Owner/role_manage',$data);
        echo view('Templates/footer');
    }

    public function edit_employee($emp_id){
        $data['profile'] = ($this->credentials_model->get_profile($this->session->get('username')))[0];
        $data['title'] = $this->session->get('organization_name');
        $data['role'] = $this->session->get('role');
        $data['emp_id'] = $emp_id;
        echo view('Templates/header',$data);
        echo view('Owner/edit_employee',$data);
        echo view('Templates/footer');
    }

    public function update_employee($emp_id){
        $this->Organization_model->update_edit_employee($_GET,$this->session->get("org_id"),$emp_id);
        return redirect()->to(base_url('/databliss/Owner/access_employee_list'));
    }

    

}
