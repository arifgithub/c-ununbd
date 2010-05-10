<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Created on Mar 4, 2010
 * Created By Development team Arena Mobile(BD)
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
//error_reporting("E_WARNING" ^ "E_NOTICE");
 class MyCI_Controller extends Controller
 {
 	var $data=array();
 	var $name;
 	var $method;
 	
 	function __construct()
 	{
 		parent::Controller();
 		$this->load->library('template','','tpl');
 		$this->load->helper(array('text','date'));
 		$this->name=$this->router->class;
 		$this->method=$this->router->method;
 		//$this->_check_access();
 		$this->_myCI_init();
 		//$this->http_authentication();
 	}
 	
 	function _myCI_init()
 	{
 		$this->_assign_template_var();
 		
 	}
 	
 	function _assign_template_var()
 	{
 		
 	  $this->tpl->set_page_title('Admin Panel');		
 	  $this->tpl->assign('active_controller',$this->name);
 	  $this->tpl->assign('active_method',$this->method);
 	  $this->set_main_menu();
 	  $this->set_sub_menu();
 	}
 	
 	function set_main_menu()
 	{
 		
     	$main_menu=array(
				'home'=>array('title'=>'Home','order'=>1,'action'=>'','tips'=>'admin panel'),
				'homepage'=>array('title'=>'Home Page','action'=>'vas_list','order'=>2,'tips'=>'Manage front page','acl'=>array(2)),
				'content'=>array('title'=>'Contant','action'=>'','order'=>3,'tips'=>'Manage static content','acl'=>array(2)),
				'news'=>array('title'=>'News','action'=>'','order'=>4,'tips'=>'Manage news','acl'=>array(6)),
				'banner'=>array('title'=>'Banner','action'=>'','order'=>6,'tips'=>'Manage Site Banner','acl'=>array(3)),
				'pagebanner'=>array('title'=>'Page Ban','action'=>'','order'=>7,'tips'=>'Manage Page Banner','acl'=>array(3)),
				'job'=>array('title'=>'Jobs','action'=>'','order'=>5,'tips'=>'Manage jobs','acl'=>array(7)),
				'feedback'=>array('title'=>'feedback','action'=>'','order'=>18,'tips'=>'Manage feedback','acl'=>array(4)),
				'user'=>array('title'=>'User','action'=>'','order'=>2,'tips'=>'manage admin user'),
				'menu'=>array('title'=>'Menu','action'=>'','order'=>3,'tips'=>'Manage menu item for user end','acl'=>array(2)),
				'media'=>array('title'=>'Media','action'=>'','order'=>19,'tips'=>'Manage Media','acl'=>array(6)),
				'ccpoint'=>array('title'=>'CC Point','action'=>'','order'=>20,'tips'=>'Manage CC point','acl'=>array(2))
				);
		$admin_group=$this->session->userdata('admin_group_id');
		if($admin_group==1 || $admin_group==5 )
		{
			$acl_menu=$main_menu;
		}
		else
		{
			foreach($main_menu as $c=>$m)
			{
				if(is_array($m['acl']) && in_array($admin_group,$m['acl']))
				$acl_menu[$c]=$m;
			}
			$acl_menu['home']=$main_menu['home'];
		}
		if($this->name !='login' && empty($acl_menu[$this->name]))
		{
			show_404('page');
		}	
		$acl_menu=menu_sort($acl_menu);
    	$this->tpl->assign('main_menu',$acl_menu) ;	
 	}
 	
   function set_sub_menu()
   {
    
     $sub_menu=array(
	'news'=>array(
			'index'=>array('title'=>'News list','tips'=>'view news list','controller'=>'news','order'=>0),
			'add'=>array('title'=>'New','tips'=>'create news','controller'=>'news','order'=>1),			
			'search'=>array('title'=>'Search','tips'=>'search news','controller'=>'news','order'=>2)
			),
	'banner'=>array(
			'index'=>array('title'=>'Banner list','tips'=>'Site banner list','controller'=>'banner','order'=>1),
			'add'=>array('title'=>'Add New','tips'=>'New banner','controller'=>'banner','order'=>2),
			'search'=>array('title'=>'Search','tips'=>'search banner','controller'=>'banner','order'=>3)
			),
	'pagebanner'=>array(
			'index'=>array('title'=>'Page banner list','tips'=>'Site page banner list','controller'=>'pagebanner','order'=>1),
			'add'=>array('title'=>'Add New','tips'=>'New banner','controller'=>'pagebanner','order'=>2),
			'search'=>array('title'=>'Search','tips'=>'search banner','controller'=>'pagebanner','order'=>3)
			),
	'job'=>array(
			'index'=>array('title'=>'Job list','tips'=>'Job List','controller'=>'job','order'=>0),
			'cvsearch'=>array('title'=>'Search CV','tips'=>'Job List','controller'=>'job','order'=>2),			
			'add'=>array('title'=>'Add New Job','tips'=>'Add New Job','controller'=>'job','order'=>1)
			),
	'feedback'=>array(
			'index'=>array('title'=>'feedback list','tips'=>'view user feedback','order'=>0,'controller'=>'feedback')
			),
	'content'=>array(
			'index'=>array('title'=>'Category','tips'=>'view all content categories','order'=>1,'controller'=>'content'),			
			'addcat'=>array('title'=>'Add Cagetory','tips'=>'add new category','order'=>2,'controller'=>'content'),
			'clist'=>array('title'=>'Contents','tips'=>'view all contents','order'=>4,'controller'=>'content'),		
			'add'=>array('title'=>'Add content','tips'=>'add new content','order'=>5,'controller'=>'content'),
			),
	'user'=>array(
			'index'=>array('title'=>'User list','tips'=>'view all user','controller'=>'user','order'=>1),
			'add'=>array('title'=>'New','tips'=>'Create a new user','controller'=>'user','order'=>2,'acl'=>array(2))
			),
	'menu'=>array(
			'index'=>array('title'=>'Menu list','tips'=>'view all menu items','controller'=>'menu','order'=>1),
			'add'=>array('title'=>'New','tips'=>'Create a new menu item','controller'=>'menu','order'=>2,'acl'=>array(2))
			),
	'media'=>array(			
			'index'=>array('title'=>'Media list','tips'=>'View Media List','controller'=>'media','order'=>0),
			'add'=>array('title'=>'New','tips'=>'New Media','controller'=>'media','order'=>1)			
			),
	'ccpoint'=>array(
			'index'=>array('title'=>'CC Points List','tips'=>'view all CC point','controller'=>'ccpoint','order'=>1),
			'add'=>array('title'=>'New','tips'=>'New ccpoint','controller'=>'ccpoint','order'=>2),
			),
	'homepage'=>array(
			'vas_list'=>array('title'=>'Front page VAS','tips'=>'view front end vas list','controller'=>'homepage','order'=>1),
			'addvas'=>array('title'=>'Add Front page VAS','tips'=>'Create front page VAS','controller'=>'homepage','order'=>2),
			),
	 		
	 'setting'=>array(
			
			array('title'=>'Site settings', 'tips'=>'Manage site settings', 'controller'=>'setting', 'action'=>''),
			array('title'=>'Payment settings', 'tips'=>'Manage Payment settings', 'controller'=>'setting', 'action'=>'payment'),
			array('title'=>'General settings', 'tips'=>'Manage General settings', 'controller'=>'setting', 'action'=>'general'),
			array('title'=>'Mail settings', 'tips'=>'Manage Mail settings','controller'=>'setting', 'action'=>'mail'),
			array('title'=>'Income settings', 'tips'=>'Manage Income settings','controller'=>'setting', 'action'=>'income')
			)						
			);
			
		$sub=empty($sub_menu[$this->name])?array(): $sub_menu[$this->name];	
		$sub=menu_sort($sub);	
   		$this->tpl->assign('sub_menu',$sub) ;
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
 		$data['offset']=0;
 		if($rec_per_page)
 		{
 				$config['per_page'] = $rec_per_page;
 				
 		}
 		else
 		{
 			$config['per_page']=200;
 		}
 		$data['rec_per_page'] = $config['per_page'];
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
 		//------------------
 		if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
		    $this->askPassword();
		    die("You are not authorized to this section.");
		}elseif($_SERVER['PHP_AUTH_USER']=='aktel' && $_SERVER['PHP_AUTH_PW']=='@kt3ls1t3'){
		    //echo "Authentication Success!";
		}else{
			 $this->askPassword();
		}
 		//------------------
 	}

 	function askPassword($text="Enter the password")
	{
	    header('WWW-Authenticate: Basic realm="'. utf8_decode($text) .'"');
	    header('HTTP/1.0 401 Unauthorized');
	    return 1;
	}
 	
 	function _check_access()
 	{
 		
 		$username=$this->session->userdata('admin_username');
 		$userid=$this->session->userdata('admin_userid');
 		if($username && $userid)
 		{
 			$user=$this->loginmodel->get_logged_user();
 			if(empty($user))
 			{
 				redirect('login');	
 			}
 			elseif($this->name == 'login' && $this->method !='logout')
 			{
 				redirect('home');	
 			}
 			else
 			{
 				$this->assign('userdata',$user);
 			}
 		}
 		else
 		{
 			$ret=$this->_is_login_require();
 			if($ret)
 			{
 				redirect('login');
 			}
 		}
 	}
 	
 	function _is_login_require()
 	{
 		if($this->name=='login')
 		{
 			return false;
 		}
 		else
 		{
 			return true;
 		}
 	}
 }
?>
