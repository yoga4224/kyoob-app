<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studio extends CI_Controller {

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
		$this->load->model('StudioModel');
		$this->load->model('MainModel');
		LoggedSystem();

	}
	
	public function index()
	{
		$this->container['account'] = $this->MainModel->getAccount();
        $adv_id = ($_SESSION['accountId'] != 0 ? $_SESSION['accountId'] : '');
        $this->container['campaign'] = $this->MainModel->getCampaign($adv_id);

		$advert_id = (!empty($_GET['advertiser'])?$_GET['advertiser'] : $this->container['account'][0]->id);
		$cpm_price = ''; $adv_name = '';
		foreach($this->container['account'] as $row){
			if($row->id == $advert_id){
				$cpm_price = $row->cpm_price;
				$adv_name = $row->account_name;
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
		
        $this->container["data"] = $this->StudioModel->getCreative();
        $this->container["total_creative"] = count($this->container["data"]);
		$total_impressions=0;
		foreach($this->container["data"] as $row){
			$total_impressions = $total_impressions + $row->impressions;
		}
        $this->container["total_impressions"] = $total_impressions;
		$this->container['cpm_price'] = $cpm_price;
		$this->container['advertiser_name'] = $adv_name;
		$this->container['campaign_name'] = $cmp_name;
		$this->container['total_cost'] = $cpm_price*$total_impressions/1000;

        $this->load->view('public/template/header', $this->container);
        $this->load->view('public/main/homepage');
        $this->load->view('public/template/footer');
        
    }
    
        
}