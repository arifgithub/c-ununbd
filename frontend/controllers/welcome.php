<?php

class Welcome extends MyCI_Controller {

	function Welcome()
	{
		parent::__construct();	
	}
	
	function who_are_devels()
	{
		$this->devel_mems();
	}
	
}