<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();
	}

	public function downloadzip()
	{
        $this->load->library('zip');

        $string = read_file('./assets/template/wuling/index.html');

        $from = ["{{image1}}", "{{image2}}", "{{image3}}", "{{image4}}", "{{image5}}"];
        $to   = [
                    base_url()."assets/template/wuling/avatar.jpg", 
                    base_url()."assets/template/wuling/avatarlink.png", 
                    base_url()."assets/template/wuling/banner.jpg",
                    base_url()."assets/template/wuling/bluecheck.png",
                    base_url()."assets/template/wuling/postimage.jpg"
                ];

        $string = str_replace($from,$to,$string);
        $name = 'index.html';

        $this->zip->add_data($name, $string);
        $this->zip->download('wuling.zip');
    }
    
    public function download(){
        redirect(base_url() . "assets/template/demo/kyoob_demo_3dcube.zip");
    }
    
    public function preview(){
        
        $this->load->view('public/demo/demo/index');
        
    }
}