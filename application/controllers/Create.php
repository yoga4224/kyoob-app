<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('createModel');
		$this->container['data'] = null;
		LoggedSystem();
        //$this->load->model('Komparase_Model');

	}
	
	public function index()
	{
        
        $this->load->view('public/template/header');
        $this->load->view('public/create/step1');
        $this->load->view('public/template/footer');
        
    }
    
    public function cube()
	{
        if(!empty($_POST)){
			$params = $this->input->post();
			$params['userLog'] = $this->session->userdata('userId');
			$params['template_form'] = 3;
			$data = $this->createModel->upsertCube($params);

            if($data){
                // $this->session->set_flashdata(array("type" => "success", "msg" => "save data successfully!"));
            }else{
                // $this->session->set_flashdata(array("type" => "warning", "msg" => "save data filed!"));
            }

			redirect('/workspace');
		}else{
			$this->container['campaign'] = $this->createModel->getCampaign();
			$this->container['dimension'] = $this->createModel->getDimension('3');
			$this->load->view('public/template/header', $this->container);
			$this->load->view('public/create/step2');
			$this->load->view('public/template/footer');
		}
        
    }
    
        
}