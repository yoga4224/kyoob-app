<?php
class WorkspaceModel extends CI_Model {
	
    function __construct(){
        parent::__construct();       
    }

	public function getCreativePage()
	{
        $this->db->select('creative.*, template_name, width,height,master_campaign. campaign_name');
		$this->db->order_by('creative.id DESC');
        $this->db->join('master_campaign', 'master_campaign.id = creative.campaign_id', 'left');
        $this->db->join('template_dimension', 'template_dimension.id = creative.dimension_id', 'left');
        $this->db->join('master_template', 'master_template.template_form = template_dimension.template_form', 'left');
        
		$data = $this->db->get("creative")->result();

		return $data;
	}

    public function getCreativePageByid($id)
	{
        $this->db->select('creative.*, template_name, width,height,master_campaign. campaign_name');
		$this->db->order_by('creative.id DESC');
        $this->db->join('master_campaign', 'master_campaign.id = creative.campaign_id', 'left');
        $this->db->join('template_dimension', 'template_dimension.id = creative.dimension_id', 'left');
        $this->db->join('master_template', 'master_template.template_form = template_dimension.template_form', 'left');
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
}