<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pb_ctr_login extends CI_Controller {
	
    function index()
	{
		//if($this->session->userdata('is_logged_in')){
		//	redirect('tenant');
       // }else{
        	$this->load->view('common/pb_hdr_header');
			$this->load->view('common/pb_hdr_carousel');
			$this->load->view('public/index');
			$this->load->view('common/pb_ftr_footer');
      //  }
	}

    function __encrip_password($user_password) {
        return sha1($user_password);
    }	

    function validate_credentials()
	{	
	
		$this->load->model('Pb_mod_login');
		
		$user_username = $this->input->post('user_username');
		$user_password = $this->__encrip_password($this->input->post('user_password'));
		$is_valid = $this->Pb_mod_login->validate($user_username, $user_password);
		
		$this->session->set_userdata('message_error', FALSE);
		
		if($is_valid)
		{
			$data = array(
				'user_username' => $user_username,
				'is_logged_in' => true,
				//'user_persona' => $details,				 
			);
			$this->session->set_userdata($data);
				//echo "<pre>";
				//print_r($data);
				//echo "</pre>";
				//exit;  
				
					
				$this->db->where('user_username', $user_username);
				$query = $this->db->get('tbl_users');
				
				if($query->num_rows == 1)
				{
					$row = $query->row();
					$myid =$row->id;
					$mypass =$row->user_password;
					$details = $row->user_persona;
					$firstname = $row->user_first_name;
					$middlename = $row->user_middle_name;
					$lastname = $row->user_last_name;
					$email = $row->user_email_addr;
					$affiliation = $row->user_affiliation;
					
					
					$data1 = array(
					'id'=>$myid,
					'user_persona'=> $details,
					'user_first_name' => $firstname,
					'user_password' => $mypass,
					'user_middle_name' => $middlename,
					'user_last_name' => $lastname,
					'user_email_addr' => $email,
					'user_affiliation' => $affiliation,
					'user_type_page' => 'tenant'
					);
					//$this->session->set_userdata($data1);		
					//print_r ($data1);
					//exit;  					
					 
				
					if ($details == 1 OR $details == 3) {
						$data1['user_type_page'] = 'tenant';
						$this->session->set_userdata($data1);	
						redirect ('pb_ctr_tenant');
					//	return true;
					}
					else
					if ($details == 2) {
						$data1['user_type_page'] = 'agent';
						$this->session->set_userdata($data1);							
						redirect('pb_ctr_agent');
					//	return true;
					}
					/*else
					if ($details == 3) {	
						$data1['user_type_page'] = 'tenant';
						$this->session->set_userdata($data1);							
						redirect ('tenant');				
					//	redirect('tenant_agent');
					//	return true;
					}  */
				}		
				
			//redirect('tenant');
		
		}
		else // incorrect username or password
		{
			$this->session->set_userdata('message_error', TRUE);
			
			$this->load->view('common/pb_hdr_header');
			$this->load->view('common/pb_hdr_carousel');
			$this->load->view('public/index');
			$this->load->view('common/pb_ftr_footer');
			
		}
	}
	
    function logout()
	{
		$this->session->sess_destroy();
		redirect('pb_ctr_home');
	}

}
