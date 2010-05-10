<?php
/*
 * Created on Apr 1, 2010
 * 
 * Created By ARENA MOBILE DEVELOPMENT TEAM (@ Reza Ahmed )
 * 
 */
 class Homepage extends MyCI_Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model(array('homepagemodel'));
 	}
 
  	 
 	function vas_list($sort_type='desc',$sort_on='id')
  	{
  		$this->tpl->set_js(array('jquery.statusmenu'));
  	    $labels=array('fctitle'=>'Title','order'=>'Order','status'=>'Status','ctitle'=>'Assigned Content','fctips'=>'tips');
  		$this->assign('labels',$labels);
		$config['total_rows'] = $this->homepagemodel->count_vas_list();
		$config['uri_segment'] = 5;
		$config['sort_on']=$sort_on;
		$config['sort_type']=$sort_type;
		$this->set_pagination($config);
  		$vas=$this->homepagemodel->vas_list();
  		$this->assign('records',$vas);
  		$this->assign('grid_action',array('edit'=>'editvas','del'=>'delvas'));
  		$this->load->view('homepage/vas_list');
  	}
  	
  	function addvas()
  	{
  		$data['page_title']="Create frontpage VAS list";	
		$this->load->library(array('form_validation'));
		$config = array(
               array(
                     'field'   => 'title',
                     'label'   => 'Title',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'id_content',
                     'label'   => 'Content',
                     'rules'   => 'required'
                  )    
            );
	  	$this->form_validation->set_rules($config);
	  	$this->form_validation->set_error_delimiters('<span class="verr">', '</span>');
	  	if ($this->form_validation->run() == FALSE)
		{
			$status_option=array('1'=>'Publish','0'=>'Unpublish');
			$this->assign('status',1);
			$this->assign('status_option',$status_option);
			$this->load->model('contentmodel');
			$content_list=$this->contentmodel->options();
			$this->assign('content_option',$content_list);
			$this->load->view('homepage/add_vas');
		}
		else
		{
			$this->homepagemodel->add_vas();
			$this->session->set_flashdata('message',"<div class='info'> list has been created successfully</div>");
			redirect('homepage/vas_list');
			
		}
  		
  		
  	}
  	
  	function editvas($id)
  	{
  		
  		$data['page_title']="Create frontpage VAS list";	
		$this->load->library(array('form_validation'));
		$config = array(
               array(
                     'field'   => 'title',
                     'label'   => 'Title',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'id_content',
                     'label'   => 'Content',
                     'rules'   => 'required'
                  )    
            );
	  	$this->form_validation->set_rules($config);
	  	$this->form_validation->set_error_delimiters('<span class="verr">', '</span>');
	  	if ($this->form_validation->run() == FALSE)
		{
			$row=$this->homepagemodel->content_row($id);
			$this->assign($row);
			$status_option=array('1'=>'Publish','0'=>'Unpublish');
			$this->assign('status_option',$status_option);
			$this->load->model('contentmodel');
			$content_list=$this->contentmodel->options();
			$this->assign('content_option',$content_list);
			$this->load->view('homepage/edit_vas');
		}
		else
		{
			$this->homepagemodel->edit_vas($id);
			$this->session->set_flashdata('message',"<div class='info'> list has been updated created successfully</div>");
			redirect('homepage/vas_list');
			
		}
  		
  	}
  	
  	function delvas($id)
  	{
  		
  		$this->homepagemodel->del($id);
  		$this->session->set_flashdata('message',"<div class='info'> list has been deleted created successfully</div>");
		redirect('homepage/vas_list');
  	}
  	
  	function set_status($id,$val)
	{
	  	$this->homepagemodel->change_status($id,$val);
	  	$this->session->set_flashdata('message',"<div class='info'>List status has been changed successfully.</div>");
	  	redirect('homepage/vas_list');
	}
 	
 }
?>
