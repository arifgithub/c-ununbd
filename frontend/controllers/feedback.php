<?php
/*
 * Created on Mar 16, 2010
 *
 * Created by Arena Development Team(@ Reza Ahmed  & shuvankar Halder)
 */
class Feedback extends MyCI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('feedbackmodel');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->tpl->set_page_title('UNUN - Restaurant :: Feedback');
		$this->load->view('feedback', $data);
	}

	function submit()
	{
		$this->tpl->set_page_title('UNUN - Restaurant :: Feedback');
		$config[] = array(
			'field'   => "full_name",
			'label'   => '"Full Name"',
			'rules'   => 'trim|required'
		);
		$config[] = array(
		'field'   => "contact",
		'label'   => '"Contact Number"',
		'rules'   => 'trim|required'
		);
		$config[] = array(
		'field'   => "message",
		'label'   => '"Message"',
		'rules'   => 'trim|required'
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="red">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('feedback');
		}else{
			$ok = $this->feedbackmodel->submit();
			if($ok){
			$msg = '<h1>Thank you for submitting your comments!</h1>';
			$this->tpl->assign('message', $msg);
			$this->load->view('home/message');
			}else{
				$this->tpl->assign('msg', '<span>warning:</span> Error occurred. Please try again later.');
				$this->load->view('feedback');
			}
		}
	}


}
?>
