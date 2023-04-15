<?php

namespace App\Controllers;
use App\Models\Organization_model;
class Organization extends BaseController
{
    public function __construct()
    {
        $this->organization_model = new Organization_model();
        $this->session = \Config\Services::session();
    }
    public function index(){
        // var_dump($this->session->get());
        // die();
        // $data['profile'] = ($this->session->get('profile'));
        $data['role'] = $this->session->get('role');
        $data['title'] = $this->session->get('organization_name');
        echo view('Templates/header',$data);
        echo view('Templates/footer');
    }
    public function role_verify($organization_id){
        $this->session->set(['org_id' => $organization_id,'organization_name'=> $this->organization_model->get_organization_name($organization_id)[0]->organization_name]);
        $role = $this->organization_model->get_org_role($organization_id,$this->session->get('uid'));
        if (empty($role)){
            echo ("<script> alert('tu hoota kon hai bhai?')</script>");
            return redirect()->to(base_url("databliss/search_organization/"));//Not defined yet
        }
        else {
            $role = $role[0]->role; // we will use if string contains
            $this->session->set(["role"=>$role]);
            return redirect()->to(base_url("databliss/Organization/"));
        }
        // var_dump($role);
        // die();
    }
}
