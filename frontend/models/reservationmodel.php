<?php
/*
 * Created on Mar 18, 2010
 * 
 * Created By ARENA MOBILE DEVELOPMENT TEAM (@ Reza Ahmed)
 * 
 */
 class Reservationmodel extends MyCI_Model
 {
 	var $table='users';
 	
 	function __construct()
 	{
 		parent::__construct();
 	}
 	
 	function get_system_settings()
 	{
 		$sql = "SELECT * FROM system_settings";
 		$res = $this->db->query($sql);
 		foreach($res->result_array() as $row){
 			$settings[$row['variable']] = $row['value'];
 		}
 		return $settings;
 	}
 	
 	function get_time_slot()
 	{
 		$sql = "SELECT * FROM time_slot";
 		$res = $this->db->query($sql);
 		return $res->result_array();
 	}
 	
 	
 	
 }
?>
