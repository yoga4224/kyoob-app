<?php
class MainModel extends CI_Model {
	
    function __construct(){
        parent::__construct();       
    }

	public function getAccount()
	{
		$this->db->order_by("id","DESC");
		$this->db->where("status !=", 0);
        if($_SESSION['accountId'] != 0)
            $this->db->where("id =", $_SESSION['accountId']);
		$data = $this->db->get("master_account")->result();

		return $data;
	}

    public function getCampaign($id)
	{
		$this->db->order_by("id","DESC");
        if($id != '')
            $this->db->where("id =", $id);
		$data = $this->db->get("master_campaign")->result();

		return $data;
	}
}