<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preview extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();
	}

	
    
    public function index(){
        
        $this->load->view('public/preview/index');
        
    }
}