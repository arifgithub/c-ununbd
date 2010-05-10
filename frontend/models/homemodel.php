<?php
/*
 * Created on Mar 18, 2010
 * 
 * Created By ARENA MOBILE DEVELOPMENT TEAM (@ Reza Ahmed)
 * 
 */
 class Homemodel extends MyCI_Model
 {
 	var $table='users';
 	
 	function __construct()
 	{
 		parent::__construct();
 	}
 	
 	function signup()
 	{
 		$data['user_name'] = $this->input->post('user_name');
 		$data['user_password'] = $this->input->post('user_password');
 		$data['full_name'] = $this->input->post('full_name');
 		$data['contact'] = $this->input->post('contact');
 		$data['email'] = $this->input->post('email');
 		$data['address'] = $this->input->post('address');

 		$this->db->insert('users',$data);
 		return $this->db->insert_id(); 		
 	}
 	
 	function check_user_login()
 	{
 		$user = $this->input->post('user_name');
 		$pass = $this->input->post('user_password');
 		
 		$sql = "SELECT * FROM users WHERE user_name='$user' AND user_password='$pass'";
 		$res = $this->db->query($sql);
 		if($res->num_rows()>0){
 			return true;
 		}else{
 			return false;
 		}
 	}
 	
 	function get_user_info($user_name)
 	{
 		$sql = "SELECT user_name, user_password, full_name, contact, email, address
 				FROM users WHERE user_name='$user_name'";
 		$res = $this->db->query($sql);
 		if($res->num_rows()>0){
 			return $res->row_array();
 		}else{
 			return false;
 		}
 	}
 	
 	function is_user_name_exists($user_name)
 	{
 		$sql = "SELECT * FROM users WHERE user_name='".$user_name."'";
 		$res = $this->db->query($sql);
 		if($res->num_rows()>0){
 			return true;
 		}else{
 			return false;
 		}
 	}
 	
 	
 }
?>
