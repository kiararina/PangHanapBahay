<?php

class pb_ctr_change_pass extends CI_Controller {
 
public function __construct()
 {
  parent::__construct();
  
	if($this->session->userdata('is_logged_in')) 
	{
	 	$this->changepwd();
	
	}else{
        $this->load->view('common/pb_hdr_header');
		$this->load->view('common/pb_hdr_carousel');
		$this->load->view('public/index');
		$this->load->view('common/pb_ftr_footer');
    }
  
 }
 
 
    public function changepwd()
 
 {
  
    $this->load->library('form_validation');
    $this->form_validation->set_rules('opassword','Old Password','required|trim|xss_clean|callback_change');
    $this->form_validation->set_rules('npassword','New Password','required|trim||min_length[6]|max_length[30]');
    $this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[npassword]');
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    if ($this->form_validation->run() == FALSE)
     { 
     //echo validation_errors();
	$this->load->view('common/pb_hdr_header');
	$this->load->view('common/user/reset');
	$this->load->view('common/pb_ftr_footer');
    }
 }
   
   public function change() // we will load models here to check with database
  
  {
	$db_id 		 =	$this->session->userdata('id');
	$db_password =	$this->session->userdata('user_password');
	  

    if ((sha1($this->input->post('opassword',$db_password)) == $db_password) && ($this->input->post('npassword') != '') && ($this->input->post('cpassword')!='')) 
	{ 
		if($this->input->post('npassword')!=$this->input->post('opassword'))
		{
		$fixed_pw = sha1($this->input->post('npassword'));
		$update = $this->db->query("Update tbl_users SET user_password='$fixed_pw' WHERE id='$db_id'")or die(mysql_error()); 
 
		$this->form_validation->set_message('change','<strong><span style="color:#000000;">Password Updated!</span></strong>');
		return false;
		}
		else
		{
		$this->form_validation->set_message('change','<strong>Same with old password</strong>');
		return false;
		}
    }   
	else  
	{
		$this->form_validation->set_message('change','<strong>Wrong Old Password!</strong>');
		return false;
	}
}
  
}
?>