<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();

		$this->container['data'] = null;
		$this->load->helper('accesscontrol');
		$this->load->helper('url');
		$this->load->model('UserModel');
		LoggedSystem();

		$this->container['fullName'] = $this->session->userdata('fullName');
		$this->container['userPhoto'] = $this->session->userdata('userPhoto');
	}

	public function index()
	{
        $this->load->view('public/template/header', $this->container);
        $this->load->view('public/user/list');
        $this->load->view('public/template/footer');
	}

	public function getAjaxData(){

		$responce['data'] = array();
		$responce = json_decode(json_encode($responce));
		$data = $this->UserModel->getUsers();
		// $action = $this->load->helper('action');
		
		if(!empty($data))
		{
			$x = 0;
			
			foreach($data as $row) { 
				$x++;
				$responce->data[] = array(
					// actionClick("influencer/main","upsert","delete",$row->id),
					$row->email,
					$row->first_name." ".$row->last_name
				);
			}
		}

		echo json_encode($responce);
	}

	public function upsert($id = null){
		$form_title = "Form Input User";
		$this->container["data"]["image"] = "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image";

        $_POST['email'] = 'ypratama42@gmail.com';
        $_POST['password'] = 'pass123';
        $_POST['first_name'] = 'Yoga';
        $_POST['last_name'] = 'Pratama';

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
			
            $this->load->view('public/template/header', $this->container);
            $this->load->view('public/user/form');
            $this->load->view('public/template/footer');
		}
	}

	public function delete(){
		$id = $this->input->post('delete_id');

		$data = $this->UserModel->deleteUser($id);

		if($data){
            // $this->session->set_flashdata(array("type" => "success", "msg" => "delete data successfully!"));
        }else{
            // $this->session->set_flashdata(array("type" => "warning", "msg" => "delete data filed!"));
        }

		redirect('/user');
	}
}
