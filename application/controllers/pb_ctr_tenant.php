<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pb_ctr_tenant extends CI_Controller {

    function index() {
	//echo "<pre>";
	//print_r($_POST);
	//echo "</pre>";
	
	if($this->session->userdata('is_logged_in')) 
	{
		$user = $this->session->userdata('user_persona');
		$tenant_id = $this->session->userdata('id');
		
		if ($user == 1 or $user==3) 
		{
			$this->session->set_userdata('user_type_page', 'tenant');
			
			$this->session->set_userdata('message_error', FALSE);
		
			$buttontype 	= $this->input->post('button2');
			$sendinquiry 	= $this->input->post('sendinquiry');
			$like 			= $this->input->post('like');
			$unlike 		= $this->input->post('unlike');
			$shortlist 		= $this->input->post('shortlist');
			$unshortlist 	= $this->input->post('unshortlist');
							
			if($buttontype <> "" && $buttontype == "search" && $sendinquiry != true){
				//echo "search";
				$content = array(
				'prop_prov_reg'				=> $this->input->post('province'),
				'prop_city_mun'				=> $this->input->post('city'),
				'prop_brgy'					=> $this->input->post('barangay'),
				'prop_rent_min'				=> $this->input->post('rent_min'),
				'prop_rent_max'				=> $this->input->post('rent_max'),
				'prop_type'					=> $this->input->post('propertytype'),
				'prop_flr_min'				=> $this->input->post('flrarea_min'),
				'prop_flr_max'				=> $this->input->post('flrarea_max'),
				'prop_lot_min'				=> $this->input->post('lotarea_min'),
				'prop_lot_min'				=> $this->input->post('lotarea_max')
				);
				
				$this->load->model('Pb_mod_property');
				$events = $this->Pb_mod_property->search_properties();
				$amenities = $this->Pb_mod_property->get_all_amenities(1);
				$count = count($events);
				$data['count_message'] = "";
				if($count == 0){
					$data['message'] = "No results found.";
				}else{
					if($count == 1){
						$data['count_message'] = " search result.";
					}else{
						$data['count_message'] = " search results.";
					}   
				}
			}else{
			
				$this->load->model('Pb_mod_property');
				$events = $this->Pb_mod_property->get_all_properties(1);
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
			}
			
			//echo "reached this".$sendinquiry;
			
			if($sendinquiry == true){
				//echo "went here";
				$content = array(
				'response_prop_id'			=> $this->input->post('sendquiryid'),
				'response_text'				=> $this->input->post('message'),
				'response_inq_username'		=> $this->input->post('email'),
				'response_inq_dtime_add'	=> date( 'Y-m-d')
				);
				
				$this->load->model('Pb_mod_property');
				$success = $this->Pb_mod_property->insert_inquiry($content);
			}
			
			if($like != ""){
				//echo "went here";
				$content = array(
				'like_prop_id'				=> $this->input->post('like'),
				'like_user_id'				=> $tenant_id
				);
				
				$this->load->model('Pb_mod_property');
				$success = $this->Pb_mod_property->insert_like($content);
			}
			
			if($unlike != ""){
				$this->load->model('Pb_mod_property');
				$success = $this->Pb_mod_property->remove_like($this->input->post('unlike'), $tenant_id);
			}
			
			if($shortlist != ""){
				//echo "went here";
				$content = array(
				'shortl_prop_id'			=> $this->input->post('shortlist'),
				'shortl_user_id'				=> $tenant_id
				);
				
				$this->load->model('Pb_mod_property');
				$success = $this->Pb_mod_property->insert_shortlist($content);
			}
			
			if($unshortlist != ""){
				$this->load->model('Pb_mod_property');
				$success = $this->Pb_mod_property->remove_shortlist($this->input->post('unshortlist'), $tenant_id);
			}
			
			$this->load->model('Pb_mod_property');
			$filepath = $this->Pb_mod_property->get_all_filepath(1);
			$likes = $this->Pb_mod_property->get_user_likes($tenant_id);
			$shortlists = $this->Pb_mod_property->get_user_shortlists($tenant_id);
			$data['events'] = $events;
			$data['amenities'] = $amenities;
			$data['count'] = $count;	
			$data['filepath'] = $filepath;
			$data['likes'] = $likes;
			$data['shortlists'] = $shortlists;
			$this->load->view('common/pb_hdr_header');
			$this->load->view('common/pb_hdr_carousel');
			$this->load->view('tenant/index', $data);;
			$this->load->view('common/pb_ftr_footer');
		
		}//redirect('tenant');
		else
		{
			$this->session->set_userdata('user_type_page', 'agent');
			
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
	
	public function detail()
	{
		$detail_id = $this->uri->segment(3);
		$tenant_id = $this->session->userdata('id');
		$sendinquiry 	= $this->input->post('sendinquiry');
		$like 			= $this->input->post('like');
		$unlike 		= $this->input->post('unlike');
		$shortlist 		= $this->input->post('shortlist');
		$unshortlist 	= $this->input->post('unshortlist');
		
		$this->load->model('Pb_mod_property');
		$exist = $this->Pb_mod_property->view_properties($detail_id);
		if (!$exist ){
			$this->load->model('Pb_mod_property');
			$filepath = $this->Pb_mod_property->get_all_filepath(1);
			$likes = $this->Pb_mod_property->get_user_likes($tenant_id);
			$shortlists = $this->Pb_mod_property->get_user_shortlists($tenant_id);
			$data['events'] = $events;
			$data['amenities'] = $amenities;
			$data['count'] = $count;	
			$data['filepath'] = $filepath;
			$data['likes'] = $likes;
			$data['shortlists'] = $shortlists;
		
			$this->load->view('common/pb_hdr_header');
			$this->load->view('tenant/index', $data);
			$this->load->view('common/pb_ftr_footer');
		}else{		
			$amenities = $this->Pb_mod_property->get_amenities($detail_id);
			$filepath = $this->Pb_mod_property->get_property_filepath($detail_id);
			$filepath = $this->Pb_mod_property->get_all_filepath(1);
			$likes = $this->Pb_mod_property->get_user_likes($tenant_id);
			$shortlists = $this->Pb_mod_property->get_user_shortlists($tenant_id);
			$data['amenities'] = $amenities;
			$data['filepath'] = $filepath;
			$data['likes'] = $likes;
			$data['shortlists'] = $shortlists;
			$data['property'] = $exist;
			$data['amenities'] = $amenities;
			$data['filepath'] = $filepath;
			$data['property'] = $exist;
			$this->load->view('common/pb_hdr_header');
			$this->load->view('tenant/detail',$data);
			$this->load->view('common/pb_ftr_footer');
		}
	}
}
