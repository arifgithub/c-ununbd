<?php
/*
 * Created on Mar 8, 2010
 * Created By arenamobile development team
 * 
 */
 class User extends MyCI_Controller
 {
 	 function __construct()
 	 {
 	 	parent::__construct();
 	 	$this->load->model(array('usermodel','admingroupmodel'));
 	 }
 	 
  	function index($sort_type='desc',$sort_on='id')
  	{
  		$this->tpl->set_js(array('jquery.statusmenu'));
  	    $labels=array('username'=>'Admin name','firstname'=>'First Name','email'=>'Email','admin_type'=>'Admin Type','status'=>'Status');
  		$this->assign('labels',$labels);
		$config['total_rows'] = $this->usermodel->count_list();
		$config['uri_segment'] = 5;
		$config['sort_on']=$sort_on;
		$config['sort_type']=$sort_type;
		$this->assign('grid_action',array('edit'=>'edit','del'=>'del'));
		$this->set_pagination($config);
  		$users=$this->usermodel->get_list();
  		$this->assign('records',$users);
  		$this->load->view('user/user_list');
  	}
  		
  	function add()
  	{
  		$this->tpl->set_page_title("Add new admin");	
		$this->load->library(array('form_validation'));
		$config = array(
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'trim|required|min_length[5]|max_length[20]|xss_clean|callback_duplicate_user_check'
                  ),
               array(
                     'field'   => 'passwd',
                     'label'   => 'Password',
                     'rules'   => 'trim|required|matches[confirm_password]|md5'
                  ),
               array(
                     'field'   => 'confirm_password',
                     'label'   => 'Confirmation',
                     'rules'   => 'required'
                  ),  
               array(
                     'field'   => 'id_admin_group',
                     'label'   => 'Admin Group',
                     'rules'   => 'required'
                  ), 
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email|callback_duplicate_email_check'
                  ),
                  array(
                     'field'   => 'firstname',
                     'label'   => 'First Name',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'address',
                     'label'   => 'Address',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'city',
                     'label'   => 'City',
                     'rules'   => 'required'
                  ),
                   array(
                     'field'   => 'mobile',
                     'label'   => 'Mobile number',
                     'rules'   => 'trim|required'
                  )
            );
	  	$this->form_validation->set_rules($config);
	  	$this->form_validation->set_error_delimiters('<span class="verr">', '</span>');
	  	if ($this->form_validation->run() == FALSE)
		{
			 $admin_group_options=$this->admingroupmodel->group_option();
	 		 $this->assign('admin_group_options',$admin_group_options);
			 $this->load->view('user/new_user');
		}
		else
		{
			$user_id=$this->usermodel->add();
			if($user_id)
			{
				$this->session->set_flashdata('message',"<div class='info'>User has been created successfully</div>");
				redirect('user');
			}
		}
  	 
  	  
  	} 
 	
 	/*check duplicate email for validation*/
	function duplicate_email_check($str,$param='')
    {
    	
		$query = $this->db->query("SELECT id FROM admin where email='$str' AND email<>'$param'");
       if($query->num_rows()>0)
       {
          $this->form_validation->set_message('duplicate_email_check', "%s <span style='color:green;'>$str</span> already exists");
		 	 	 return false;
       }
       return true;
	}
	
	/* validation function for checking username uplicacy*/
	
	function duplicate_user_check($str,$param='')
  	{
      $query = $this->db->query("SELECT id FROM admin where username='$str' AND username<>'$param'");
       if($query->num_rows()>0)
       {
          $this->form_validation->set_message('duplicate_user_check', "%s <span style='color:green;'>$str</span> already exists");
		 	 	 return false;
       }
       return true;
  
  	}
	
	function edit($id)
	{
		$this->tpl->set_page_title("Edit admin information");	
		$this->load->library(array('form_validation'));
		$user=$this->usermodel->get_record($id);
		$config = array(
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'trim|required|min_length[5]|max_length[20]|xss_clean|callback_duplicate_user_check['.$user['username'].']'
                  ),
               array(
                     'field'   => 'passwd',
                     'label'   => 'Password',
                     'rules'   => 'trim|matches[confirm_password]|md5'
                  ),  
               array(
                     'field'   => 'id_admin_group',
                     'label'   => 'Admin Group',
                     'rules'   => 'required'
                  ), 
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email|callback_duplicate_email_check['.$user['email'].']'
                  ),
                  array(
                     'field'   => 'firstname',
                     'label'   => 'First Name',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'address',
                     'label'   => 'Address',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'city',
                     'label'   => 'City',
                     'rules'   => 'required'
                  ),
                   array(
                     'field'   => 'mobile',
                     'label'   => 'Mobile number',
                     'rules'   => 'trim|required'
                  )
            );
	  	$this->form_validation->set_rules($config);
	  	$this->form_validation->set_error_delimiters('<span class="verr">', '</span>');
	  	$this->form_validation->set_message('matches','confirm password did not match with password');
	  	if ($this->form_validation->run() == FALSE)
		{
			 $admin_group_options=$this->admingroupmodel->group_option();
			 $this->assign($user);
	 		 $this->assign('admin_group_options',$admin_group_options);
	 		 $status_option=array('ACTIVE'=>'Active','PENDING'=>'Pending','INACTIVE'=>'Inactive');
	 		 $this->assign('status_option',$status_option);
			 $this->load->view('user/edit_user');
		}
		else
		{  
			$password=$this->input->post('passwd');
			if(empty($password))
			{
				$_POST['passwd']=$user['passwd'];
			} 
			$this->usermodel->edit($id);
			$this->session->set_flashdata('message',"<div class='info'>User has been updated successfully</div>");
			$this->db->last_query();
			redirect('user');
		}
  	 		
	}
	
	function set_status($id,$val)
	{
	  	$this->usermodel->change_status($id,$val);
	  	$this->session->set_flashdata('message',"<div class='info'>User status has been changed successfully.</div>");
	  	redirect('user');
	}
	
	function del($id)
	{
		$present_user_id=$this->session->userdata('userid');
		if($present_user_id == $id)
		{
			$this->session->set_flashdata('message',"<div class='err'>You can not delete yourself.</div>");
	  	    redirect('user');
		}
		else
		{
			$this->usermodel->del($id);
			$this->session->set_flashdata('message',"<div class='info'>User hasbeen deleted successfully.</div>");
	  	    redirect('user');
		}
	}
 }
?>
