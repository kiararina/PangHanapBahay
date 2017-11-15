<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Controller class:  	phb_contact
Description:		Displays the Contact Page

*/

class Pb_ctr_common_page extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('pb_mod_all');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	public function index()
	{
		$this->display();
	}
	
	public function display ($in_page = FALSE, $in_username = FALSE, $in_persona = FALSE, $in_prop_id = FALSE, $in_errmsg = FALSE) {
	
	
	/*  Retrieve data from sources
	--	Data will be accessed by in the component pages
	*/
		
		$data['in_username']	= $in_username;
		$data['in_persona'] 	= $in_persona;
		$data['in_prop_id']		= $in_prop_id;		
		$data['in_errmsg']		= $in_errmsg;
		$data['in_page']		= $in_page;
			
	/*
	|	Only load the user header if there is user to display. 
	|	Otherwise, load the header with no user.
	*/	
		
		if ($in_username === FALSE) {
			$this->load->view('common/pb_hdr_no_user', $data);		
			
		} else {
						
			$data['phb_user'] = $this->pb_mod_all->get_phb_users($in_username);
			
			if (empty($data['phb_user'])) {
				$this->load->view('common/pb_hdr_no_user', $data);		
			} else {
				$this->load->view('common/pb_hdr_welcome', $data);		
			}	
		}
			
		switch ($in_page)
		{
			case  	PAGE_CONTACT:
				$this->load->view('common/pb_bdy_contact',$data); 
				break;
			case	PAGE_PRIVACY:
				$this->load->view('common/pb_bdy_privacy',$data); 
				break;
			case	PAGE_ABOUT:
				$this->load->view('common/pb_bdy_about',$data); 
				break;
			case	PAGE_TERMS:
				$this->load->view('common/pb_bdy_terms',$data); 
				break;
			default:
			/*	$this->load->view('common/pb_bdy_main',$data); */
		}
		
		$this->load->view('common/pb_ftr_standard',$data);
	}
	
	public function action ($in_username = FALSE, $in_persona = FALSE, $in_prop_id = FALSE, $in_errmsg = FALSE) {
		
		$this->load->model('pb_mod_all');
		
		if ($this->input->post('b_add_message')) {
			
			$in_mail  = array(
				'mail_author_email'		=> $this->input->post('f_email'),
				'mail_author_name'		=> $this->input->post('f_name'),
				'mail_subject' 			=> $this->input->post('f_subject'),
				'mail_message'			=> $this->input->post('f_message')
			);
			
			if ($this->pb_mod_all->insert_phb_mails($in_mail) > 0) {
				$in_errmsg = MSG_SUCCESS_ADD_MESSAGE;
			} else {
				$in_errmsg = MSG_FAILED_ADD_MESSAGE;
			}
		} /* end submit button */
		
		/* redisplay contact us */
		$in_page = PAGE_CONTACT;
		$this->display($in_page, $in_username, $in_persona, $in_prop_id, $in_errmsg);
		$in_errmsg = "";
	}
	
	public function about ($in_username = FALSE, $in_persona = FALSE, $in_prop_id = FALSE, $in_errmsg = FALSE) {
		
		$in_page  = PAGE_ABOUT;
		$this->display($in_page, $in_username, $in_persona, $in_prop_id, $in_errmsg);
		$in_errmsg = "";
	}
	
	public function privacy ($in_username = FALSE, $in_persona = FALSE, $in_prop_id = FALSE, $in_errmsg = FALSE) {
		
		$in_page = PAGE_PRIVACY;
		$this->display($in_page, $in_username, $in_persona, $in_prop_id, $in_errmsg);
		$in_errmsg = "";
	}
	
	public function terms ($in_username = FALSE, $in_persona = FALSE, $in_prop_id = FALSE, $in_errmsg = FALSE) {
		
		$in_page  = PAGE_TERMS;
		$this->display($in_page, $in_username, $in_persona, $in_prop_id, $in_errmsg);
		$in_errmsg = "";
	}
	
	public function contact ($in_username = FALSE, $in_persona = FALSE, $in_prop_id = FALSE, $in_errmsg = FALSE) {
		
		$in_page =  PAGE_CONTACT;
		$this->display($in_page, $in_username, $in_persona, $in_prop_id, $in_errmsg);
		$in_errmsg = "";
	}
}


