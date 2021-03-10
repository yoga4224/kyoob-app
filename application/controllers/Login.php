<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata('userLogged'))
			redirect("/studio");

		$this->load->model('AuthModel');	

		if($_POST)
		{
			$params = $this->input->post();
			$data = $this->AuthModel->loginAuth($params);

            if(!empty($data)){
                $session = array(
                        'userLogged' => TRUE,
                        'userId' => $data->id,
						'accountId' => $data->account_id,
                        'fullName' => $data->first_name." ".$data->last_name
                );
    
                $this->session->set_userdata($session);
                redirect("/studio");
            }else{
                redirect("/login");
            }	
		}else{
            $this->load->view('public/login/index');
		}
	}

	public function logout(){
		$this->load->helper('accesscontrol');
		LoggedSystem();

		$this->session->sess_destroy();
		redirect("/login");
	} 
}