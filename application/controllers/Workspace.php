<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workspace extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();
		LoggedSystem();
		$this->load->model('WorkspaceModel');
		$this->load->model('MainModel');
		$this->container = array();
        $this->per_page = 6;
	}
	
	public function index()
	{
        $page = (!empty($_GET['per_page']) ? $_GET['per_page'] : 0);
		$getData = $this->WorkspaceModel->getCreativePage($this->per_page, $page);
		$total_rows = $this->WorkspaceModel->countAllCreative();

		$config = array(
				'segment' 		=> $page, 
				'creative' 	    => $getData,
				'url' 			=> base_url('workspace/index?advertiser='.(!empty($_GET['advertiser'])?$_GET['advertiser']:'').'&campaign='.(!empty($_GET['campaign'])?$_GET['campaign']:'')),
				'total_rows'	=> $total_rows,
				'page'			=> $page,
				'per_page'		=> $this->per_page
			);

		$this->container = $this->setPagination($config);

		$this->container['account'] = $this->MainModel->getAccount();
        $adv_id = ($_SESSION['accountId'] != 0 ? $_SESSION['accountId'] : '');
        $this->container['campaign'] = $this->MainModel->getCampaign($adv_id);

		$advert_id = (!empty($_GET['advertiser'])?$_GET['advertiser'] : $this->container['account'][0]->id);
		$cpm_price = ''; $adv_name = '';
		foreach($this->container['account'] as $row){
			if($row->id == $advert_id){
				$cpm_price = $row->cpm_price;
				break;
			}
		}

		$cmp_id = (!empty($_GET['campaign'])?$_GET['campaign'] : 'ALL');
		if($cmp_id == 'ALL'){
			$cmp_name = $cmp_id;
		}else{
			foreach($this->container['campaign'] as $row){
				if($row->id == $cmp_id){
					$cmp_name = $row->campaign_name;
					break;
				}
			}
		}
        
        $this->container['campaign_name'] = $cmp_name;
        $this->container['cpm_price'] = $cpm_price;
        $this->container['selected_page'] = 'workspace';

        $this->load->view('public/template/header', $this->container);
        $this->load->view('public/workspace/home');
        $this->load->view('public/template/footer');
        
    }

    private function setPagination($conf){

		$this->load->library('pagination');
        
        $config['total_rows']       = $conf['total_rows'];
        $config['per_page']         = $conf['per_page'];
        $choice                     = $config["total_rows"] / $config["per_page"];
        $config["num_links"]        = floor($choice);
		$config['base_url']         = $conf['url'];
		$config["uri_segment"]      = $conf['segment'];
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open'] 	= "<ul class='pagination'>";
		$config['full_tag_close'] 	="</ul>";
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] 	= "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] 	= "<li>";
		$config['next_tagl_close'] 	= "</li>";
		$config['prev_tag_open'] 	= "<li>";
		$config['prev_tagl_close'] 	= "</li>";
		$config['first_tag_open'] 	= "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] 	= "<li>";
		$config['last_tagl_close'] 	= "</li>";
 
        $this->pagination->initialize($config);

		$data['creative'] = $conf['creative'];
        $data['pagination'] = $this->pagination->create_links();

        return $data;
	}

	public function processQuote($id){
		$this->load->library('send_email');
		$creative = $this->WorkspaceModel->getCreativePageByid($id);
		$res = $this->send_email->send('no-reply@gmail.com', 'dendy@kyoob.id', 'public/template/email/process_quote', 'Process Quote Creative - '.$creative->creative_name, $creative);

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