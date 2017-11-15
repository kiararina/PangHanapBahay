<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pb_ctr_contact extends CI_Controller
{
  
      public function index()
      {
       
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	  $this->form_validation->set_rules('message', 'Message', 'trim|required');
	  
	  $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); //chk css internal style in view/pb_hdr_header  to change the colors of validation error
		
       if ($this->form_validation->run() == FALSE)
      {
			$this->load->view('common/pb_hdr_header');
			$this->load->view('common/pb_bdy_contact');
			$this->load->view('common/pb_ftr_footer');
       }
       else
      {
		$developer_email = 'thealliance.phb@gmail.com';
        $user_email= $this->input->post('email');
		$message= $this->input->post('message');
		

		//now we will send an email
		
		$config = Array(		
		    'protocol' => 'mail',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'thealliance.phb@gmail.com',
		    'smtp_pass' => 'ki@ra-1234',
		    'smtp_timeout' => '4',
		    'mailtype'  => 'text', 
		    'charset'   => 'iso-8859-1'
		);
		
		 
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($user_email);
		$this->email->to($developer_email);
	

		$this->email->subject('Comments and Suggestions');
		$this->email->message($message );
		$this->email->send();
		
		$this->load->view('common/pb_hdr_header');		
		$this->load->view('common/pb_bdy_contact_success');		
		$this->load->view('common/pb_ftr_footer');

		}
	}

   
}



