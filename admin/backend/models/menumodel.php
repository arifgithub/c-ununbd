<?php
/*
 * Created on Mar10, 2010
 * Created by Arena development team
 */
 class Menumodel extends MyCI_Model
 {
 	function __construct()
 	{
 		parent::__construct();
 		
 		$this->table='main_menu';
 	}
 	
 	function add()
 	{
 		$data['title']=$this->input->post('title');
 		$data['tips']=$this->input->post('tips');
 		$data['parent_id']=$this->input->post('parent_id');
 		$data['child_id']=0;
 		$data['module_link']=$this->input->post('module_link');
 		$data['id_content']=$this->input->post('id_content');
 		$data['order']=$this->input->post('order');
 		$data['status']='PUBLISH';
 		$this->db->insert('main_menu',$data);
 		return $this->db->insert_id();
 	}
 	
 	
 	function get_list()
 	{
 		$this->db->select('mm.id, mm.title mtitle, mm.status, mm.tips, mm.order, c.title as ctitle, c.id cid');
 		$this->db->join('content c','c.id = id_content','left');
 		$items=$this->get_assoc('main_menu mm');
 	    return $items;
 	}
 	
 	function get_record($id='',$where='')
 	{
 		$this->db->select();
 		if($where)
 	   	{
 	   		$this->db->where($where);
 	   	}
 		if(!empty($id))
 	   	{
 	   	 	$this->db->where('id',$id);
 	   	 	return $this->get_row();
 	   	}
 	   	else
 	   	{
 	   		return $this->get_assoc();
 	   	}
 	}
 	
 	
 	function count_list()
 	{
 		$this->db->select("count(id) num");
 		return $this->get_one();
 	}
 	
 	function set_child($id)
 	{
 		$this->db->update('main_menu',array('child_id'=>1),array('id'=>$id));
 		
 	}
 	
 	function edit($id)
 	{
 		$data['title']=$this->input->post('title');
 		$data['tips']=$this->input->post('tips');
 		$data['parent_id']=$this->input->post('parent_id');
 		$data['order']=$this->input->post('order');
 		$data['status']=$this->input->post('status');
 		$data['module_link']=$this->input->post('module_link');
 		$data['id_content']=$this->input->post('id_content');
 		$this->db->update('main_menu',$data,array('id'=>$id));
 		return $data['parent_id'];
 	}
 	
 	function count_child($pid)
 	{
 		$this->db->select('count(id) num');
 		$this->db->where('parent_id',$pid);
 		return $this->get_one();
 	}
 	
 	function set_no_child($id)
 	{
 		$this->db->update('main_menu',array('child_id'=>0),array('id'=>$id));
 	}
 	
 	function del($id)
 	{
 		$this->db->delete('main_menu',array('id'=>$id));
 	}
 	
 	function change_status($id,$val)
 	{
 	   $this->db->where('id',$id);
 	   $this->db->update('main_menu',array('status'=>strtoupper($val)));	
 	}
 	
 	function get_menu($where='')
 	{
 			$this->db->select();
 			$this->db->order_by('parent_id','asc');
 			$this->db->order_by('order','asc');
 			if($where)
 			{
 				$this->db->where($where);
 			}
 			$mm=$this->get_assoc();
 			return $mm;
    } 
   
   function count_published_child($pid)
   {
 		$this->db->select('count(id) num');
 		$this->db->where(array('parent_id'=>$pid,'status'=>'PUBLISH'));
 		return $this->get_one();
   }
 	
   
 		
 }
 
?>