<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pb_ctr_forgot extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
      }

	public function index(){
	
		if(($this->input->post('email')!= "" || $this->input->post('f_username')== "" )){
		$this->myemail();
		}elseif(($this->input->post('email')== "" || $this->input->post('f_username')!= "" )){
		$this->myusername();
		}

			
	}	
	  
	public function myemail()
		{
       
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('common/pb_hdr_header');		
			$this->load->view('common/forgot/email_check');
			$this->load->view('common/pb_ftr_footer');
		}
		else
		{
        $email= $this->input->post('email');

		$this->load->helper('string');
		$rs= random_string('alnum', 12);

		$data = array(
               'rs' => $rs
            );
		$this->db->where('user_email_addr', $email);
		$this->db->update('tbl_users', $data);
		
			
				$this->db->where('user_email_addr', $email);
				$query = $this->db->get('tbl_users');
		
				if($query->num_rows == 1)
				{
					$row = $query->row();
					$firstname = $row->user_first_name;
					$data1 = array(
					'user_first_name'=> $firstname,
					);
					$this->session->set_userdata($data1);		
				}	

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
				
		$this->email->from('no-reply@panghanapbahay.com', 'Panghanapbahay');
		$this->email->to($email);
		$this->email->cc('mlsantos99@yahoo.com'); 
		//$this->email->cc($list_email);

		$this->email->subject('Get your forgotten Password');
		$this->email->message('Dear: '.$firstname. 
		'
		You have requested to have your password reset. You may enter your new password through this link
        http://site2.phb.url.ph/pb_ctr_forgot_get_password/index/'.$rs. 
		'
		You have until after 24 hours to reset your password, else the link  will no longer work.
		
		
		Panghanapbay
		'
		);
				
		$this->email->send();
		//echo "Please check your email address.";
		$this->load->view('common/pb_hdr_header');		
		$this->load->view('common/forgot/success');
		$this->load->view('common/pb_ftr_footer');

		}
	}

    public function email_check($str)
      {
		$query = $this->db->get_where('tbl_users', array('user_email_addr' => $str), 1);
        if ($query->num_rows()== 1)
		{
            return true;
            }
            else
            {    
        $this->form_validation->set_message('email_check', '<strong><span style="color:#FF002A;">This Email does not exist.</span></strong>');
        return false;

      }
   }  
   
   ////////////////////////////////
   public function myusername()	{
       
		$this->form_validation->set_rules('f_username', 'Username', 'trim|required|callback_username_check');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('common/pb_hdr_header');		
			$this->load->view('common/forgot/email_check');
			$this->load->view('common/pb_ftr_footer');
		}
		else
		{
        $my_username= $this->input->post('f_username');

		
		//now we will send an email
		$this->db->where('user_username', $my_username);
		$query = $this->db->get('tbl_users');
		
		if($query->num_rows == 1)
				{
					$row = $query->row();
					$email = $row->user_email_addr;
					
					$data = array(
					'user_email_addr' => $email,
				
					);
				
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
		$this->email->from('no-reply@panghanapbahay.com', 'Panghanapbahay');
		$this->email->to($email);
		$this->email->cc('mlsantos99@yahoo.com'); 
		
		$this->email->subject('Your Username');
		
		$this->email->message('Your Username is: '.$my_username.
		'
		Thank you.' );
	

		$this->email->send();
		
		$this->load->view('common/pb_hdr_header');		
		$this->load->view('common/forgot/success');
		$this->load->view('common/pb_ftr_footer');

		}
		}
	}
    public function username_check($str)
      {
		$query = $this->db->get_where('tbl_users', array('user_username' => $str), 1);
        if ($query->num_rows()== 1)
		{
            return true;
            }
            else
            {    
        $this->form_validation->set_message('username_check', '<strong><span style="color:#FF002A;">This Username does not exist.</span></strong>');
        return false;

      }
   }  
   
   
   ///////////////////////////////////
   
   
 




}