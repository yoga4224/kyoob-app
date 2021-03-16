<?php
class StudioModel extends CI_Model {
	
    function __construct(){
        parent::__construct();       
    }

	public function getCreative()
	{
        $this->db->select("creative.*, template_name, width,height,master_campaign. campaign_name, case when impression_log.impressions is not null then impression_log.impressions else '10' end as \"impressions\"", FALSE);
		$this->db->order_by('campaign_name ASC, creative_name ASC');
        $this->db->join('master_campaign', 'master_campaign.id = creative.campaign_id', 'left');
        $this->db->join('template_dimension', 'template_dimension.id = creative.dimension_id', 'left');
        $this->db->join('master_template', 'master_template.template_form = template_dimension.template_form', 'left');
        $this->db->join('impression_log', 'impression_log.creative_id = creative.id', 'left');
		$data = $this->db->get("creative")->result();

		return $data;
	}
}