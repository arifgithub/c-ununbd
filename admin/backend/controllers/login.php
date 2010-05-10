<?php
/*
 * Created on Mar 5, 2010
 * Created by Arena development team 
 * 
 */
 
 class Login extends MyCI_Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 		$this->set_layout('login_layout');
 	}
 	
 	function index()
 	{
 		
 		$this->tpl->set_css('login_style');
		$this->load->view('login/login_page');
 	}
	function logged()
	{	
 	   	 $user=$this->loginmodel->check_login();
		 if(!empty($user))
		 {
		   	  	$sdata['admin_username']=$user['username'];
		   	  	$sdata['admin_email']=$user['email'];
		   	  	$sdata['admin_userid']=$user['id'];
		   	  	$sdata['admin_group_id']=$user['id_admin_group'];
		   	  	$this->session->set_userdata($sdata);
		   	  	redirect('/home');
		 }
		 else
		 {
		 	$this->session->set_flashdata('message',"<div class='err'>Username or password did not match.</div>");
		 	redirect('login');
		 }
	}
	
	function logged_in()
	{
	     $user=$this->loginmodel->check_login();
		 if(!empty($user))
		 {
		   	  	$sdata['admin_username']=$user['username'];
		   	  	$sdata['admin_email']=$user['email'];
		   	  	$sdata['admin_userid']=$user['id'];
		   	  	$login_history=$this->loginmodel->get_login_history($user['id']);
		   	  	$sdata['last_login']=$login_history;
		   	  	$this->session->set_userdata($sdata);
		   	  	redirect('/home');
		 }
		 else
		 {
		 	$this->session->set_flashdata('message',"<div class='err'>Username or password did not match.</div>");
		 	redirect('login');
		 }
		
	}
	
	 function logout()
	 {
	 	$sdata['admin_username']='';
	   	$sdata['admin_email']='';
	   	$sdata['admin_userid']='';
	 	$this->session->unset_userdata($sdata);
	    $this->session->userdata('admin_username');
	 	redirect('login');	
	 }
 }
 
?>