<?php
/*
 * Created on Mar 9, 2010
 * Created by Arena development team
 */
 class Usermodel extends MyCI_Model
 {
 	function __construct()
 	{
 		parent::__construct();
 		
 		$this->table='admin';
 	}
 	
 	function add()
 	{
 		$data['username']=$this->input->post('username');
 		$data['passwd']=$this->input->post('passwd');
 		$data['firstname']=$this->input->post('firstname');
 		$data['lastname']=$this->input->post('lastname');
 		$data['email']=$this->input->post('email');
 		$data['mobile']=$this->input->post('mobile');
 		$data['address']=$this->input->post('address');
 		$data['city']=$this->input->post('city');
 		$data['id_admin_group']=$this->input->post('id_admin_group');
 		$data['create_date']=$this->curdate();
 		$data['status']='ACTIVE';
 		$this->db->insert('admin',$data);
 		return $this->db->insert_id();
 	}
 	
 	
 	function get_list()
 	{
 		$this->db->select('admin.id,create_date, username, firstname,ag.title admin_type,lastname, passwd,' .
 				' email, address, mobile,city,status',false);
 	 	$this->db->from('admin');
 	 	$this->db->join('admin_group ag', 'ag.id = id_admin_group', 'left');
 	    if(!empty($userid))
 	    {
 	   	  $this->db->where('admin.id',$userid);
 	    }
 	    $rs=$this->db->get();
 	    $users=$rs->result_array();
 	    return $users;
 	}
 	
 	function count_list()
 	{
 		$this->db->select("count(id) num");
 		return $this->get_one();
 	}
 	
 	function edit($id='')
 	{
 		$data['username']=$this->input->post('username');
 		$data['passwd']=$this->input->post('passwd');
 		$data['firstname']=$this->input->post('firstname');
 		$data['lastname']=$this->input->post('lastname');
 		$data['email']=$this->input->post('email');
 		$data['mobile']=$this->input->post('mobile');
 		$data['address']=$this->input->post('address');
 		$data['city']=$this->input->post('city');
 		$data['id_admin_group']=$this->input->post('id_admin_group');
 		$data['status']=$this->input->post('status');;
 		$this->db->update('admin',$data,array('id'=>$id));
 	}
 	
 	function get_record($id)
 	{
 		$this->db->select('*');
 		$this->db->where('id',$id);
 		return $this->get_row();
 	}
 	
 	function change_status($id,$val)
 	{
 	   $this->db->where('id',$id);
 	   $this->db->update('admin',array('status'=>strtoupper($val)));	
 	}
 	
 	function del($id)
 	{
 		$this->db->delete('admin',array('id'=>$id));
 		
 	}
 	
 	
 	
 	
 }
 
?>
