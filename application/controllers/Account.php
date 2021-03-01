<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();

		$this->container['data'] = null;
		$this->load->helper('url');
		$this->load->model('AccountModel');
		LoggedSystem();

		// $this->container['fullName'] = $this->session->userdata('fullName');
		// $this->container['userPhoto'] = $this->session->userdata('userPhoto');
	}

	public function index()
	{
		$this->container["data"] = $this->AccountModel->getAccount();
        $this->load->view('public/template/header', $this->container);
        $this->load->view('public/account/list');
        $this->load->view('public/template/footer');
	}

	public function upsert($id = null){
		$form_title = "Form Input Account";
		// $this->container["data"]["image"] = "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image";

		if($_POST){
			$params = $this->input->post();

			$params['userLog'] = $this->session->userdata('userId');
			$data = $this->AccountModel->upsertAccount($params);

            if($data){
                // $this->session->set_flashdata(array("type" => "success", "msg" => "save data successfully!"));
            }else{
                // $this->session->set_flashdata(array("type" => "warning", "msg" => "save data filed!"));
            }

			redirect('/account');
		}
		else{
			if(!empty($id)){
				$form_title = "Form Update Account";
				$this->container["data"] = $this->AccountModel->getAccountById($id);
			}
			$this->container['form_title'] = $form_title;
			$this->container['id'] = $id;
			
            $this->load->view('public/template/header', $this->container);
            $this->load->view('public/account/form');
            $this->load->view('public/template/footer');
		}
	}

	public function delete($id){
		$data = $this->AccountModel->deleteAccount($id);

		if($data){
            // $this->session->set_flashdata(array("type" => "success", "msg" => "delete data successfully!"));
        }else{
            // $this->session->set_flashdata(array("type" => "warning", "msg" => "delete data filed!"));
        }

		redirect('/account');
	}
}
