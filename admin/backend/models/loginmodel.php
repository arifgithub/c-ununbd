<?php
/*
 * Created on Mar 17, 2010
 *
 * Created By Arenamobile development team (@ Reza Ahmed)
 * 
 */
 class Loginmodel extends MyCI_Model
 {
 	var $table='admin';
 	
 	function check_login()
	{
 		$user=$this->input->post('username');
 		$pass=md5($this->input->post('passwd'));
 		$this->db->where(array('username'=>$user,'passwd'=>$pass));
 		$row=$this->get_row();
 		if($this->db->affected_rows()==1)
 			$row=$row;
 		if($this->db->affected_rows()>1)
 			$row=array();
 		
 		return $row;
	}
	
 	function get_logged_user()
 	{
 		
 		$userid=$this->session->userdata('admin_userid');
 		$username=$this->session->userdata('admin_username');
 		$this->db->select('admin.id,id_admin_group, username, firstname,ag.title admin_type,lastname,' .
 				' email, address, mobile,city,status');
 	 	$this->db->join('admin_group ag', 'ag.id = id_admin_group', 'left');
 		$this->db->where(array('admin.id'=>$userid,'username'=>$username));  
 		$user=$this->get_row();
 		return $user;
 		
 	}
 	
 }
?>
