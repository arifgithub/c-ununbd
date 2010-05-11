<?php
/*
 * Created on Mar 18, 2010
 * 
 * Created By ARENA MOBILE DEVELOPMENT TEAM (@ Reza Ahmed)
 * 
 */
 class Feedbackmodel extends MyCI_Model
 {
 	var $table='users';
 	
 	function __construct()
 	{
 		parent::__construct();
 	}
 	
 	function submit()
 	{
 		$data['full_name'] = $this->input->post('full_name');
 		$data['contact'] = $this->input->post('contact');
 		$data['email'] = $this->input->post('email');
 		$data['message'] = $this->input->post('message');

 		return $this->db->insert('feedback',$data);
 	}
 	
 	
 }
?>
