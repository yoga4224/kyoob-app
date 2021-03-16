<?php
class AccountModel extends CI_Model {
	
    function __construct(){
        parent::__construct();       
    }

	public function getAccount()
	{
		$this->db->order_by("id","DESC");
		$this->db->where("status !=", 0);
		$data = $this->db->get("master_account")->result();

		return $data;
	}

	public function getAccountById($id)
	{
		$this->db->where("id", $id);
		$data = $this->db->get("master_account")->row();

		return $data;
	}

	public function upsertAccount($params){

		$arr = array(
			'email' => $params['email'],
			'account_name' => $params['account_name'],
			'cpm_price' => $params['cpm_price'],
			'status' => '1',
		);

		$exec = false;
		if(!empty($params['id'])){
			$arr['updated_by'] = $params['userLog'];
			$arr['updated_date'] = date('Y-m-d H:i:s');
			$this->db->where("id", $params['id']);
			$exec = $this->db->update("master_account", $arr);
		}
		else{
			$arr['created_by'] = $params['userLog'];
			$arr['created_date'] = date('Y-m-d H:i:s');
			$exec = $this->db->insert("master_account", $arr);
		}

		return $exec;
	}

	public function deleteAccount($id){

		$this->db->set("status",'0');
		$this->db->where("id",$id);
		$exec = $this->db->update("master_account");
        
		return $exec;
	}
}