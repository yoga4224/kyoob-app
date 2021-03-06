<?php
class StudioModel extends CI_Model {
	
    function __construct(){
        parent::__construct();       
    }

	public function getCreative()
	{
		$this->db->order_by('campaign_name ASC, creative_name ASC');
        $this->db->join('master_campaign', 'master_campaign.id = creative.campaign_id', 'left');
        $this->db->join('template_dimension', 'template_dimension.id = creative.dimension_id', 'left');
        $this->db->join('master_template', 'master_template.template_form = template_dimension.template_form', 'left');
		$data = $this->db->get("creative")->result();

		return $data;
	}
}