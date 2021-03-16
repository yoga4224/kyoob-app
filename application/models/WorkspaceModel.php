<?php
class WorkspaceModel extends CI_Model {
	
    function __construct(){
        parent::__construct();       
    }

	public function getCreativePage($limit, $start, $search = null)
	{
        $this->db->select("creative.*, template_name, width,height,master_campaign. campaign_name,impression_log.impressions");
		$this->db->order_by('creative.id DESC');
        $this->db->join('master_campaign', 'master_campaign.id = creative.campaign_id', 'left');
        $this->db->join('template_dimension', 'template_dimension.id = creative.dimension_id', 'left');
        $this->db->join('master_template', 'master_template.template_form = template_dimension.template_form', 'left');
		$this->db->join('impression_log', 'impression_log.creative_id = creative.id', 'left');
		if(!empty($_GET['campaign'])){
			if($_GET['campaign'] != '' && $_GET['campaign'] != 'ALL')
				$this->db->where('creative.campaign_id', $_GET['campaign']);
		}
		$data = $this->db->get("creative", $limit, $start)->result();

		return $data;
	}

	public function countAllCreative(){
		if(!empty($_GET['campaign'])){
			if($_GET['campaign'] != '' && $_GET['campaign'] != 'ALL')
				$this->db->where('creative.campaign_id', $_GET['campaign']);
		}
		return $this->db->count_all_results('creative');
	}

    public function getCreativePageByid($id)
	{
        $this->db->select("creative.*, template_name, width,height,master_campaign. campaign_name,impression_log.impressions");
		$this->db->order_by('creative.id DESC');
        $this->db->join('master_campaign', 'master_campaign.id = creative.campaign_id', 'left');
        $this->db->join('template_dimension', 'template_dimension.id = creative.dimension_id', 'left');
        $this->db->join('master_template', 'master_template.template_form = template_dimension.template_form', 'left');
		$this->db->join('impression_log', 'impression_log.creative_id = creative.id', 'left');
        $this->db->where('creative.id', $id);
        
		$data = $this->db->get("creative")->row();

		return $data;
	}

    public function getCreativeByid($id)
	{
		$this->db->where('id', $id);
		$data = $this->db->get("creative")->row();

		return $data;
	}

	public function updateCreativeStatus($id, $status){
		$arr = array('process_quote' => $status);
		$this->db->where("id", $id);
		$exec = $this->db->update("creative", $arr);
	}

	public function addImpression($id){
		$this->db->set('impressions', 'impressions+1', FALSE);
		$this->db->where("creative_id", $id);
		$exec = $this->db->update("impression_log");
	}
}