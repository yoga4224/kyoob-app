<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterTemplate extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();

		$this->container['data'] = null;
		$this->load->helper('url');
		$this->load->model('MasterTemplateModel');
		LoggedSystem();

		// $this->container['fullName'] = $this->session->userdata('fullName');
		// $this->container['userPhoto'] = $this->session->userdata('userPhoto');
	}

	public function index()
	{
		$this->container["data"] = $this->MasterTemplateModel->getMasterTemplate();
        $this->load->view('public/template/header', $this->container);
        $this->load->view('public/masterTemplate/list');
        $this->load->view('public/template/footer');
	}

	public function upsert($id = null){
		$form_title = "Form Input MasterTemplate";
		$this->container["image"] = "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image";

		if($_POST){
			$params = $this->input->post();

			$params['userLog'] = $this->session->userdata('userId');
			$data = $this->MasterTemplateModel->upsertMasterTemplate($params);

            if($data){
                // $this->session->set_flashdata(array("type" => "success", "msg" => "save data successfully!"));
            }else{
                // $this->session->set_flashdata(array("type" => "warning", "msg" => "save data filed!"));
            }

			redirect('/masterTemplate');
		}
		else{
			if(!empty($id)){
				$form_title = "Form Update MasterTemplate";
				$this->container["data"] = $this->MasterTemplateModel->getMasterTemplateById($id);
				$this->container["image"] = base_url()."assets/images/icon_template/".$this->container["data"]->icon_template;
			}
			$this->container['form_title'] = $form_title;
			$this->container['id'] = $id;
			
            $this->load->view('public/template/header', $this->container);
            $this->load->view('public/masterTemplate/form');
            $this->load->view('public/template/footer');
		}
	}

	public function delete($id){
		$data = $this->MasterTemplateModel->deleteMasterTemplate($id);

		if($data){
            // $this->session->set_flashdata(array("type" => "success", "msg" => "delete data successfully!"));
        }else{
            // $this->session->set_flashdata(array("type" => "warning", "msg" => "delete data filed!"));
        }

		redirect('/mastertemplate');
	}
}
