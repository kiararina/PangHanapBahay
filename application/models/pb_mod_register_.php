<?php
const	DATETIME_FORMAT	= "%Y-%m-%d %H:%i:%j";

class Pb_mod_register extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('date');
	}

  	function create_member()
	{

		$this->db->where('user_username', $this->input->post('user_username'));
		$query = $this->db->get('tbl_users');

        if($query->num_rows > 0){
        	print '<script type="text/javascript">'; 
			print 'alert("Username already taken")'; 
			print '</script>';  
			
		}else{
			$now = now();
			$new_member_insert_data = array(
				'user_first_name' => $this->input->post('user_first_name'),
				'user_middle_name' => $this->input->post('user_middle_name'),
				'user_last_name' => $this->input->post('user_last_name'),
				'user_email_addr' => $this->input->post('user_email_addr'),	
				'user_persona' => $this->input->post('user_persona'),				
				'user_affiliation' => $this->input->post('user_affiliation'),
				'user_username' => $this->input->post('user_username'),
				'user_password' => sha1($this->input->post('user_password')),
				'user_dtime_last_pwd' => mdate(DATETIME_FORMAT, $now)						
			);
			$insert = $this->db->insert('tbl_users', $new_member_insert_data);
		    return $insert;
		}
			      
	}
	
	
}

