<?php
class StudioModel extends CI_Model {
	
    function __construct(){
        parent::__construct();       
    }

	public function getCreative()
	{
        $this->db->select("creative.*, template_name, width,height,master_campaign. campaign_name,impression_log.impressions");
		$this->db->order_by('campaign_name ASC, creative_name ASC');
        $this->db->join('master_campaign', 'master_campaign.id = creative.campaign_id', 'left');
        $this->db->join('template_dimension', 'template_dimension.id = creative.dimension_id', 'left');
        $this->db->join('master_template', 'master_template.template_form = template_dimension.template_form', 'left');
        $this->db->join('impression_log', 'impression_log.creative_id = creative.id', 'left');
        $this->db->where('creative.process_quote', 2);
        if(!empty($_GET['campaign'])){
			if($_GET['campaign'] != '' && $_GET['campaign'] != 'ALL')
				$this->db->where('creative.campaign_id', $_GET['campaign']);
		}
		$data = $this->db->get("creative")->result();

		return $data;
	}
}