<?php
/*
 * Created on Apr 1, 2010
 * 
 * Created By ARENA MOBILE DEVELOPMENT TEAM (@ Reza Ahmed)
 * 
 */
 class Homepagemodel extends MyCI_Model
 {
 	function __construct()
 	{
 		parent::__construct();
 		
 		$this->table='homepage_content';
 	}
 	
 	function vas_list()
 	{
 	   $this->db->select('fc.id,id_content cid,c.title ctitle,fc.title fctitle,fc.tips fctips,fc.order,IF(fc.status=1,"Publish","Unpublish") status',false);
 	   $this->db->from('homepage_content fc');
 	   $this->db->join('content c', 'c.id = id_content', 'left');
 	   $this->db->where('fc.type','VAS');
 	   $this->db->order_by('fc.order','asc');
 	   $query=$this->db->get();
 	   $row=$query->result_array();
 	   return $row;	
 	}
 	
 	function count_vas_list()
 	{
 		$this->db->select("count(id) num");
 		return $this->get_one();
 	}
 	
 	function add_vas()
 	{
 		$data['title']=$this->input->post('title');
 		$data['tips']=$this->input->post('tips');
 		$data['type']='VAS';
 		$data['id_content']=$this->input->post('id_content');
 		$data['order']=$this->input->post('order');
 		$data['status']=$this->input->post('status');
 		$this->db->insert('homepage_content',$data);
 		return $this->db->insert_id();
 	}
 	function edit_vas($id)
 	{
 		$data['title']=$this->input->post('title');
 		$data['tips']=$this->input->post('tips');
 		$data['id_content']=$this->input->post('id_content');
 		$data['order']=$this->input->post('order');
 		$data['status']=$this->input->post('status');
 		$this->db->update('homepage_content',$data,array('id'=>$id));
 		
 	}
 	function content_row($id)
 	{
 		$this->db->where('id',$id);
 		return $this->get_row();	
 	}
 	
 	function del($id)
 	{
 		$this->db->delete('homepage_content',array('id'=>$id));
 		return true;
 	}
 	function change_status($id,$val)
 	{
 		$this->db->update('homepage_content',array('status'=>$val),array('id'=>$id));
 	}
 }
?>
