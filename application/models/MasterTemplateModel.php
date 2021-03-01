<?php
class MasterTemplateModel extends CI_Model {
	
    function __construct(){
        parent::__construct(); 
		$this->load->helper('user');     
    }

	public function getMasterTemplate()
	{
		$this->db->select('master_template.*');
		$this->db->where('status',1);
		$this->db->order_by("id","DESC");
		$data = $this->db->get("master_template")->result();

		return $data;
	}

	public function getMasterTemplateById($id)
	{
		$this->db->where("id", $id);
		$data = $this->db->get("master_template")->row();

		return $data;
	}

	public function upsertMasterTemplate($params){
		// $this->load->library('s3_upload');

		$icon_template = uploadImage('icon_template', './assets/images/icon_template');

		// $url_image = "";
		// if(!empty($userImage['file']['file_name'])){
		// 	$file_url = $this->s3_upload->upload_file($userImage['file']['full_path'], 'master_template/');
		// 	$url_image = "https://amazonaws.com/master_template/".$file_url['name'];
		// 	$this->db->set("image",$url_image);
		// }

		$arr = array(
			'template_name' => $params['template_name'],
			'width' 		=> $params['width'],
			'height' 		=> $params['height'],
			'template_form' => $params['template_form'],
			'icon_template' => $icon_template['file']['file_name'],
			'status'		=> '1'
		);

		$exec = false;
		if(!empty($params['id'])){
			$arr['updated_by'] = $params['userLog'];
			$arr['updated_date'] = date('Y-m-d H:i:s');
			$this->db->where("id", $params['id']);
			$exec = $this->db->update("master_template", $arr);
		}
		else{
			$arr['created_by'] = $params['userLog'];
			$arr['created_date'] = date('Y-m-d H:i:s');
			$exec = $this->db->insert("master_template", $arr);
		}

		return $exec;
	}

	public function deleteMasterTemplate($id){

		$this->db->set("status",'0');
		$this->db->where("id",$id);
		$exec = $this->db->update("master_template");
        
		return $exec;
	}
}