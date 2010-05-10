<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on Mar 4, 2010
 * Created By Development team Arena Mobile(BD)
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class MyCI_Loader extends CI_Loader
 {
 	
 	 function __construct()
 	 {
 	 	parent::CI_Loader();
 	 }
 	 
 	 function view($view,$params=array(),$flag=false)
 	 {
 	 	$CI =& get_instance();
 	 	if(!empty($CI->tpl->name)) 
 	 	{
 	 		$view=$CI->tpl->name.'/'.$view;	
 	 	}
 	 	
 	 	$tpl_data=$CI->tpl->get_data();
 	 	if(is_array($params)) 
 	 	{
 	 		$params=array_merge($tpl_data,$params);
 	 	}
 	 	else
 	 	{
 	 		$params=$tpl_data;
 	 	}
 	 	$params['content_for_layout']=parent::view($view,$params,true);
 	 	$layout=$CI->tpl->get_layout();
 	 	return parent::view($layout,$params,$flag);
 	 }
 	 
 	 
 	 function element($file_name,$data=array(),$flag=false)
 	 {
 	 	
 	 	 parent::view('elements/'.$file_name,$data,false);
 	 	
 	 }
 	 
 	 
 	 
 }
?>
