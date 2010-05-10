<?php
/*
 * Created on Mar 16, 2010
 *
 * Created by Arena Development Team(@ Reza Ahmed  & shuvankar Halder)
 */
class Home extends MyCI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('homemodel');
	}

	function index()
	{
		$this->tpl->set_page_title('UNUN :: Home');
		$this->load->view('home/home_page', $data);
	}

	function login()
	{
		$config[] = array(
			'field'   => "user_name",
			'label'   => '"User Name"',
			'rules'   => 'trim|required'
			);
			$config[] = array(
		'field'   => "user_password",
		'label'   => '"Password"',
		'rules'   => 'trim|required'
		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="red">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('home/login');
		}else{
			if($this->homemodel->check_user_login()){
				$row = $this->homemodel->get_user_info($this->input->post('user_name'));
				$this->session->set_userdata($row);
				redirect(site_url()."/home/");
			}else{
				$this->tpl->assign('msg', '<span>warning:</span> User name / Password is incorrect!');
				$this->load->view('home/login');
			}
		}
	}

	function logout()
	{
		$reset = array(
		'user_name'=>'',
		'user_password'=>'', 
		'full_name'=>'', 
		'contact'=>'', 
		'email'=>'', 
		'address'=>''
		);
		$this->session->unset_userdata($reset);
		redirect(site_url()."/home/");
	}

	function signup($action="")
	{
		$this->load->library('form_validation');

		if($action=='save'){
			$config = $this->signup_validation_config();
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<span class="red">', '</span>');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('home/signup');
			}else{
				if(!$this->homemodel->is_user_name_exists($this->input->post('user_name'))){
					$this->homemodel->signup();
					$msg = '<h1>Thank you for subscription!</h1><h4>Click <a href="'.site_url().'/home/login">here</a> to login.</h4>';
					$this->tpl->assign('message', $msg);
					$this->load->view('home/message');
				}else{
					$this->tpl->assign('msg', '<span>warning:</span> User name exists. Choose another please!');
					$this->load->view('home/signup');
				}
			}
		}else{
			$this->load->view('home/signup');
		}
	}

	function signup_validation_config()
	{
		$config[] = array(
			'field'   => "user_name",
			'label'   => '"User name"',
			'rules'   => 'trim|required'
			);
			$config[] = array(
			'field'   => "user_password",
			'label'   => '"Password"',
			'rules'   => 'trim|required|matches[user_password_confirm]'
			);
			$config[] = array(
			'field'   => "user_password_confirm",
			'label'   => '"Confirm password"',
			'rules'   => 'trim|required'
			);
			$config[] = array(
			'field'   => "full_name",
			'label'   => '"Full name"',
			'rules'   => 'trim|required'
			);
			$config[] = array(
			'field'   => "contact",
			'label'   => '"Contact number"',
			'rules'   => 'trim|required'
			);

			return $config;
	}

}
?>
