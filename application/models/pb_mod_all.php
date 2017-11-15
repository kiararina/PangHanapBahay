<?php
/*
| This is codeigniter controller class for the Phb model
|
| This class has several methods for accessing tables in the phb database.
|
| The following are the tables:
|		tbl_users				
|		tbl_properties			
|		tbl_property_pics		
|		tbl_property_inquiries	
|		tbl_property_comments	
|		tbl_property_likes		
|		tbl_property_shortlist	
|		tbl_barangays			
|
| Function can return either a row or array of rows depending on the input
| If complete keys are provided, a specific row will be returned, otherwise
| a list array.
|
| As matter of convention, use the following
| 	$in_<variable name> = the <variable name> of the expected input.
| 	for example $in_username, for a "username" input
|
| REVISION HISTORY
| Date			Initials		Description
| ----------	--------------	---------------------------------------
| 02/08/2014	MLS				Initial version (not yet tested)
*/

/*
| Constants for personas
*/
/*
	const	PERSONA_TENANT	=1;
	const	PERSONA_AGENT	=2;
	const	PERSONA_BOTH	=3;
*/
/*
| Constants for apartment types
*/
/*
	const	PROP_TYPE_HOUSE =1;
	const	PROP_TYPE_APT	=2;
	const	PROP_TYPE_TOWNHOUSE =3;
	const	PROP_TYPE_CONDO =4;
*/
/*
| number of lines in comments 
*/	
	const	NUM_COLS_COMMENTS = 50;
	const	NUM_LINES_MAX	  = 5;
	const	NUM_LINES_MIN	  = 3;
/*
|	error messages
*/
	const	MSG_FAILED_ADD_COMMENT  = 'Add comment failed.';
	const	MSG_SUCCESS_ADD_COMMENT = 'Comment added at the end of the list.';
	const	MSG_FAILED_DEL_COMMENT  = 'Delete comment failed.';
	const	MSG_SUCCESS_DEL_COMMENT = 'Comment with timestamp %s deleted.';
	const	MSG_FAILED_UPD_COMMENT 	= 'Comment with timestamp %s not updated.';
	const	MSG_SUCCESS_UPD_COMMENT = 'Comment with timestamp %s updated.';
	const	MSG_FAILED_ADD_MESSAGE	= 'Error was encountered with your message. Try again later.';
	const	MSG_SUCCESS_ADD_MESSAGE = 'Your message has been saved. Thank you.';
	const 	MSG_USER_NOT_LOGGED_IN	= 'User not logged in.';
	const 	MSG_PROP_ID_NOT_FOUND	= 'Property width prop id %s not found.'; 

	/*
|	others
*/
	const	DATETIME_FORMAT	= "%Y-%m-%d %H:%i:%j";
	const	NULL_DATE 		= "00-00-00 00:00:00";
	const	PAGE_PRIVACY 	= 'privacy';
	const	PAGE_TERMS		= 'terms';
	const	PAGE_ABOUT		= 'about';
	const	PAGE_CONTACT	= 'contact';
	
	
class Pb_mod_all extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('date');
		

	}
	
/* ------------------------------------------------------------------------------------ 
|  	TBL_USERS	
------------------------------------------------------------------------------------ */		
	
	public function get_phb_users ($in_username = FALSE) {
/*  
|   This function returns user information
*/		
		if	($in_username === FALSE) {
			$query = $this->db->get('tbl_users');
			return $query->result_array();
		} 
		
		$query = $this->db->get_where('tbl_users', array('user_username' => "{$in_username}"));
		return $query->row_array();
		
	}
	
	public function get_phb_username ($in_user_id = FALSE) {
/*  
|   This function returns user information
*/		
		$query = $this->db->get_where('tbl_users', array('id' => "{$in_user_id}"));
		return $query->row_array();
		
	}
/* ------------------------------------------------------------------------------------
|  	TBL_PROPERTIES
------------------------------------------------------------------------------------ */		
	
	public function get_phb_prop ($in_prop_id = FALSE, $in_prop_owner = FALSE, $in_prop_publish = FALSE, $in_search = FALSE) {
/*
|	This function returns property information 
|   NOTE:  #in_search is only a placeholder for search fields for now.
*/
/*
|		Returns specific property
*/
		if ($in_prop_id != FALSE) {
			$query = $this->db->get_where('tbl_properties', array('prop_id' => "{$in_prop_id}"));
			return $query->row_array();
		}
/*
|		Returns properties that belong to an owner/agent
*/	
		if ($in_prop_owner != FALSE) {
			$query = $this->db->get_where('tbl_properties', array('prop_owner' => "{$in_prop_owner}"));
			return $query->result_array();
		}
/*
|		Return properties that satisfy the search criteria
|		TBD TBD TBD
|		remember to select only the properties that match publish flag (depending on function performed)
|		Public or Tensnt must not see properties that are NOT tagged for publishing
*/	
		if ($in_search != FALSE) {
			$query = $this->db->get_where('tbl_properties', array('prop_publish' => "{$in_prop_publish}"));
			return $query->result_array();
		}
	}
/* ------------------------------------------------------------------------------------
|  	TBL_PROPERTY_PICS
------------------------------------------------------------------------------------ */		
	public function get_phb_prop_pics ($in_prop_id = FALSE, $in_prop_pic_primary = FALSE) {
/*  
|   This function returns property pictures regardless of whether primary or not
*/		
		if	($in_prop_id !== FALSE) {
		
			if ($in_prop_pic_primary === FALSE) {
				$this->db->select('*');
				$this->db->from('tbl_property_pics');
				$this->db->where('prop_id',"{$in_prop_id}");
				$this->db->order_by("prop_pic_id","asc");
				$query = $this->db->get();
			
				/*
				$query = $this->db->get_where('tbl_property_pics', array('prop_id' => "{$in_prop_id}"));
				$query = $this->db->order_by("prop_pic_id", "asc");
				*/
				return $query->result_array();			
			} else {
/*
|	Return only the primary picture if requested
*/
					$this->db->select('*');
					$this->db->from('tbl_property_pics');
					$this->db->where('prop_id',"{$in_prop_id}");
					$this->db->where('prop_pic_primary', TRUE);
					$this->db->order_by("prop_pic_id","asc");
					$query = $this->db->get();

					/*
					$query = $this->db->get_where('tbl_property_pics', array('prop_id' => "{$in_prop_id}", 'prop_pic_primary' => "{$in_prop_pic_primary}"));
					*/
/*
|	Return the first picture if no primary picture is found
*/
					if ($query->num_rows() > 0) {
						return $query->row_array();		
					} else {
						
						$this->db->select('*');
						$this->db->from('tbl_property_pics');
						$this->db->where('prop_id',"{$in_prop_id}");
						$this->db->order_by("prop_pic_id","asc");
						$query = $this->db->get();

						return $query->row_array();			
					}
			} 
				
		} 
		
	}
/* ------------------------------------------------------------------------------------
|  	TBL_PROPERTY_COMMENTS
------------------------------------------------------------------------------------ */	
	public function insert_phb_prop_comments ($in_prop_id = FALSE, $in_username = FALSE) {

		$this->load->helper('url');
/*
| This function inserts property comments into the database
*/
		$new_comment = array(
			'comment_prop_id' 	=> $in_prop_id,
			'comment_username' 	=> $in_username,
			'comment_text'		=> $this->input->post('f_comment_new'),
			'comment_publish'	=> $this->input->post('f_publish_user_comment_new'),
			'comment_dtime_mod'	=> NULL_DATE,
			'comment_mod_by'	=> NULL
			);
		
		$this->db->insert('tbl_property_comments', $new_comment);
		return $this->db->affected_rows();
	
	} /* end of insert_phb_prop_comments */
	
	
	public function get_phb_prop_comments ($in_prop_id = FALSE, $in_show_all = FALSE, $in_username = FALSE, $in_comment_publish = FALSE) {
/*  
|   This function returns all comments for a property
| 	By default, this should return only published comments, and all comments made by the user
|   regardless of whether they are published or not.
|
|	If no comment_publish flag is passed, default to ALL
*/		
		
		if	($in_prop_id !== FALSE) {
		
				$this->db->select('*');
				$this->db->from('tbl_property_comments');
				$this->db->where('comment_prop_id',"{$in_prop_id}");			
/*
|	if all is requested return only published comments. If there is specific user,
|   return published/unpublished comments for that user.
*/
			if ($in_show_all == TRUE) {
								
				if ($in_username !== FALSE) {
					
					if ($in_comment_publish !== FALSE) {
						$this->db->where("((comment_username <> '{$in_username}' AND comment_publish = TRUE) OR ( comment_username = '{$in_username}' AND comment_publish = '{$in_comment_publish}'))");
					} else {
						$this->db->where("(( comment_username <> '{$in_username}' AND comment_publish = TRUE) OR comment_username = '{$in_username}')");	
					}
					
				} else {
				
					$this->db->where('comment_publish', TRUE);
				}
				
				$this->db->order_by("comment_id","asc");
				$query = $this->db->get();
				
				return $query->result_array();		
				
			} else {
/*
|	Return only comments that are requested
*/
				$this->db->where('comment_username',"{$in_username}"); 
				
				if ($in_comment_publish !== FALSE) {
					$this->db->where('comment_publish',"{$in_comment_publish}");
				} 
				
				$this->db->order_by("comment_id","asc");				
				$query = $this->db->get();
				return $query->result_array();			
			} 
		
		} 
		
	} /* end of get_phb_prop_comments */
	
	public function update_phb_prop_comments ($in_prop_id = FALSE, $in_username = FALSE, $in_comment_id = FALSE) {

		$this->load->helper('url');
/*
| This function inserts property comments into the database
*/
		$now = now();
		$save_comment = array(
			'comment_text'		=> $this->input->post('f_comment_text'),
			'comment_publish'	=> $this->input->post('f_publish_user_comment'),
			'comment_dtime_mod'	=> mdate(DATETIME_FORMAT, $now),
			'comment_mod_by'	=> $in_username
			);
		
		$this->db->where('comment_id', $in_comment_id);
		$this->db->update('tbl_property_comments', $save_comment);
		return $this->db->affected_rows();
		
	} /* end of update_phb_prop_comments */
	
	
	
	public function delete_phb_prop_comments ($in_comment_id = FALSE) {

/*
| This function deletes property comments
*/
		if ($in_comment_id !== FALSE) {
			$this->db->delete('tbl_property_comments', array('comment_id'=>"{$in_comment_id}"));
			return $this->db->affected_rows();
		}
	} /* end of delete_phb_prop_comments */

/* ------------------------------------------------------------------------------------
|  	TBL_PROPERTY_TYPE
------------------------------------------------------------------------------------ */	
	public function get_phb_prop_type ($in_prop_type) {

		if ($in_prop_type != FALSE) {
			$query = $this->db->get_where('tbl_property_type', array('prop_type_id' => "{$in_prop_type}"));
			return $query->row_array();
		}
	}
/* ------------------------------------------------------------------------------------
|  	TBL_PROPERTY_INQUIRIES
------------------------------------------------------------------------------------ */	
	public function get_phb_prop_inquiry (  ) {
/*  
|   This function returns property inquiries
*/		
		
	
	}
	

/* ------------------------------------------------------------------------------------
|  	TBL_PROPERTY_LIKES
------------------------------------------------------------------------------------ */	
	public function get_phb_prop_likes (  ) {
/*  
|   This function returns count of property given property id, a specific user name or none
*/		


	}
/* ------------------------------------------------------------------------------------
|  	TBL_SHORTLISTS
------------------------------------------------------------------------------------ */	
	public function get_phb_shortlist (  ) {
		
	}	
	
/* ------------------------------------------------------------------------------------
|  	TBL_SAVED_SEARCHES
------------------------------------------------------------------------------------ */	
	public function get_phb_saved_searches (  ) {
		
	}	
		
/* ------------------------------------------------------------------------------------
|  	TBL_MAILS
------------------------------------------------------------------------------------ */	
	public function insert_phb_mails ($in_mail = FALSE  ) {
		
		if (!empty($in_mail)) {
			$this->db->insert('tbl_mails', $in_mail);
			return $this->db->affected_rows();
		}
	}	
			
	
	
/* ------------------------------------------------------------------------------------
|  	TBL_BARANGAYS
------------------------------------------------------------------------------------ */		
/*
| The following functions retrieve information from the table of barangays
*/	

	public function get_phb_bgy ($in_province = FALSE, $in_city_mun = FALSE, $in_barangay = FALSE){
/* 
|   This function returns barangays
*/

		if ($in_barangay === FALSE) {
			$query = $this->db->get_where('view_barangays', array('bgy_province' => "{$in_province}",'bgy_city_mun' => "{$in_city_mun}"));
			return $query->result_array();
		}

		$query = $this->db->get_where('view_barangays', array('bgy_province' => "{$in_province}",'bgy_city_mun' => "{$in_city_mun}", 'bgy_barangay' => "{$in_barangay}"));
		return $query->row_array();
		
	}

	public function get_phb_city ($in_province = FALSE, $in_city_mun = FALSE) {
/* This function returns cities
*/
		if ($in_city_mun === FALSE)	{
			$query = $this->db->get_where('view_barangays', array('bgy_province' => "{$in_province}"));
			return $query->result_array();
		}
	
		$query = $this->db->get_where('view_barangays', array('bgy_province' => "{$in_province}",'bgy_city_mun' => "{$in_city_mun}"));
		return $query->row_array();
	
	}

	public function get_phb_province ($in_province = FALSE) {
/* This function returns provinces
*/
		if ($in_province === FALSE)	{
			$query = $this->db->get_where('view_barangays');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('view_barangays', array('bgy_province' => "{$in_province}"));
		return $query->row_array();
	
	}
}	
?>
