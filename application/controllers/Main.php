<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	private $container;

	public function __construct()
	{
		parent::__construct();
        LoggedSystem();
		$this->load->model('WorkspaceModel');
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

        $data = array(
                'index.html'        => $string,
                'avatar.jpg'        => read_file(base_url()."assets/template/wuling/avatar.jpg"),
                'avatarlink.png'    => read_file(base_url()."assets/template/wuling/avatarlink.png"),
                'banner.jpg'        => read_file(base_url()."assets/template/wuling/banner.jpg"),
                'bluecheck.png'     => read_file(base_url()."assets/template/wuling/bluecheck.png"),
                'postimage.jpg'     => read_file(base_url()."assets/template/wuling/postimage.jpg")
        );

        $this->zip->add_data($data);
        $this->zip->download('wuling.zip');
    }
    
    public function download(){
        redirect(base_url() . "assets/template/demo/kyoob_demo_3dcube.zip");
    }
    
    public function preview($id){
        $creative = $this->WorkspaceModel->getCreativeByid($id);
        $this->container['assets'] = json_decode($creative->assets);
        $this->load->view('public/demo/demo/index', $this->container);
    }
}