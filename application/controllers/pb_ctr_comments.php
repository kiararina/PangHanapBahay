<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Controller class:  	phb_comments
Description:		display the comments page

*/

class Pb_ctr_comments extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('pb_mod_all');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
	}

	public function index() {

		$this->display();
	}
	
	public function display($in_prop_id = FALSE) {

	/* retrieve session data */
		$in_username = $this->session->userdata('user_username');
		$in_show_all = $this->session->userdata('show_all_comments');
		
		$data['in_username']	= $in_username;
		$data['in_prop_id'] 	= $in_prop_id;
		
	/*
	| Load the header
	*/
		$this->load->view('common/pb_hdr_header');
	/*
	| If user is not logged in do not load page body, instead show an error message.
	*/
		if ($in_username === FALSE) {
				$data['in_message'] = MSG_USER_NOT_LOGGED_IN;
				$this->load->view('common/pb_bdy_error_message', $data);
		} else {
	/*
	|	Load the property details only when there is property to display, that is property exists in 
	| 	in the database
	*/
			if ($in_prop_id !== FALSE) {
			
				$data['phb_prop'] = $this->pb_mod_all->get_phb_prop($in_prop_id, TRUE);
				
				if (empty($data['phb_prop'])) {
					$data['in_message'] = sprintf(MSG_PROP_ID_NOT_FOUND, $in_prop_id);
					$this->load->view('common/pb_bdy_error_message', $data);
				} else {
				/*
				| retrieve primary picture
				*/
					$data['phb_prop_pics'] = $this->pb_mod_all->get_phb_prop_pics($in_prop_id, TRUE);
					$this->load->view('common/pb_bdy_property_info', $data);
		/*
		|	Load blank comment field and all the comments about the property		
		*/				
					$data['phb_comments'] = $this->pb_mod_all->get_phb_prop_comments($in_prop_id, $in_show_all, $in_username);
					$this->load->view('common/pb_bdy_comments', $data);	
									
				}
			}
		}
	/*
	}	Load the footer
	*/

		$this->load->view('common/pb_ftr_footer');

	} /* end view function */
	
	public function action($in_prop_id = FALSE) {
/*
|	This function process actions on comment page
*/

/*	set variables */
		$this->session->set_userdata('error_message', NULL);
		$in_username = $this->session->userdata('user_username');
		$in_show_all = $this->session->userdata('show_all_comments');
		
	/*
	|	Process button to show all or own comments
	*/
	
		if ($this->input->post('b_show_own_comments')) {
			if ($in_show_all == TRUE) {
				$in_show_all = FALSE;
			} else {
				$in_show_all = TRUE;
			}
			/* save session preference */
			$this->session->set_userdata('show_all_comments', $in_show_all);
		}
	/* 
	|   Process add button
	*/
		if ($this->input->post('b_add_comment')) {
			
			$this->session->set_userdata('anchor_location',0);
			
			if ($this->pb_mod_all->insert_phb_prop_comments($in_prop_id, $in_username)> 0) {
				$this->session->set_userdata('error_message', MSG_SUCCESS_ADD_COMMENT);
			} else {
	/*
	| 			Redisplay view, and show error message
	*/
				$this->session->set_userdata('error_message', MSG_FAILED_ADD_COMMENT);
			}
			
		} /* end add button */

	/*
	|	Process delete button
	*/
		if ($this->input->post('b_del_comment')) {
		
			
			$in_comment_id = $this->input->post('f_comment_id');
			$comment_dtime = $this->input->post('f_datetime');
			
			$in_anchor = $this->input->post('f_counter');
	
			
			if ($this->pb_mod_all->delete_phb_prop_comments($in_comment_id)> 0) {
				$this->session->set_userdata('error_message', sprintf(MSG_SUCCESS_DEL_COMMENT, $comment_dtime));
				$in_anchor = $in_anchor - 1;
							
			} else {
				$this->session->set_userdata('error_message', sprintf(MSG_FAILED_DEL_COMMENT, $comment_dtime));
			}
			
			$this->session->set_userdata('anchor_location', $in_anchor);		
			
		} /* end if add button is clicked */	
	/*
	|	Process update button
	*/
		if ($this->input->post('b_upd_comment')) {
		
			$in_comment_id = $this->input->post('f_comment_id');
			$comment_dtime = $this->input->post('f_datetime');
			
			$in_anchor = $this->input->post('f_counter');
			
			if ($this->pb_mod_all->update_phb_prop_comments($in_prop_id, $in_username, $in_comment_id)> 0) {
				$this->session->set_userdata('error_message', sprintf(MSG_SUCCESS_UPD_COMMENT, $comment_dtime));
			} else {
				$this->session->set_userdata('error_message', sprintf(MSG_FAILED_UPD_COMMENT, $comment_dtime));
			}
			
			$this->session->set_userdata('anchor_location', $in_anchor);	
			
		} /* end if update button is clicked */	

	/*
	|	Load the page
	*/
	
		$this->display($in_prop_id);		
		$this->session->set_userdata('error_message', NULL);

	} /* end function  */
}
?>