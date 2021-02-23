<?php
class AuthModel extends CI_Model {

    function __construct(){
        parent::__construct();        
    }
	
	public function loginAuth($params){
		$password = md5($params['password']);

		$data = $this->db->get_where("master_users", array("email" => $params['email'], "password" => $password, "status" => '1'))->row();

		return $data;		
	}

}
?>