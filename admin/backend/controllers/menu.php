<?php
/*
 * Created on Mar 10, 2010
 * Created By Arena development team @ Reza Ahmed
 */
 class Menu extends MyCI_Controller
 {
 	 function __construct()
 	 {
 	 	parent::__construct();
 	 	$this->load->model(array('menumodel'));
 	 	$this->tpl->set_page_title('Menu manager');
 	 }
  function index($sort_type='desc',$sort_on='c.create_date')
  {
  	$labels=array('id'=>'ID','mtitle'=>'Title','order'=>'Order','ctitle'=>'Assigned Content','status'=>'Status');
  	$this->tpl->set_js(array('jquery.statusmenu'));
	$this->assign('labels',$labels);
	$config['total_rows'] = $this->menumodel->count_list();
	$config['uri_segment'] = 5;
	$config['sort_on']=$sort_on;
	$config['sort_type']=$sort_type;
	$this->set_pagination($config);
	$menu=$this->menumodel->get_list();
	$this->assign('records',$menu);
  	$this->load->view('menu/menu_list');
  }	
  
  function add()
  {
  		$data['page_title']="Create menu item";	
		$this->load->library(array('form_validation'));
		$config = array(
               array(
                     'field'   => 'title',
                     'label'   => 'Title',
                     'rules'   => 'trim|required'
                  )
            );
	  	$this->form_validation->set_rules($config);
	  	$this->form_validation->set_error_delimiters('<span class="verr">', '</span>');
	  	if ($this->form_validation->run() == FALSE)
		{
			 $status_option=array('PUBLISH'=>'Publish','UNPUBLISH'=>'Unpublish');
			 $menu_items=$this->menumodel->get_menu();
			 $this->load->model('contentmodel');
			 $content_list=$this->contentmodel->options();
			 $this->assign('content_option',$content_list);
			 $this->assign('menu_tree',$menu_items);
	 		 $this->assign('status_option',$status_option);
			 $this->load->view('menu/new_menu');
		}
		else
		{
			$menu_id=$this->menumodel->add();
			if($menu_id)
			{
				$this->menumodel->set_child($this->input->post('parent_id'));
				$this->session->set_flashdata('message',"<div class='info'>menu item has been created successfully</div>");
				redirect('menu');
			}
		}
  	 
  	  
  } 
  
 function edit($id='')
  {
  		$data['page_title']="Edit menu item";	
		$this->load->library(array('form_validation'));
		$config = array(
               array(
                     'field'   => 'title',
                     'label'   => 'Title',
                     'rules'   => 'trim|required'
                  )
            );
	  	$this->form_validation->set_rules($config);
	  	$this->form_validation->set_error_delimiters('<span class="verr">', '</span>');
	  	if($this->form_validation->run() == FALSE)
		{
			 $row=$this->menumodel->get_record($id);
  			 $this->assign($row);
			 $status_option=array('PUBLISH'=>'Publish','UNPUBLISH'=>'Unpublish');
			 $menu_items=$this->menumodel->get_menu(array('id !='=>$id));
			 $this->assign('menu_tree',$menu_items);
			 $this->load->model('contentmodel');
			 $content_list=$this->contentmodel->options();
			 $this->assign('content_option',$content_list);
	 		 $this->assign('status_option',$status_option);
			 $this->load->view('menu/edit_menu');
		}
		else
		{
			$id=$this->input->post('id');
			$old_pid=$this->menumodel->f('parent_id',$id);
			$pid=$this->menumodel->edit($id);
			//echo $this->db->last_query();
			$this->menumodel->set_child($pid);
			//echo $this->db->last_query();
			$child=$this->menumodel->count_child($old_pid);
			//echo	$this->db->last_query();
			if($child==0)
			{
				$this->menumodel->set_no_child($old_pid);	
			}
			//echo	$this->db->last_query();
			$this->session->set_flashdata('message',"<div class='info'>menu item has been edited successfully</div>");
			redirect('menu');	
		}
		
  	 
  	  
  } 
  
  function del($id='')
  {
  	$child=$this->menumodel->count_child($id);
  	if($child>0)
  	{
  		$this->session->set_flashdata('message',"<div class='error'>Please delete child first.</div>");
  	}
  	else
  	{
  		$this->menumodel->del($id);
  		$this->session->set_flashdata('message',"<div class='info'>Item has been deleted successfully.</div>");
  		redirect('menu');
  	}
  	
  }
  
  function set_status($id,$val)
  {
  	$row=$this->menumodel->get_record($id);
  	switch($val)
  	{
	  	case 'unpublish':
					  	if($row['parent_id']!=0)
					  	{
					  		$child_num=$this->menumodel->count_published_child($row['parent_id']);
					  		if($child_num == 1)
					  		{
					  			$this->menumodel->set_no_child($row['parent_id']);
					  		}
					  	}
					  	break;
		case 'publish':
						if($row['parent_id']!=0)
				  		{
					  		
					  		$this->menumodel->set_child($row['parent_id']);
					  		
				  		}	
				  		break;
					  	
  	}  	
	  	
  	$this->menumodel->change_status($id,$val);
  	$this->session->set_flashdata('message',"<div class='info'>Item status has been changed successfully.</div>");
  	redirect('menu');
  }
  
 }
?>
