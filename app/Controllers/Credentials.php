<?php

namespace App\Controllers;
use App\Models\Credentials_model;
class Credentials extends BaseController
{
    public function __construct()
    {
        $this->credentials_model = new Credentials_model();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $this->session->destroy();
        echo view('Credentials/login');
    }
    public function login_check(){
        $encryption = \Config\Services::encryption(); 
        $hash = ($this->credentials_model->get_info_username($_POST['username']))[0]->password;
        if (!empty($hash) && password_verify($_POST['password'], $hash)) {
            $this->session->set(["password_check" => true,"username"=>$_POST['username'],"uid"=>($this->credentials_model->get_uid($_POST['username'])[0]->uid),"profile"=>($this->credentials_model->get_profile($_POST['username']))[0]]);
            return redirect()->to(base_url('databliss/organization_verify/'.$_POST['username']));
        } else {
            echo 'Password is incorrect';
        }
        
    }
    public function register(){
        $_POST['name'] = explode(' ',$_POST['name']);
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);
        // var_dump($_POST);
        // die();
        $this->credentials_model->register_user($_POST);
        $this->session->set(["password_check" => true,"username"=>$_POST['username'],"uid"=>($this->credentials_model->get_uid($_POST['username'])[0]->uid),"role"=>"","profile"=>($this->credentials_model->get_profile($_POST['username']))[0]]);
        return redirect()->to(base_url('databliss/organization_verify/'.$_POST['username']));
    }
    public function organization_verify($username){
        // var_dump($this->session->get());
        // die();
        if($this->session->get("password_check")){
            $organizations = ($this->credentials_model->get_organization($username))[0]->organization_id;
            $data['organization'] = ($organizations)? explode(",",$organizations) : [];
            // print_r ($organizations);
            // die();
            if (!empty($data['organization'])){
                $data['organization'] = $this->credentials_model->get_name($organizations);
            }
            
            $data['profile'] = $this->session->get('profile');
            $data['title'] = 'Organization';
            $this->session->set(['role'=>""]);
            $data['role'] = "";
            // var_dump($data);
            // die();
            echo view('Templates/header',$data);
            echo view('Credentials/organization_select',$data);
            echo view('Templates/footer');
        }
        else{
            redirect(base_url("databliss/login"));
        }
    }
    public function organization_make(){
        $data['profile'] = ($this->session->get('profile'));
        $data['title'] = 'Create Organization';
        $data['role'] = $this->session->get('role');
        echo view('Templates/header',$data);
        echo view('Credentials/organization_make');
        echo view('Templates/footer');
    }
    public function organization_create(){
        $this->credentials_model->insert_organization($_POST);
        $org_id = $this->credentials_model->find_org_id($_POST)[0]->organization_id;
        $uid = $this->session->get('uid');
        $prev_org_id = ($this->credentials_model->create_organization_role($org_id,$uid)[0]->organization_id) ? $this->credentials_model->create_organization_role($org_id,$uid)[0]->organization_id : "";
        $this->credentials_model->set_up_new_organization($org_id);
        $org_id = empty($prev_org_id) ? "$org_id" : "$prev_org_id".","."$org_id";
        $this->credentials_model->update_organization($org_id,$uid);
        return redirect()->to(base_url('databliss/organization_verify/'.$this->session->get('username')));
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('databliss/login/'));
    }
    public function search_organization(){
        $data['profile'] = ($this->credentials_model->get_profile($this->session->get('username')))[0];
        $data['title'] = 'Search Organization';
        $data['role'] = $this->session->get('role');
        $data1['organizations'] = $this->credentials_model->all_org_name();
        echo view('Templates/header',$data);
        echo view('Credentials/search_organization',$data1);
        echo view('Templates/footer');
    }
    public function employee_request(){
        $this->credentials_model->employee_request_buffer($_POST['organization_id'], $this->session->get('uid'));
        return redirect()->to(base_url('databliss/search_organization'));
    }

}
