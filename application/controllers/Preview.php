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
        if(isset($_SERVER["HTTP_ORIGIN"]))
        {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        }
        else
        {
            header("Access-Control-Allow-Origin: *");
        }
        
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 3600");    
        
        if($_SERVER["REQUEST_METHOD"] == "OPTIONS")
        {
            if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
                header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        
            if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            
            exit(0);
        }
        header("Content-Type: application/json; charset=utf-8");
        
        $this->WorkspaceModel->addImpression($id);
    }
}