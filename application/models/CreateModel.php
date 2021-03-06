<?php
class CreateModel extends CI_Model {
	
    function __construct(){
        parent::__construct();   
        $this->load->helper('user');    
    }

    public function getCampaign()
	{
		$this->db->order_by("campaign_name","ASC");
		$data = $this->db->get("master_campaign")->result();

		return $data;
	}

    public function getDimension($id)
	{
        $this->db->where('template_form', $id);
		$data = $this->db->get("template_dimension")->result();

		return $data;
	}

	public function upsertCube($params)
	{
        $files = $_FILES;
        $assets = array();
        $cpt = count($_FILES['assets']['name']);

        for($i=0; $i<$cpt; $i++){
            $_FILES['assets']['name']       = $files['assets']['name'][$i];
            $_FILES['assets']['type']       = $files['assets']['type'][$i];
            $_FILES['assets']['tmp_name']   = $files['assets']['tmp_name'][$i];
            $_FILES['assets']['error']      = $files['assets']['error'][$i];
            $_FILES['assets']['size']       = $files['assets']['size'][$i];

            $asset = uploadImage('assets', './assets/upload');
            if($asset['result'] == 'success'){
                $assets[] = array(
                    'type'              => 'image',
                    'url'               => $asset['file']['file_name'],
                    'landing_page'      => ''
                );
            }
        }

        $param_assets = json_encode($assets);

		$arr = array(
			'creative_name'     => $params['creative_name'],
			'campaign_id'       => $params['campaign_id'],
			'template_form'     => $params['template_form'],
			'assets'            => $param_assets,
			'main_landing_page' => $params['main_landing_page'],
			'default_image'     => $assets[0]['url'],
			'dimension_id'      => $params['dimension_id']
		);

		$exec = false;
		if(!empty($params['id'])){
			$arr['updated_by'] = $params['userLog'];
			$arr['updated_date'] = date('Y-m-d H:i:s');
			$this->db->where("id", $params['id']);
			$exec = $this->db->update("creative", $arr);
		}
		else{
			$arr['created_by'] = $params['userLog'];
			$arr['created_date'] = date('Y-m-d H:i:s');
			$exec = $this->db->insert("creative", $arr);
		}

		return $exec;
	}
}