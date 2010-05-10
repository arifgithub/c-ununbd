<?php
/*
 * Created on Mar 5, 2010
 * Created by Arena development team 
 * 
 */
 
 class Home extends MyCI_Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 	}
 	
 	function index()
 	{	
 		$this->tpl->set_page_title('Site Admin :: Home');
 		$this->load->view('home/home_page');
 	}
 	
 }
 
?>
