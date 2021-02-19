<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		if($this->session->userdata('userLogged'))
			redirect("/user");

		$this->load->model('AuthModel');	

        $_POST['email'] = 'ypratama41@gmail.com';
        $_POST['password'] ='kokop123';

		if($_POST)
		{
			$params = $this->input->post();
			$data = $this->AuthModel->loginAuth($params);

            if(!empty($data)){
                $session = array(
                        'userLogged' => TRUE,
                        'userId' => $data->id,
                        'fullName' => $data->first_name." ".$data->last_name,
                        'userPhoto' => $data->image
                );
    
                $this->session->set_userdata($session);
                redirect("/user");
            }
            else{
                redirect("/authentication/login");
            }	
		}else
		{
			$this->load->view('public/login/header');
            $this->load->view('public/login/main');
            $this->load->view('public/login/footer');
		}
	}

	public function logout(){

		$this->load->helper('accesscontrol');
		LoggedSystem();

		$this->session->sess_destroy();
		redirect("/authentication/login");
	}

}