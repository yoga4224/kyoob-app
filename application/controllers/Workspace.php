<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workspace extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();
		LoggedSystem();
		$this->load->model('WorkspaceModel');
		$this->container = array();
	}
	
	public function index()
	{
        $this->container['creative'] = $this->WorkspaceModel->getCreativePage();
        $this->load->view('public/template/header', $this->container);
        $this->load->view('public/workspace/home');
        $this->load->view('public/template/footer');
        
    }

	public function processQuote($id){
		$this->load->library('send_email');
		$creative = $this->WorkspaceModel->getCreativePageByid($id);
		$res = $this->send_email->send('demo.project41@gmail.com', 'demo.adm41@gmail.com', 'public/template/email/process_quote', 'Process Quote Creative - '.$creative->creative_name, $creative);

        if($res['success'] == 'true'){
            $this->WorkspaceModel->updateCreativeStatus($id, '1');
        }

		redirect('/workspace');
	}

    public function verifyQuote($id){
        $this->WorkspaceModel->updateCreativeStatus($id, '2');

		redirect('/workspace');
	}
    
    public function downloadzip($id)
	{
        $this->load->library('zip');
		$creative = $this->WorkspaceModel->getCreativeByid($id);
		$data = array();

		if($creative->template_form == 3){
			$data = $this->cube3d($creative);
		}

        $this->zip->add_data($data);
        $this->zip->download('3dcube.zip');
    }

	private function cube3d($creative){
		$string = read_file('./assets/template/3dcube/index.html');
		$assets = json_decode($creative->assets);

        $from = ["{{image1}}", "{{image2}}", "{{image3}}", "{{image4}}"];
        $to   = [
                    $assets[0]->url, 
                    $assets[1]->url,
                    $assets[2]->url,
                    $assets[3]->url
                ];

        $string = str_replace($from,$to,$string);

        $data = array(
                'index.html'        	=> $string,
                $assets[0]->url     	=> read_file(base_url()."assets/upload/".$assets[0]->url),
                $assets[1]->url     	=> read_file(base_url()."assets/upload/".$assets[1]->url),
                $assets[2]->url     	=> read_file(base_url()."assets/upload/".$assets[2]->url),
                $assets[3]->url     	=> read_file(base_url()."assets/upload/".$assets[3]->url),
                'js/hammer.min.js'  	=> read_file(base_url()."assets/template/3dcube/js/hammer.min.js"),
                'js/jquery.min.js'  	=> read_file(base_url()."assets/template/3dcube/js/jquery.min.js"),
                'js/swiper.min.js'  	=> read_file(base_url()."assets/template/3dcube/js/swiper.min.js"),
                'css/swiper.min.css'	=> read_file(base_url()."assets/template/3dcube/css/swiper.min.css"),
                'style.css' 			=> read_file(base_url()."assets/template/3dcube/style.css"),
        );

		return $data;
	} 
}