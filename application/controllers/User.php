<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();

		$this->container['data'] = null;
		$this->load->helper('url');
		$this->load->model('UserModel');
		LoggedSystem();

		// $this->container['fullName'] = $this->session->userdata('fullName');
		// $this->container['userPhoto'] = $this->session->userdata('userPhoto');
	}

	public function index()
	{
		$this->container["data"] = $this->UserModel->getUser();
        $this->load->view('public/template/header', $this->container);
        $this->load->view('public/user/list');
        $this->load->view('public/template/footer');
	}

	public function upsert($id = null){
		$form_title = "Form Input User";
		// $this->container["data"]["image"] = "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image";

		if($_POST){
			$params = $this->input->post();

			$params['userLog'] = $this->session->userdata('userId');
			$data = $this->UserModel->upsertUser($params);

            if($data){
                // $this->session->set_flashdata(array("type" => "success", "msg" => "save data successfully!"));
            }else{
                // $this->session->set_flashdata(array("type" => "warning", "msg" => "save data filed!"));
            }

			redirect('/user');
		}
		else{
			if(!empty($id)){
				$form_title = "Form Update User";
				$this->container["data"] = $this->UserModel->getUserById($id);
			}
			$this->container['form_title'] = $form_title;
			$this->container['id'] = $id;
			$this->container['account'] = $this->UserModel->getAccount();
			
            $this->load->view('public/template/header', $this->container);
            $this->load->view('public/user/form');
            $this->load->view('public/template/footer');
		}
	}

	public function delete($id){
		$data = $this->UserModel->deleteUser($id);

		if($data){
            // $this->session->set_flashdata(array("type" => "success", "msg" => "delete data successfully!"));
        }else{
            // $this->session->set_flashdata(array("type" => "warning", "msg" => "delete data filed!"));
        }

		redirect('/user');
	}
}
