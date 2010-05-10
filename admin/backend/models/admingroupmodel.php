<?php
/*
 * Created on Mar 9, 2010
 *
 * Created by Arena development Team (@Reza Ahmed)
 */
 class Admingroupmodel extends MyCI_Model
 {
 	function __construct()
 	{
 		parent::__construct();
 		
 		$this->table='admin_group';
 	}
 	
 	function group_option()
 	{
 		$this->db->select('id,title');
 		$ret= $this->get_assoc();
 		return $ret;
 	}
 	
 }
?>
