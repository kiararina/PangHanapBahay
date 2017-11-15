<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pb_ctr_agent extends CI_Controller {

    function index() {
	/*echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
		
	if($this->session->userdata('is_logged_in')) 
	{
	 $user = $this->session->userdata('user_persona');
	 $agent_id = $this->session->userdata('id');
	 
		if ($user == 2 or $user == 3)
		{	
			$this->session->set_userdata('user_type_page', 'agent');
			$hide_id = $this->input->post('hideUnit');
			$show_id = $this->input->post('showUnit');
			
			if($hide_id){
				$content = array(
				'prop_publish'	=> 0
				);
				
				$this->load->model('Pb_mod_property');
				$success = $this->Pb_mod_property->update_properties($hide_id, $content);	
			}elseif($show_id){
				$content = array(
				'prop_publish'	=> 1
				);
				
				$this->load->model('Pb_mod_property');
				$success = $this->Pb_mod_property->update_properties($show_id, $content);	
			}
			
			
			$this->load->model('Pb_mod_property');
			$events = $this->Pb_mod_property->get_agent_properties($agent_id);
			$amenities = $this->Pb_mod_property->get_all_amenities(1);
			$count = count($events);
            $data['count_message'] = "";
            if($count == 0){
				$data['message'] = "No properties yet.";
			}else{
                if($count == 1){
                    $data['count_message'] = " property.";
                }else{
                    $data['count_message'] = " properties.";
                }   
            }
			$data['events'] = $events;
			$data['amenities'] = $amenities;
			$data['count'] = $count;
			
			/*echo "<pre>";
			print_r($events);
			echo "</pre>";*/
		
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/index', $data);
			$this->load->view('common/pb_ftr_footer');
			
		}else{
			
			$this->session->set_userdata('user_type_page', 'tenant');
			
			$this->load->view('common/pb_hdr_header');
			$this->load->view('public/index');
			$this->load->view('common/pb_ftr_footer');
		}
    
	}else{
	
			$this->session->set_userdata('user_type_page', 'home');
			
        	$this->load->view('common/pb_hdr_header');
			$this->load->view('common/pb_hdr_carousel');
			$this->load->view('public/index');
			$this->load->view('common/pb_ftr_footer');
    }
	
     
}
	
	public function about()
	{
		$this->load->view('overall/header');
		$this->load->view('overall/carousel');
		$this->load->view('overall/about');
		$this->load->view('overall/footer');
	}
	
	public function contact()
	{
		$this->load->view('overall/header');
		$this->load->view('overall/carousel');
		$this->load->view('overall/contact');
		$this->load->view('overall/footer');
	}
	public function privacy()
	{
		$this->load->view('overall/header');
		$this->load->view('overall/carousel');
		$this->load->view('overall/privacy');
		$this->load->view('overall/footer');
	}
	public function usage()
	{
		$this->load->view('overall/header');
		$this->load->view('overall/carousel');
		$this->load->view('overall/usage');
		$this->load->view('overall/footer');
	}	
	
	public function edit()
	{
		//echo "<pre>";
		//print_r($_POST);
		//echo "</pre>";
		$edit_id = $this->uri->segment(3);
		$agent_id = $this->session->userdata('id');
        
		if ($this->uri->segment(2) == "edit" && !$this->input->post('button2')){
			$edit_id = $this->uri->segment(3);
			$this->load->model('Pb_mod_property');
			$exist = $this->Pb_mod_property->view_properties($edit_id);
			if (!$exist ){
				$this->load->model('Pb_mod_property');
				$events = $this->Pb_mod_property->get_agent_properties($agent_id);
				$amenities = $this->Pb_mod_property->get_all_amenities(1);
				$count = count($events);
				$data['count_message'] = "";
				if($count == 0){
					$data['message'] = "No properties yet.";
				}else{
					if($count == 1){
						$data['count_message'] = " property.";
					}else{
						$data['count_message'] = " properties.";
					}   
				}
				$data['events'] = $events;
				$data['amenities'] = $amenities;
				$data['count'] = $count;
				
				/*echo "<pre>";
				print_r($events);
				echo "</pre>";*/
			
				$this->load->view('common/pb_hdr_header');
				$this->load->view('agent/index', $data);
				$this->load->view('common/pb_ftr_footer');
			}	
			
			$data['property'] = $exist;
		
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/edit_view',$data);
			$this->load->view('common/pb_ftr_footer');
		}
		elseif ($this->input->post('cancel')){
			$this->load->model('Pb_mod_property');
			$events = $this->Pb_mod_property->get_agent_properties($agent_id);
			$amenities = $this->Pb_mod_property->get_all_amenities(1);
			$count = count($events);
            $data['count_message'] = "";
            if($count == 0){
				$data['message'] = "No properties yet.";
			}else{
                if($count == 1){
                    $data['count_message'] = " property.";
                }else{
                    $data['count_message'] = " properties.";
                }   
            }
			$data['events'] = $events;
			$data['amenities'] = $amenities;
			$data['count'] = $count;
			
			/*echo "<pre>";
			print_r($events);
			echo "</pre>";*/
		
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/index', $data);
			$this->load->view('common/pb_ftr_footer');
		}

		if ($this->input->post('button2')){
			$buttontype = $this->input->post('button2');
		}else{
			$buttontype = "";
		}
		
		if($buttontype == "submit"){
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/edit_confirm');
			$this->load->view('common/pb_ftr_footer');
			 
		}elseif($buttontype == "confirm"){

			$edit_id = $this->input->post('prop_id');
			$content = array(
			'prop_name'				=> $this->input->post('title'),
			'prop_availby'			=> date( 'Y-m-d', strtotime( $this->input->post('date') ) ),
			'prop_type_id'				=> $this->input->post('propertytype'),
			'prop_brgy' 			=> $this->input->post('barangay'),
			'prop_city_mun' 		=> $this->input->post('city'),
			'prop_prov_reg' 		=> $this->input->post('province'),
			'prop_monthly_rent' 	=> $this->input->post('rent'),
			'prop_lot_area' 		=> $this->input->post('lotarea'),
			'prop_floor_area'  		=> $this->input->post('floorarea')
			);
			
			$this->load->model('Pb_mod_property');
			$success = $this->Pb_mod_property->update_properties($edit_id, $content);	
			$delete_success = $this->Pb_mod_property->delete_amenities($edit_id);
			
			if (isset($_POST['amenities1'])){
				$amenity1 = $_POST['amenities1'];
				$content = array(
				'prop_id'			=> $edit_id,
				'amenity_id'		=> $amenity1
				);
				$success = $this->Pb_mod_property->insert_amenity($content);	
			}
			if (isset($_POST['amenities2'])){
				$amenity2 = $_POST['amenities2'];
				$content = array(
				'prop_id'			=> $edit_id,
				'amenity_id'		=> $amenity2
				);
				$success = $this->Pb_mod_property->insert_amenity($content);	
			}
			if (isset($_POST['amenities3'])){
				$amenity3 = $_POST['amenities3'];
				$content = array(
				'prop_id'			=> $edit_id,
				'amenity_id'		=> $amenity3
				);
				$success = $this->Pb_mod_property->insert_amenity($content);	
			}
			if (isset($_POST['amenities4'])){
				$amenity4 = $_POST['amenities4'];
				$content = array(
				'prop_id'			=> $edit_id,
				'amenity_id'		=> $amenity4
				);
				$success = $this->Pb_mod_property->insert_amenity($content);	
			}
			if (isset($_POST['amenities5'])){
				$amenity5 = $_POST['amenities5'];
				$content = array(
				'prop_id'			=> $edit_id,
				'amenity_id'		=> $amenity5
				);
				$success = $this->Pb_mod_property->insert_amenity($content);	
			}
			if (isset($_POST['amenities6'])){
				$amenity6 = $_POST['amenities6'];
				$content = array(
				'prop_id'			=> $edit_id,
				'amenity_id'		=> $amenity6
				);
				$success = $this->Pb_mod_property->insert_amenity($content);	
			}
			if (isset($_POST['amenities7'])){
				$amenity7 = $_POST['amenities7'];
				$content = array(
				'prop_id'			=> $edit_id,
				'amenity_id'		=> $amenity7
				);
				$success = $this->Pb_mod_property->insert_amenity($content);	
			}
			if (isset($_POST['amenities8'])){
				$amenity8 = $_POST['amenities8'];
				$content = array(
				'prop_id'			=> $edit_id,
				'amenity_id'		=> $amenity8
				);
				$success = $this->Pb_mod_property->insert_amenity($content);	
			}
			$this->load->model('Pb_mod_property');
			$events = $this->Pb_mod_property->get_agent_properties($agent_id);
			$amenities = $this->Pb_mod_property->get_all_amenities(1);
			$count = count($events);
            $data['count_message'] = "";
            if($count == 0){
				$data['message'] = "No properties yet.";
			}else{
                if($count == 1){
                    $data['count_message'] = " property.";
                }else{
                    $data['count_message'] = " properties.";
                }   
            }
			$data['events'] = $events;
			$data['amenities'] = $amenities;
			$data['count'] = $count;
			
			/*echo "<pre>";
			print_r($events);
			echo "</pre>";*/
		
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/index', $data);
			$this->load->view('common/pb_ftr_footer');
		}
	}
	
	public function detail()
	{
		$detail_id = $this->uri->segment(3);
		$agent_id = $this->session->userdata('id');
		
		$this->load->model('Pb_mod_property');
		$exist = $this->Pb_mod_property->view_properties($detail_id);
		if (!$exist ){
			$this->load->model('Pb_mod_property');
			$events = $this->Pb_mod_property->get_agent_properties($agent_id);
			$amenities = $this->Pb_mod_property->get_all_amenities(1);
			$count = count($events);
            $data['count_message'] = "";
            if($count == 0){
				$data['message'] = "No properties yet.";
			}else{
                if($count == 1){
                    $data['count_message'] = " property.";
                }else{
                    $data['count_message'] = " properties.";
                }   
            }
			$data['events'] = $events;
			$data['amenities'] = $amenities;
			$data['count'] = $count;
			
			/*echo "<pre>";
			print_r($events);
			echo "</pre>";*/
		
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/index', $data);
			$this->load->view('common/pb_ftr_footer');
		}else{		
			
			$data['property'] = $exist;
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/detail',$data);
			$this->load->view('common/pb_ftr_footer');
		}
	}
	
	public function delete()
	{
		$delete_id = $this->uri->segment(3);
		$agent_id = $this->session->userdata('id');
		
		if ($this->input->post('button2')){
			$buttontype = $this->input->post('button2');
		}else{
			$buttontype = "";
		}
		
		if ($buttontype == ""){
			$this->load->model('Pb_mod_property');
			$exist = $this->Pb_mod_property->view_properties($delete_id);
			if (!$exist ){
				$this->load->model('Pb_mod_property');
				$events = $this->Pb_mod_property->get_agent_properties($agent_id);
				$amenities = $this->Pb_mod_property->get_all_amenities(1);
				$count = count($events);
				$data['count_message'] = "";
				if($count == 0){
					$data['message'] = "No properties yet.";
				}else{
					if($count == 1){
						$data['count_message'] = " property.";
					}else{
						$data['count_message'] = " properties.";
					}   
				}
				$data['events'] = $events;
				$data['amenities'] = $amenities;
				$data['count'] = $count;
				
				/*echo "<pre>";
				print_r($events);
				echo "</pre>";*/
			
				$this->load->view('common/pb_hdr_header');
				$this->load->view('agent/index', $data);
				$this->load->view('common/pb_ftr_footer');
			}		
			$data['property'] = $exist;
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/delete_confirm',$data);
			$this->load->view('common/pb_ftr_footer');
		}
		elseif ($buttontype == "confirm"){
			$delete_id = $this->input->post('id');
			
			$this->load->model('Pb_mod_property');
            $success = $this->Pb_mod_property->delete_properties($delete_id);	
			$this->load->model('Pb_mod_property');
			$events = $this->Pb_mod_property->get_agent_properties($agent_id);
			$amenities = $this->Pb_mod_property->get_all_amenities(1);
			$count = count($events);
            $data['count_message'] = "";
            if($count == 0){
				$data['message'] = "No properties yet.";
			}else{
                if($count == 1){
                    $data['count_message'] = " property.";
                }else{
                    $data['count_message'] = " properties.";
                }   
            }
			$data['events'] = $events;
			$data['amenities'] = $amenities;
			$data['count'] = $count;
			
			/*echo "<pre>";
			print_r($events);
			echo "</pre>";*/
		
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/index', $data);
			$this->load->view('common/pb_ftr_footer');
		}
		
		
	}
	
	function add() {
		$agent_id = $this->session->userdata('id');
		
		if(!$this->input->post('button2')){
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/add_view');
			$this->load->view('common/pb_ftr_footer');
		}
		elseif($this->input->post('upload_image')){
			echo "went here in upload";
			$config['upload_path']   =   "uploads/";
			$config['allowed_types'] =   "gif|jpg|jpeg|png";
			$config['max_size']      =   "5000";
			$config['max_width']     =   "500";
			$config['max_height']    =   "500";
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload())
			{
			   echo $this->upload->display_errors();
			}
			else
			{
			   $finfo=$this->upload->data();
			   $this->_createThumbnail($finfo['file_name']);
			   $data['uploadInfo'] = $finfo;
			   $data['thumbnail_name'] = $finfo['raw_name']. '_thumb' .$finfo['file_ext'];
			   $data['upload_message'] = "Image successfully uploaded.";
			   $data['title'] = $this->input->post('title');
			   $data['date'] = $this->input->post('date');
			   /*$data['title'] = $finfo;
			   $data['title'] = $finfo;
			   $data['title'] = $finfo;
			   $data['title'] = $finfo;
			   $data['title'] = $finfo;
			   $data['title'] = $finfo;
			   $data['title'] = $finfo;*/
			   //$this->load->view('agent/upload_success',$data);
			   $this->load->view('common/pb_hdr_header');
			   $this->load->view('agent/add_view',$data);
			   $this->load->view('common/pb_ftr_footer');
			}		
		}
		elseif($this->input->post('button2')){
			//echo "went here in buttontype";
			$buttontype = $this->input->post('button2');
			if($buttontype == "submit"){
				$this->load->view('common/pb_hdr_header');
				$this->load->view('agent/add_confirm');
				$this->load->view('common/pb_ftr_footer');
			
			}elseif($buttontype == "confirm"){
				$content = array(
				'prop_name'				=> $this->input->post('title'),
				'prop_availby'			=> date( 'Y-m-d', strtotime( $this->input->post('date') ) ),
				'prop_type_id'			=> $this->input->post('propertytype'),
				'prop_brgy' 			=> $this->input->post('barangay'),
				'prop_city_mun' 		=> $this->input->post('city'),
				'prop_prov_reg' 		=> $this->input->post('province'),
				'prop_monthly_rent' 	=> $this->input->post('rent'),
				'prop_lot_area' 		=> $this->input->post('lotarea'),
				'prop_floor_area'  		=> $this->input->post('floorarea'),
				'prop_publish'			=> $this->input->post('publicview'),
				'prop_owner_id'			=> $this->input->post('prop_owner_id')
				);
				
				$this->load->model('Pb_mod_property');
                $success = $this->Pb_mod_property->insert_properties($content);	
				$prop_id = $this->Pb_mod_property->get_latest_id();
				
				if (isset($_POST['amenities1'])){
					$amenity1 = $_POST['amenities1'];
					$content = array(
					'prop_id'			=> $prop_id,
					'amenity_id'		=> $amenity1
					);
					$success = $this->Pb_mod_property->insert_amenity($content);	
				}
				if (isset($_POST['amenities2'])){
					$amenity2 = $_POST['amenities2'];
					$content = array(
					'prop_id'			=> $prop_id,
					'amenity_id'		=> $amenity2
					);
					$success = $this->Pb_mod_property->insert_amenity($content);	
				}
				if (isset($_POST['amenities3'])){
					$amenity3 = $_POST['amenities3'];
					$content = array(
					'prop_id'			=> $prop_id,
					'amenity_id'		=> $amenity3
					);
					$success = $this->Pb_mod_property->insert_amenity($content);	
				}
				if (isset($_POST['amenities4'])){
					$amenity4 = $_POST['amenities4'];
					$content = array(
					'prop_id'			=> $prop_id,
					'amenity_id'		=> $amenity4
					);
					$success = $this->Pb_mod_property->insert_amenity($content);	
				}
				if (isset($_POST['amenities5'])){
					$amenity5 = $_POST['amenities5'];
					$content = array(
					'prop_id'			=> $prop_id,
					'amenity_id'		=> $amenity5
					);
					$success = $this->Pb_mod_property->insert_amenity($content);	
				}
				if (isset($_POST['amenities6'])){
					$amenity6 = $_POST['amenities6'];
					$content = array(
					'prop_id'			=> $prop_id,
					'amenity_id'		=> $amenity6
					);
					$success = $this->Pb_mod_property->insert_amenity($content);	
				}
				if (isset($_POST['amenities7'])){
					$amenity7 = $_POST['amenities7'];
					$content = array(
					'prop_id'			=> $prop_id,
					'amenity_id'		=> $amenity7
					);
					$success = $this->Pb_mod_property->insert_amenity($content);	
				}
				if (isset($_POST['amenities8'])){
					$amenity8 = $_POST['amenities8'];
					$content = array(
					'prop_id'			=> $prop_id,
					'amenity_id'		=> $amenity8
					);
					$success = $this->Pb_mod_property->insert_amenity($content);	
				}
				
				$this->load->model('Pb_mod_property');
				$events = $this->Pb_mod_property->get_agent_properties($agent_id);
				$amenities = $this->Pb_mod_property->get_all_amenities(1);
				$count = count($events);
				$data['count_message'] = "";
				if($count == 0){
					$data['message'] = "No properties yet.";
				}else{
					if($count == 1){
						$data['count_message'] = " property.";
					}else{
						$data['count_message'] = " properties.";
					}   
				}
				$data['events'] = $events;
				$data['amenities'] = $amenities;
				$data['count'] = $count;
				
				/*echo "<pre>";
				print_r($events);
				echo "</pre>";*/
			
				$this->load->view('common/pb_hdr_header');
				$this->load->view('agent/index', $data);
				$this->load->view('common/pb_ftr_footer');	
			}
		}
		elseif($this->input->post('cancel')){
			$this->load->model('Pb_mod_property');
			$events = $this->Pb_mod_property->get_agent_properties($agent_id);
			$amenities = $this->Pb_mod_property->get_all_amenities(1);
			$count = count($events);
            $data['count_message'] = "";
            if($count == 0){
				$data['message'] = "No properties yet.";
			}else{
                if($count == 1){
                    $data['count_message'] = " property.";
                }else{
                    $data['count_message'] = " properties.";
                }   
            }
			$data['events'] = $events;
			$data['amenities'] = $amenities;
			$data['count'] = $count;
			
			/*echo "<pre>";
			print_r($events);
			echo "</pre>";*/
		
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/index', $data);
			$this->load->view('common/pb_ftr_footer');
		}
	}
	
	public function upload()
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		$detail_id = $this->uri->segment(3);
		echo "detail_id".$detail_id;
		$agent_id = $this->session->userdata('id');
		
		if(isset($_POST['upload'])) {
		  /* Load the upload library */
		   $config['upload_path']   =   "uploads/";
 
		   $config['allowed_types'] =   "gif|jpg|jpeg|png";
		   $config['max_size']      =   "5000";
		   $config['max_width']     =   "500";
		   $config['max_height']    =   "500";
		   $this->load->library('upload',$config);
		   if(!$this->upload->do_upload())
		   {
			   echo $this->upload->display_errors();
		   }
	 
		   else
		   {
			   $finfo=$this->upload->data();
			   $this->_createThumbnail($finfo['file_name']);
			   $data['uploadInfo'] = $finfo;
			   $data['thumbnail_name'] = $finfo['raw_name']. '_thumb' .$finfo['file_ext'];
			   
			   $content = array(
				'prop_id'				=> $this->input->post('prop_id'),
				'prop_pic_filepath'		=> "uploads/".$finfo['file_name'],
				'prop_caption'			=> "",
				'prop_pic_primary'		=> 1,
				'prop_pic_add_by'		=> $agent_id
				);
			   
			   $this->load->model('Pb_mod_property');
               $success = $this->Pb_mod_property->upload_picture($content);	
			   
			    $this->load->model('Pb_mod_property');
				$events = $this->Pb_mod_property->get_agent_properties($agent_id);
				$amenities = $this->Pb_mod_property->get_all_amenities(1);
				$count = count($events);
				$data['count_message'] = "";
				if($count == 0){
					$data['message'] = "No properties yet.";
				}else{
					if($count == 1){
						$data['count_message'] = " property.";
					}else{
						$data['count_message'] = " properties.";
					}   
				}
				$data['events'] = $events;
				$data['amenities'] = $amenities;
				$data['count'] = $count;
				
				/*echo "<pre>";
				print_r($events);
				echo "</pre>";*/
			
				$this->load->view('common/pb_hdr_header');
				$this->load->view('agent/index', $data);
				$this->load->view('common/pb_ftr_footer');
			   // You can view content of the $finfo with the code block below
	 
			   /*echo '<pre>';
	 
			   print_r($finfo);
	 
			   echo '</pre>';*/
	 
		   }
		}
		else{
			$data['prop_id'] = $detail_id;
			$this->load->view('common/pb_hdr_header');
			$this->load->view('agent/upload_view', $data);
			$this->load->view('common/pb_ftr_footer');
		}

	}
	
	
	    //Upload Image function
 
    function uploadImage()
 
    {
 
       $config['upload_path']   =   "uploads/";
 
       $config['allowed_types'] =   "gif|jpg|jpeg|png";
 
       $config['max_size']      =   "5000";
 
       $config['max_width']     =   "500";
 
       $config['max_height']    =   "500";
 
       $this->load->library('upload',$config);
 
       if(!$this->upload->do_upload())
 
       {
 
           echo $this->upload->display_errors();
 
       }
 
       else
 
       {
 
           $finfo=$this->upload->data();
 
           $this->_createThumbnail($finfo['file_name']);
 
           $data['uploadInfo'] = $finfo;
 
           $data['thumbnail_name'] = $finfo['raw_name']. '_thumb' .$finfo['file_ext'];
 
           $this->load->view('agent/upload_success',$data);
 
           // You can view content of the $finfo with the code block below
 
           /*echo '<pre>';
 
           print_r($finfo);
 
           echo '</pre>';*/
 
       }
 
    }
 
    //Create Thumbnail function
 
    function _createThumbnail($filename)
 
    {
 
        $config['image_library']    = "gd2";      
 
        $config['source_image']     = "uploads/" .$filename;      
 
        $config['create_thumb']     = TRUE;      
 
        $config['maintain_ratio']   = TRUE;      
 
        $config['width'] = "80";      
 
        $config['height'] = "80";
 
        $this->load->library('image_lib',$config);
 
        if(!$this->image_lib->resize())
 
        {
 
            echo $this->image_lib->display_errors();
 
        }      
 
    }}