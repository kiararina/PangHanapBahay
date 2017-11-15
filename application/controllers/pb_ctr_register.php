<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pb_ctr_register extends CI_Controller {

	public function index()
	{
	
		// setup textCAPTCHA
		try {
			//$xml = @new SimpleXMLElement('http://textcaptcha.com/api/gl40mdln6800kg80c8o4c8ss8ud0wh0i', NULL, TRUE);
			$xml = @new SimpleXMLElement('http://textcaptcha.com/api/dmj567ure7sw4k4k8ccgskgoo1n1k73i', NULL, TRUE);
			
		} catch ( Exception $e ) {
			 $fallback = '<captcha>'.
			'<question>Is ice hot or cold?</question>'.
			'<answer>'.md5('cold').'</answer></captcha>';
			$xml = new SimpleXMLElement($fallback);
		}

		// store answers in session for use later
		$answers = array();
		foreach( $xml->answer as $hash )
		{
			$answers[] = (string)$hash;
		}
		$this->session->set_userdata('captcha_answers', $answers);

		// load vars into view
		$this->load->vars(array( 'captcha' => (string)$xml->question ));

		// load the view
		 
		$this->load->view('common/pb_hdr_header');
		$this->load->view('common/register/pb_ctr_register');
		$this->load->view('common/pb_ftr_footer');
		
	}	
	
		 
 function check_captcha( $string )
	{
		$user_answer = md5(strtolower(trim($string)));
		$answers = $this->session->userdata('captcha_answers');

		if( in_array($user_answer, $answers) )
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_captcha', 'Your answer was incorrect!');
			return FALSE;
		}
	}
 
 
	////////////////////////////////////////////////////////////////////////////////////////
	function create_member()
	{
		$this->load->library('form_validation');
				
		// field name, error message, validation rules
		$this->form_validation->set_rules('user_first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('user_middle_name', 'trim');		
		$this->form_validation->set_rules('user_last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('user_affiliation', 'trim');
		$this->form_validation->set_rules('user_persona', 'Persona', 'trim|required');
		$this->form_validation->set_rules('user_email_addr', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('user_username', 'Username', 'trim|required|min_length[4]|max_length[30]');
		$this->form_validation->set_rules('captcha', 'captcha', 'trim|callback_check_captcha|required' );
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[4]|max_length[30]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[user_password]');
		
		$this->form_validation->set_error_delimiters('<div class="form_error">','</div>');
		/*$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');*/
		
		if($this->form_validation->run() == FALSE){
			$this->index();
			//$this->load->view('overall/header_mini');
			//$this->load->view('public/register');
			//$this->load->view('overall/footer');
		}else
		{			
			$this->load->model('Pb_mod_register');
			if($query = $this->Pb_mod_register->create_member())
			{
				$this->load->view('common/pb_hdr_header');
				$this->load->view('common/register/pb_ctr_success');
				$this->load->view('common/pb_ftr_footer');
				
			}
			else
			{
				$this->index();
			
			}
		}
		
	}

	
}