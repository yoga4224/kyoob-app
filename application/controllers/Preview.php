<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preview extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('WorkspaceModel');
	}

    public function index($id){
        $this->container['id']=$id;
        $this->load->view('public/preview/index',$this->container);
        
    }
    
	public function preview($id){
        $creative = $this->WorkspaceModel->getCreativeByid($id);
        $this->container['assets'] = json_decode($creative->assets);
        $this->load->view('public/demo/demo/index', $this->container);
    }
    
    public function impressionTracker($id){
        $this->WorkspaceModel->addImpression($id);
    }
}