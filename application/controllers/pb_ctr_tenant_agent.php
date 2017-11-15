<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pb_ctr_tenant_agent extends CI_Controller {

    function index() {
	
			
	if($this->session->userdata('is_logged_in')) 
	{
		if($this->session->userdata('user_persona')== 3)
		{
			$data = array( 
			'persona_logged_in' => TRUE,
			);
			$this->session->set_userdata($data);
			$userpersona = $this->session->userdata('persona_logged_in');
			if ($userpersona==1) {
				//$userpersona = 0;
				$this->load->view('common/pb_hdr_header');
				$this->load->view('common/pb_hdr_carousel');
				$this->load->view('tenant/index');
				$this->load->view('common/pb_ftr_footer');
			}
			elseif($userpersona==0) {
				//$userpersona = 1;
				$this->load->view('common/pb_hdr_header');
				$this->load->view('common/pb_hdr_carousel');
				$this->load->view('agent/index');
				$this->load->view('common/pb_ftr_footer');
			
			}
		
		}
			
		
		else
		{
			$this->load->view('common/pb_hdr_header');
			$this->load->view('common/pb_hdr_carousel');
			$this->load->view('public/index');
			$this->load->view('common/pb_ftr_footer');
		}
    }else{
        	$this->load->view('common/pb_hdr_header');
			$this->load->view('common/pb_hdr_carousel');
			$this->load->view('public/index');
			$this->load->view('common/pb_ftr_footer');
        }
	
     
    }
}	