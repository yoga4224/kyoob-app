<?php
class CampaignModel extends CI_Model {
	
    function __construct(){
        parent::__construct();      
    }

	public function getCampaign()
	{
		$this->db->select('master_account.account_name, master_campaign.*');
		$this->db->order_by("id","DESC");
		$this->db->join('master_account', 'master_campaign.account_id = master_account.id','left');
		$data = $this->db->get("master_campaign")->result();

		return $data;
	}

	public function getAccount()
	{
		$this->db->order_by("id","DESC");
		$this->db->where("status !=", 0);
		$data = $this->db->get("master_account")->result();

		return $data;
	}

	public function getCampaignById($id)
	{
		$this->db->where("id", $id);
		$data = $this->db->get("master_campaign")->row();

		return $data;
	}

	public function upsertCampaign($params){
		// $this->load->library('s3_upload');
		// $userImage = uploadImage('userImage', './assets/temp');
		// $url_image = "";
		// if(!empty($userImage['file']['file_name'])){
		// 	$file_url = $this->s3_upload->upload_file($userImage['file']['full_path'], 'master_campaign/');
		// 	$url_image = "https://amazonaws.com/master_campaign/".$file_url['name'];
		// 	$this->db->set("image",$url_image);
		// }

		$arr = array(
			'account_id' 	=> $params['account_id'],
			'campaign_name' => $params['campaign_name']
		);

		$exec = false;
		if(!empty($params['id'])){
			$arr['updated_by'] = $params['userLog'];
			$arr['updated_date'] = date('Y-m-d H:i:s');
			$this->db->where("id", $params['id']);
			$exec = $this->db->update("master_campaign", $arr);
		}
		else{
			$arr['created_by'] = $params['userLog'];
			$arr['created_date'] = date('Y-m-d H:i:s');
			$exec = $this->db->insert("master_campaign", $arr);
		}

		return $exec;
	}

	public function enableCampaign($id){

		$this->db->set("enable",'1');
		$this->db->set("enable_date",date('Y-m-d'));
		$this->db->where("id",$id);
		$exec = $this->db->update("master_campaign");
        
		return $exec;
	}
}