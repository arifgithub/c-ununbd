<?php

class Welcome extends MyCI_Controller {

	function Welcome()
	{
		parent::__construct();	
	}
	
	function index()
	{
			//$this->set_layout('login_layout');
		$this->load->view('welcome_message');
	}
	
	function test()
	{
		$this->set_layout('login_layout');
		// print_r($this->data); 
		$data= $this->tpl->get_data();
		print_r($data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */