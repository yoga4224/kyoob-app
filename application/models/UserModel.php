<?php
class UserModel extends CI_Model {
	
    function __construct(){
        parent::__construct(); 
        $this->load->helper('user');       
    }
	
	public function getUser()
	{
		$this->db->order_by("id","DESC");
		$this->db->where("status !=", 0);
		$data = $this->db->get("users")->result();

		return $data;
	}

	public function getUserById($id)
	{
		$this->db->where("id", $id);
		$data = $this->db->get("users")->row();

		return $data;
	}

	public function upsertUser($params){
		$this->load->library('s3_upload');
		$userImage = uploadImage('userImage', './assets/temp');

		if(!empty($params['password']))
			$this->db->set("password",md5($params['password']));
		
		$url_image = "";
		if(!empty($userImage['file']['file_name'])){
			$file_url = $this->s3_upload->upload_file($userImage['file']['full_path'], 'users/');
			$url_image = "https://amazonaws.com/users/".$file_url['name'];
			$this->db->set("image",$url_image);
		}

		$this->db->set("email",$params['email']);
		$this->db->set("first_name",$params['first_name']);
		$this->db->set("last_name",$params['last_name']);
		$this->db->set("role",$params['role']);
		$this->db->set("status",'1');

		if(!empty($params['id'])){

			$this->db->set("updated_by",$params['userLog']);
			$this->db->where("id", $params['id']);
			$exec = $this->db->update("users");

			if($this->session->userdata('userId') == $params['id']){
				if(empty($url_image)){
					$url_image = $this->session->userdata('userPhoto');
				}

				$session = array(
					'userLogged' => TRUE,
					'userId' => $params['id'],
					'fullName' => $params['first_name']." ".$params['last_name'],
					'userPhoto' => $url_image
				);
	
				$this->session->set_userdata($session);
			}
		}
		else{
			$this->db->set("createdBy",$params['userLog']);
			$exec = $this->db->insert("users");
		}

		return $exec;
	}

	public function deleteUser($id){

		$this->db->set("status",'0');
		$this->db->where("id",$id);
		$exec = $this->db->update("users");
        
		return $exec;
	}
}