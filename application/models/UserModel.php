<?php
class UserModel extends CI_Model {
	
    function __construct(){
        parent::__construct(); 
        $this->load->helper('user');       
    }
	
	public function getUser()
	{
		$this->db->select('master_account.account_name, master_users.*');
		$this->db->order_by("id","DESC");
		$this->db->join('master_account', 'master_users.account_id = master_account.id','left');
		$this->db->where("master_users.status !=", 0);
		$data = $this->db->get("master_users")->result();

		return $data;
	}

	public function getAccount()
	{
		$this->db->order_by("id","DESC");
		$this->db->where("status !=", 0);
		$data = $this->db->get("master_account")->result();

		return $data;
	}

	public function getUserById($id)
	{
		$this->db->where("id", $id);
		$data = $this->db->get("master_users")->row();

		return $data;
	}

	public function upsertUser($params){
		// $this->load->library('s3_upload');
		// $userImage = uploadImage('userImage', './assets/temp');

		if(!empty($params['password']))
			$this->db->set("password",md5($params['password']));
		
		// $url_image = "";
		// if(!empty($userImage['file']['file_name'])){
		// 	$file_url = $this->s3_upload->upload_file($userImage['file']['full_path'], 'master_users/');
		// 	$url_image = "https://amazonaws.com/master_users/".$file_url['name'];
		// 	$this->db->set("image",$url_image);
		// }

		$arr = array(
			'email' 		=> $params['email'],
			'first_name' 	=> $params['first_name'],
			'last_name' 	=> $params['last_name'],
			'role' 			=> $params['role'],
			'account_id' 	=> $params['account_id'],
			'status' 		=> '1',
		);

		$this->db->where('email', $params['email']);
		$exec = false;
		if(!empty($params['id'])){
			$this->db->where('id !=', $params['id']);
			$check = $this->db->get('master_users')->row();

			if(empty($check)){
				$arr['updated_by'] = $params['userLog'];
				$arr['updated_date'] = date('Y-m-d H:i:s');
				$this->db->where("id", $params['id']);
				$exec = $this->db->update("master_users", $arr);

				if($this->session->userdata('userId') == $params['id']){
					// if(empty($url_image)){
					// 	$url_image = $this->session->userdata('userPhoto');
					// }
					$session = array(
						'userLogged' => TRUE,
						'userId' => $params['id'],
						'fullName' => $params['first_name']." ".$params['last_name'],
						// 'userPhoto' => $url_image
					);
					$this->session->set_userdata($session);
				}
			}else{
				echo 'duplicated email';die;
			}
		}
		else{
			$check = $this->db->get('master_users')->row();
			if(empty($check)){
				$arr['created_by'] = $params['userLog'];
				$arr['created_date'] = date('Y-m-d H:i:s');
				$exec = $this->db->insert("master_users", $arr);
			}else{
				echo 'duplicated email';die;
			}
		}

		return $exec;
	}

	public function deleteUser($id){

		$this->db->set("status",'0');
		$this->db->where("id",$id);
		$exec = $this->db->update("master_users");
        
		return $exec;
	}
}