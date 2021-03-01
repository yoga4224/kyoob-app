<?php
class StudioModel extends CI_Model {
	
    function __construct(){
        parent::__construct();       
    }

	public function getCreative()
	{
		$this->db->order_by('campaign_name ASC, creative_name ASC');
        $this->db->join('master_campaign', 'master_campaign.id = creative.campaign_id', 'left');
        $this->db->join('master_template', 'master_template.id = creative.template_id', 'left');
		$data = $this->db->get("creative")->result();

		return $data;
	}
}