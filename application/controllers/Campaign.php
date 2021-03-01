<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();

		$this->container['data'] = null;
		$this->load->helper('url');
		$this->load->model('CampaignModel');
		LoggedSystem();

		// $this->container['fullName'] = $this->session->userdata('fullName');
		// $this->container['userPhoto'] = $this->session->userdata('userPhoto');
	}

	public function index()
	{
		$this->container["data"] = $this->CampaignModel->getCampaign();
        $this->load->view('public/template/header', $this->container);
        $this->load->view('public/campaign/list');
        $this->load->view('public/template/footer');
	}

	public function upsert($id = null){
		$form_title = "Form Input Campaign";
		// $this->container["data"]["image"] = "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image";

		if($_POST){
			$params = $this->input->post();

			$params['userLog'] = $this->session->userdata('userId');
			$data = $this->CampaignModel->upsertCampaign($params);

            if($data){
                // $this->session->set_flashdata(array("type" => "success", "msg" => "save data successfully!"));
            }else{
                // $this->session->set_flashdata(array("type" => "warning", "msg" => "save data filed!"));
            }

			redirect('/campaign');
		}
		else{
			if(!empty($id)){
				$form_title = "Form Update Campaign";
				$this->container["data"] = $this->CampaignModel->getCampaignById($id);
			}
			$this->container['account'] = $this->CampaignModel->getAccount();
			$this->container['form_title'] = $form_title;
			$this->container['id'] = $id;
			
            $this->load->view('public/template/header', $this->container);
            $this->load->view('public/campaign/form');
            $this->load->view('public/template/footer');
		}
	}

	public function enableCampaign($id){
		$data = $this->CampaignModel->enableCampaign($id);

		if($data){
            // $this->session->set_flashdata(array("type" => "success", "msg" => "enable campaign successfully!"));
        }else{
            // $this->session->set_flashdata(array("type" => "warning", "msg" => "enable campaign filed!"));
        }

		redirect('/campaign');
	}
}
