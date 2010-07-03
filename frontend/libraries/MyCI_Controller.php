<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on Mar 4, 2010
 * Created By Development team Arena Mobile(BD)
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class MyCI_Controller extends Controller
 {
 	var $data=array();
 	var $name;
 	var $method;
 	var $breadcrumb=array();
 	function __construct()
 	{
 		parent::Controller();
 		$this->load->library('template','','tpl');
 		$this->load->helper(array('text','date'));
 		$this->name=$this->router->class;
 		$this->method=$this->router->method;
 		$this->_myCI_init();
 		//$this->http_authentication();
 	}
 	function _myCI_init()
 	{
 		$this->_assign_template_var();
 	}
 	
 	function _assign_template_var()
 	{
 		if(array_key_exists('HTTP_X_REQUESTED_WITH',$_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest')
 		{
 			$this->set_layout('ajax_layout');
 		}
	  $this->tpl->set_page_title('UNUN :: Restaurant');		
	  $this->tpl->assign('active_controller',$this->name);
	  $this->tpl->assign('active_method',$this->method);
	  //$this->set_main_menu();
	  //$this->set_left_menu();
 	}
 	
 	/*function set_main_menu()
 	{
 		
 		$mm=$this->menumodel->get_menu();
     	$menu_html=$this->tpl->make_menu($mm);
        $this->tpl->assign('main_menu_html',$menu_html);	
 	}*/
 	
   function set_left_menu()
   {
   		$this->tpl->assign('left_menu','') ;
   		return;
    }
    
    function check_acl($group_id,$acl)
 	{
	  	if(isset($acl))
	  	{
	  		if($group_id==1){
	  			
	  			return true;
	  		}
	  		elseif(in_array($group_id,$acl))
	  	   	{
	  	   		return true;
	  	   	}
	  	   	else
	  	   	return false;
	  		
	  	}
	  	else
	  	return true;
  	}
 	
 	function assign($key,$val='')
 	{
 		  $this->tpl->assign($key,$val);
 	}
 	
 	function set_layout($file)
 	{
 		$this->tpl->set_layout($file);
 	}
 	
 	function set_pagination($info=array())
 	{
 		$this->load->library('pagination');
 		$rec_per_page=$this->input->post('rec_per_page');
 		//$new_rec_per_page=$this->url->segment($info['uri_segment']+1);
 		$data['offset']=0;
 		if($rec_per_page)
 		{
 				$config['per_page'] = $rec_per_page;
 				$data['rec_per_page'] = $rec_per_page;
 		}
 		else
 		{
 			$config['per_page']=10;
 		}
		$config['num_links'] = 2;
		$config['uri_segment'] = $info['uri_segment'];
		$config['cur_tag_open'] = '<span class=\'disabled_tnt_pagination\'>';
		$config['cur_tag_close'] = '</span>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['total_rows']=$info['total_rows'];
		$stypes=array('asc'=>'desc','desc'=>'asc');
		$nstype=$stypes[$info['sort_type']];
		
		$data['sort_type']=$info['sort_type'];
		$data['sort_on']=$info['sort_on'];
		
		if($info['sort_type'] && $info['sort_on'])
		{
			$config['base_url'] = $this->tpl->site_url.$this->name.'/'.$this->method.'/'.$info['sort_type'].'/'.$info['sort_on'];
			$data['sort_url'] = $this->tpl->site_url.$this->name.'/'.$this->method.'/'.$nstype.'/%s';
		}
		else
		{
			$config['base_url'] = $this->tpl->site_url.$this->name.'/'.$this->method.'/';
			$data['sort_url'] = $this->tpl->site_url.$this->name.'/'.$this->method.'/asc/';
		}	
		$this->pagination->initialize($config);
		$data['total_record'] = $config['total_rows'];
		$pagination_html= $this->pagination->create_links();
		$this->tpl->set_pagination($pagination_html);
		$this->db->order_by($info['sort_on'], $info['sort_type']);
		if($pagination_html)
		{
				$data['total_page'] = ceil($config['total_rows']/$config['per_page']);
				$data['cur_page']=$this->pagination->cur_page;
				$data['offset']=(int)$this->uri->segment($info['uri_segment']);
				$data['sort_url']=$data['sort_url'].'/'.$data['offset'];
				$this->db->limit($config['per_page'], $data['offset']);
		}
		else
		{
				$data['total_page'] = 1;
				$data['cur_page']=1;
				$data['offset']=0;
		}
		$this->tpl->assign($data);
			
 		
 		
 	}
 	
 	function http_authentication()
 	{
 		//echo printr($_SERVER);
 		$user = "arif";
 		$pass = "mysite";
 		
 		//------------------
 		$_SESSION['http_auth'] = isset($_SESSION['http_auth']) ? $_SESSION['http_auth'] : false;
 		
 		if($this->uri->segment(2)=='http_logout' && !$_SESSION['http_auth']){
 			$this->ask_auth();
 		}elseif($this->uri->segment(2)=='http_logout' && $_SESSION['http_auth']){
 			$_SESSION['http_auth'] = false;
 		}elseif($_SESSION['http_auth']){
 			//SUCCESS - Nothing to do here.	
 		}elseif(($_SERVER['PHP_AUTH_USER']!=$user || $_SERVER['PHP_AUTH_PW']!=$pass)){
 			$this->ask_auth();
		}elseif($_SERVER['PHP_AUTH_USER']==$user && $_SERVER['PHP_AUTH_PW']==$pass){
			//Success
			$_SESSION['http_auth'] = true;
		}
		//------------------
 	}
 	
 	function ask_auth()
 	{
 		header('WWW-Authenticate: Basic realm="'. utf8_decode("Please enter authentication credential") .'"');
    	header('HTTP/1.0 401 Unauthorized');
	    die("You are not authorized to this section.<a href='".site_url()."'>Try to Login</a>");
 	}
 	
 	
 }
?>
