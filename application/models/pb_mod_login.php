<?php

class Pb_mod_login extends CI_Model {

   function validate($user_username, $user_password)
	{
		$this->db->where('user_username', $user_username);
		$this->db->where('user_password', $user_password);
		$query = $this->db->get('tbl_users');
		
		if($query->num_rows == 1)
		{
			return true;
		}		
	}

}
