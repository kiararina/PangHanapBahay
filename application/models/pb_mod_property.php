<?php

class Pb_mod_property extends CI_Model {
	
	function __construct()
    {
          parent::__construct();
    }

	function get_all_properties(){
		$query = "SELECT tbl_properties.prop_id, tbl_properties.prop_owner_id, tbl_properties.prop_name, tbl_property_type.prop_type, tbl_properties.prop_loc_map, tbl_properties.prop_add1, tbl_properties.prop_add2, tbl_properties.prop_brgy, tbl_properties.prop_city_mun, tbl_properties.prop_prov_reg, tbl_properties.prop_availby, tbl_properties.prop_contact, tbl_properties.prop_publish, tbl_properties.prop_monthly_rent, tbl_properties.prop_feat_essential, tbl_properties.prop_feat_oth, tbl_properties.prop_lot_area, tbl_properties.prop_floor_area, tbl_properties.prop_search_tag, tbl_properties.prop_dtime_add, tbl_properties.prop_dtime_mod, tbl_properties.prop_mod_by, tbl_property_likes.likes, tbl_property_comments.comments, tbl_property_inquiries.inquiry, tbl_property_pics.prop_pic_filepath FROM tbl_properties AS tbl_properties ";
		$query .= "JOIN tbl_property_type AS tbl_property_type ON tbl_properties.prop_type_id = tbl_property_type.prop_type_id ";
		$query .= "LEFT JOIN (SELECT prop_pic_filepath, prop_id FROM tbl_property_pics WHERE prop_pic_primary = 1) AS tbl_property_pics ON tbl_properties.prop_id = tbl_property_pics.prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as likes, like_prop_id FROM tbl_property_likes GROUP BY like_prop_id) AS tbl_property_likes ON tbl_properties.prop_id = tbl_property_likes.like_prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as comments, comment_prop_id FROM tbl_property_comments GROUP BY comment_prop_id) AS tbl_property_comments ON tbl_properties.prop_id = tbl_property_comments.comment_prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as inquiry, response_prop_id FROM tbl_property_inquiries GROUP BY response_prop_id) AS tbl_property_inquiries ON tbl_properties.prop_id = tbl_property_inquiries.response_prop_id ";
		$query .= "ORDER BY tbl_properties.prop_name ASC";
		
		//echo $query;
		$result = $this->db->query($query);
		
		return $result->result_array();
	}
	
	function get_public_properties(){
		$query = "SELECT tbl_properties.prop_id, tbl_properties.prop_owner_id, tbl_properties.prop_name, tbl_property_type.prop_type, tbl_properties.prop_loc_map, tbl_properties.prop_add1, tbl_properties.prop_add2, tbl_properties.prop_brgy, tbl_properties.prop_city_mun, tbl_properties.prop_prov_reg, tbl_properties.prop_availby, tbl_properties.prop_contact, tbl_properties.prop_publish, tbl_properties.prop_monthly_rent, tbl_properties.prop_feat_essential, tbl_properties.prop_feat_oth, tbl_properties.prop_lot_area, tbl_properties.prop_floor_area, tbl_properties.prop_search_tag, tbl_properties.prop_dtime_add, tbl_properties.prop_dtime_mod, tbl_properties.prop_mod_by, tbl_property_likes.likes, tbl_property_comments.comments, tbl_property_inquiries.inquiry, tbl_property_pics.prop_pic_filepath FROM tbl_properties AS tbl_properties ";
		$query .= "JOIN tbl_property_type AS tbl_property_type ON tbl_properties.prop_type_id = tbl_property_type.prop_type_id ";
		$query .= "JOIN tbl_users AS tbl_users ON tbl_properties.prop_owner_id = tbl_users.id ";
		$query .= "LEFT JOIN (SELECT prop_pic_filepath, prop_id FROM tbl_property_pics WHERE prop_pic_primary = 1) AS tbl_property_pics ON tbl_properties.prop_id = tbl_property_pics.prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as likes, like_prop_id FROM tbl_property_likes GROUP BY like_prop_id) AS tbl_property_likes ON tbl_properties.prop_id = tbl_property_likes.like_prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as comments, comment_prop_id FROM tbl_property_comments GROUP BY comment_prop_id) AS tbl_property_comments ON tbl_properties.prop_id = tbl_property_comments.comment_prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as inquiry, response_prop_id FROM tbl_property_inquiries GROUP BY response_prop_id) AS tbl_property_inquiries ON tbl_properties.prop_id = tbl_property_inquiries.response_prop_id ";
		$query .= "WHERE tbl_properties.prop_publish = 1 ";
		$query .= "ORDER BY tbl_properties.prop_name ASC";
		
		//echo $query;
		$result = $this->db->query($query);
		
		return $result->result_array();
	}
	
	function get_agent_properties($agent_id){
		$query = "SELECT tbl_properties.prop_id, tbl_properties.prop_owner_id, tbl_properties.prop_name, tbl_property_type.prop_type, tbl_properties.prop_loc_map, tbl_properties.prop_add1, tbl_properties.prop_add2, tbl_properties.prop_brgy, tbl_properties.prop_city_mun, tbl_properties.prop_prov_reg, tbl_properties.prop_availby, tbl_properties.prop_contact, tbl_properties.prop_publish, tbl_properties.prop_monthly_rent, tbl_properties.prop_feat_essential, tbl_properties.prop_feat_oth, tbl_properties.prop_lot_area, tbl_properties.prop_floor_area, tbl_properties.prop_search_tag, tbl_properties.prop_dtime_add, tbl_properties.prop_dtime_mod, tbl_properties.prop_mod_by, tbl_property_likes.likes, tbl_property_comments.comments, tbl_property_inquiries.inquiry, tbl_property_pics.prop_pic_filepath FROM tbl_properties AS tbl_properties ";
		$query .= "JOIN tbl_property_type AS tbl_property_type ON tbl_properties.prop_type_id = tbl_property_type.prop_type_id ";
		$query .= "LEFT JOIN (SELECT prop_pic_filepath, prop_id FROM tbl_property_pics WHERE prop_pic_primary = 1) AS tbl_property_pics ON tbl_properties.prop_id = tbl_property_pics.prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as likes, like_prop_id FROM tbl_property_likes GROUP BY like_prop_id) AS tbl_property_likes ON tbl_properties.prop_id = tbl_property_likes.like_prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as comments, comment_prop_id FROM tbl_property_comments GROUP BY comment_prop_id) AS tbl_property_comments ON tbl_properties.prop_id = tbl_property_comments.comment_prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as inquiry, response_prop_id FROM tbl_property_inquiries GROUP BY response_prop_id) AS tbl_property_inquiries ON tbl_properties.prop_id = tbl_property_inquiries.response_prop_id ";
		$query .= "WHERE tbl_properties.prop_owner_id = ".$agent_id. " ";
		$query .= "ORDER BY tbl_properties.prop_name ASC";
		
		//echo $query;
		$result = $this->db->query($query);
		
		return $result->result_array();
	}
	
	function get_all_amenities(){
		$this->db->select('tbl_amenities.description, tbl_property_amenities.prop_id, tbl_property_amenities.amenity_id');
		$this->db->from('tbl_property_amenities');
		$this->db->join('tbl_amenities', 'tbl_property_amenities.amenity_id= tbl_amenities.amenity_id');
		$this->db->order_by('tbl_property_amenities.prop_id', 'ASC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
	
	function get_property_likes($unit_id){
		$this->db->select('COUNT(*) as count');
		$this->db->from('tbl_property_likes');
		$this->db->where('like_prop_id', $unit_id);
		$this->db->order_by('tbl_property_amenities.prop_id', 'ASC'); 
		$query = $this->db->get();	
		
		return $query;
	}
	
	function update_properties($id, $data) {
        //echo "update";
		$this->db->where('prop_id', $id);
		$query = $this->db->update('tbl_properties', $data);    
		return  $query;					 	
	}		
	
	function insert_properties($data) {
        //echo "insert";
		$query = $this->db->insert('tbl_properties', $data);
		return  $query;
	}
	
	function get_latest_id() {
		$this->db->select('prop_id');		
		$this->db->order_by('prop_id', 'DESC'); 
		$this->db->limit(1);
		$query = $this->db->get('tbl_properties');
    
		return $query->row()->prop_id;
	}
	
	function insert_amenity($data) {
		$query = $this->db->insert('tbl_property_amenities', $data);
		return  $query;
	}

	function delete_properties($id){
		$this->db->where('prop_id', $id);
		$query = $this->db->delete('tbl_properties');

		return  $query;
	}		
	
	function view_properties($id){
		$query = "SELECT tbl_properties.prop_id, tbl_properties.prop_owner_id, tbl_properties.prop_name, tbl_property_type.prop_type, tbl_properties.prop_loc_map, tbl_properties.prop_add1, tbl_properties.prop_add2, tbl_properties.prop_brgy, tbl_properties.prop_city_mun, tbl_properties.prop_prov_reg, tbl_properties.prop_availby, tbl_properties.prop_contact, tbl_properties.prop_publish, tbl_properties.prop_monthly_rent, tbl_properties.prop_feat_essential, tbl_properties.prop_feat_oth, tbl_properties.prop_lot_area, tbl_properties.prop_floor_area, tbl_properties.prop_search_tag, tbl_properties.prop_dtime_add, tbl_properties.prop_dtime_mod, tbl_properties.prop_mod_by, tbl_property_likes.likes, tbl_property_comments.comments, tbl_property_inquiries.inquiry, tbl_property_pics.prop_pic_filepath, tbl_users.user_email_addr, tbl_users.user_first_name, tbl_users.user_middle_name, tbl_users.user_last_name, tbl_users.user_affiliation FROM tbl_properties AS tbl_properties ";
		$query .= "JOIN tbl_property_type AS tbl_property_type ON tbl_properties.prop_type_id = tbl_property_type.prop_type_id ";
		$query .= "JOIN tbl_users AS tbl_users ON tbl_properties.prop_owner_id = tbl_users.id ";
		$query .= "LEFT JOIN (SELECT prop_pic_filepath, prop_id FROM tbl_property_pics WHERE prop_pic_primary = 1) AS tbl_property_pics ON tbl_properties.prop_id = tbl_property_pics.prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as likes, like_prop_id FROM tbl_property_likes GROUP BY like_prop_id) AS tbl_property_likes ON tbl_properties.prop_id = tbl_property_likes.like_prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as comments, comment_prop_id FROM tbl_property_comments GROUP BY comment_prop_id) AS tbl_property_comments ON tbl_properties.prop_id = tbl_property_comments.comment_prop_id ";
		$query .= "LEFT JOIN (SELECT COUNT(*) as inquiry, response_prop_id FROM tbl_property_inquiries GROUP BY response_prop_id) AS tbl_property_inquiries ON tbl_properties.prop_id = tbl_property_inquiries.response_prop_id ";
		$query .= "WHERE tbl_properties.prop_id = ".$id;
		
		//echo $query;
		
		$result = $this->db->query($query);
		return $result->row();
	}
	
	function get_amenities($id){   
		$this->db->select('tbl_amenities.description, tbl_property_amenities.prop_id, tbl_property_amenities.amenity_id');
		$this->db->from('tbl_property_amenities');
		$this->db->join('tbl_amenities', 'tbl_property_amenities.amenity_id= tbl_amenities.amenity_id');
		$this->db->where('tbl_property_amenities.prop_id', $id);
		$this->db->order_by('tbl_amenities.description', 'ASC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
	
	function delete_amenities($id){
		$this->db->where('prop_id', $id);
		$query = $this->db->delete('tbl_property_amenities');

		return  $query;
	}	
	
	function search_properties(){
		$query = null;
		$conditions = null;
		if(isset($_POST['button2'])) {
			// define the list of fields
			$fields = array('province', 'city', 'barangay', 'rent_min', 'rent_max', 'lotarea_min', 'lotarea_max', 'flrarea_min', 'flrarea_max', 'propertytype',
							'amenities1', 'amenities2', 'amenities3', 'amenities4', 'amenities5', 'amenities6', 'amenities7', 'amenities8');
			$conditions = array();

			// loop through the defined fields
			foreach($fields as $field){
				// if the field is set and not empty
				if(isset($_POST[$field]) && $_POST[$field] != '') {
					// create a new condition while escaping the value inputed by the user (SQL Injection)
					if($field == "province"){
						$conditions[] = "(tbl_properties.prop_prov_reg LIKE '%" . mysql_real_escape_string($_POST[$field]) . "%')";
					}
					elseif($field == "city"){
						$conditions[] = "(tbl_properties.prop_city_mun LIKE '%" . mysql_real_escape_string($_POST[$field]) . "%')";
					}
					elseif($field == "barangay"){
						$conditions[] = "(tbl_properties.prop_brgy LIKE '%" . mysql_real_escape_string($_POST[$field]) . "%')";
					}
					elseif($field == "rent_min"){
						$conditions[] = "(tbl_properties.prop_monthly_rent >= ".$_POST[$field] .")";
					}
					elseif($field == "rent_max"){
						$conditions[] = "(tbl_properties.prop_monthly_rent <= ".$_POST[$field] .")";
					}
					elseif($field == "lotarea_min"){
						$conditions[] = "(tbl_properties.prop_lot_area >= ".$_POST[$field] .")";
					}
					elseif($field == "lotarea_max"){
						$conditions[] = "(tbl_properties.prop_lot_area <= ".$_POST[$field] .")";
					}
					elseif($field == "flrarea_min"){
						$conditions[] = "(tbl_properties.prop_floor_area >= ".$_POST[$field] .")";
					}
					elseif($field == "flrarea_max"){
						$conditions[] = "(tbl_properties.prop_floor_area <= ".$_POST[$field] .")";
					}
					elseif($field == "propertytype"){
						$conditions[] = "(tbl_properties.prop_type_id = ".$_POST[$field] .")";
					}
					elseif($field == "amenities1"){
						$conditions[] = "(tbl_property_amenities.amenity_id = ".$_POST[$field] .")";
					}
					elseif($field == "amenities2"){
						$conditions[] = "(tbl_property_amenities.amenity_id = ".$_POST[$field] .")";
					}
					elseif($field == "amenities3"){
						$conditions[] = "(tbl_property_amenities.amenity_id = ".$_POST[$field] .")";
					}
					elseif($field == "amenities4"){
						$conditions[] = "(tbl_property_amenities.amenity_id = ".$_POST[$field] .")";
					}
					elseif($field == "amenities5"){
						$conditions[] = "(tbl_property_amenities.amenity_id = ".$_POST[$field] .")";
					}
					elseif($field == "amenities6"){
						$conditions[] = "(tbl_property_amenities.amenity_id = ".$_POST[$field] .")";
					}
					elseif($field == "amenities7"){
						$conditions[] = "(tbl_property_amenities.amenity_id = ".$_POST[$field] .")";
					}
					elseif($field == "amenities8"){
						$conditions[] = "(tbl_property_amenities.amenity_id = ".$_POST[$field] .")";
					}
				}
			}
			
			$query = "SELECT tbl_properties.prop_id, tbl_properties.prop_owner_id, tbl_properties.prop_name, tbl_property_type.prop_type, tbl_properties.prop_loc_map, tbl_properties.prop_add1, tbl_properties.prop_add2, tbl_properties.prop_brgy, tbl_properties.prop_city_mun, tbl_properties.prop_prov_reg, tbl_properties.prop_availby, tbl_properties.prop_contact, tbl_properties.prop_publish, tbl_properties.prop_monthly_rent, tbl_properties.prop_feat_essential, tbl_properties.prop_feat_oth, tbl_properties.prop_lot_area, tbl_properties.prop_floor_area, tbl_properties.prop_search_tag, tbl_properties.prop_dtime_add, tbl_properties.prop_dtime_mod, tbl_properties.prop_mod_by, tbl_property_likes.likes, tbl_property_comments.comments, tbl_property_inquiries.inquiry, tbl_property_pics.prop_pic_filepath FROM tbl_properties AS tbl_properties ";
			$query .= "JOIN tbl_property_type AS tbl_property_type ON tbl_properties.prop_type_id = tbl_property_type.prop_type_id ";
			$query .= "LEFT JOIN (SELECT prop_pic_filepath, prop_id FROM tbl_property_pics WHERE prop_pic_primary = 1) AS tbl_property_pics ON tbl_properties.prop_id = tbl_property_pics.prop_id ";
			$query .= "LEFT JOIN (SELECT COUNT(*) as likes, like_prop_id FROM tbl_property_likes GROUP BY like_prop_id) AS tbl_property_likes ON tbl_properties.prop_id = tbl_property_likes.like_prop_id ";
			$query .= "LEFT JOIN (SELECT COUNT(*) as comments, comment_prop_id FROM tbl_property_comments GROUP BY comment_prop_id) AS tbl_property_comments ON tbl_properties.prop_id = tbl_property_comments.comment_prop_id ";
			$query .= "LEFT JOIN (SELECT COUNT(*) as inquiry, response_prop_id FROM tbl_property_inquiries GROUP BY response_prop_id) AS tbl_property_inquiries ON tbl_properties.prop_id = tbl_property_inquiries.response_prop_id ";
			// if there are conditions defined
			if(count($conditions) > 0) {
				// append the conditions
				$query .= "WHERE " . implode (' AND ', $conditions); // you can change to 'OR', but I suggest to apply the filters cumulative
			}
		}	
		
		/*echo "<pre>";
		print_r($conditions);
		echo "</pre>";
		echo $query;*/
		
		$result = $this->db->query($query);

		return $result->result_array();
	
	}
	
	function upload_picture($data) {
		$query = $this->db->insert('tbl_property_pics', $data);
		return  $query;
	}
	
	function get_all_filepath(){
		$this->db->select('prop_id, prop_pic_id, prop_pic_filepath');
		$this->db->from('tbl_property_pics');
		$this->db->order_by('prop_id', 'ASC'); 
		$this->db->order_by('prop_pic_primary', 'DESC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
	
	function get_property_filepath($prop_id){
		$this->db->select('prop_id, prop_pic_id, prop_pic_filepath');
		$this->db->from('tbl_property_pics');
		$this->db->where('prop_id', $prop_id);
		$this->db->order_by('prop_id', 'ASC'); 
		$this->db->order_by('prop_pic_primary', 'DESC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
	
	function insert_inquiry($data) {
		$query = $this->db->insert('tbl_property_inquiries', $data);
		return  $query;
	}
	
	function get_prop_inquiries($id) {		
		$this->db->select('response_text, response_inq_username, response_dtime_add');
		$this->db->from('tbl_property_inquiries');
		$this->db->where('response_prop_id', $id);
		$this->db->order_by('response_dtime_add', 'ASC'); 
		$query = $this->db->get();	
	}
	
	function insert_like($data) {
		$query = $this->db->insert('tbl_property_likes', $data);
		return  $query;
	}
	
	function remove_like($prop_id, $user_id) {
		$this->db->where('like_prop_id', $prop_id);
		$this->db->where('like_user_id', $user_id);
		$query = $this->db->delete('tbl_property_likes');
	}
	
	function get_all_likes($id) {
		$this->db->select('like_user_id, like_prop_id');
		$this->db->from('tbl_property_likes');
		$this->db->order_by('like_prop_id', 'ASC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
	
	function get_user_likes($user_id) {
		$this->db->select('like_user_id, like_prop_id');
		$this->db->from('tbl_property_likes');
		$this->db->where('like_user_id', $user_id);
		$this->db->order_by('like_prop_id', 'ASC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
	
	function get_prop_likes($prop_id) {
		$this->db->select('like_user_id, like_prop_id');
		$this->db->from('tbl_property_likes');
		$this->db->where('like_prop_id', $prop_id);
		$this->db->order_by('like_user_id', 'ASC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
	
	function insert_shortlist($data) {
		$query = $this->db->insert('tbl_shortlists', $data);
		return  $query;
	}
	
	function remove_shortlist($prop_id, $user_id) {
		$this->db->where('shortl_prop_id', $prop_id);
		$this->db->where('shortl_user_id', $user_id);
		$query = $this->db->delete('tbl_shortlists');
	}
	
	function get_all_shortlist($id) {
		$this->db->select('shortl_user_id, shortl_prop_id');
		$this->db->from('tbl_shortlists');
		$this->db->order_by('shortl_prop_id', 'ASC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
	
	function get_user_shortlists($user_id) {
		$this->db->select('shortl_user_id, shortl_prop_id');
		$this->db->from('tbl_shortlists');
		$this->db->where('shortl_user_id', $user_id);
		$this->db->order_by('shortl_prop_id', 'ASC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
	
	function get_prop_shortlists($prop_id) {
		$this->db->select('shortl_user_id, shortl_prop_id');
		$this->db->from('tbl_shortlists');
		$this->db->where('shortl_prop_id', $prop_id);
		$this->db->order_by('shortl_user_id', 'ASC'); 
		$query = $this->db->get();	
		
		return $query->result_array();
	}
		
}

?>