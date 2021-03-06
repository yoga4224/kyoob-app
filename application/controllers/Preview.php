<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preview extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();
	}

    public function index($id){
        $this->container['id']=$id;
        $this->load->view('public/preview/index',$this->container);
        
    }
}