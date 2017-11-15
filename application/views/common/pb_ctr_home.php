<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pb_ctr_home extends CI_Controller {

	public function index()
	{
		//echo "<pre>";
		//print_r($_POST);
		//echo "</pre>";
	
		$this->session->set_userdata('message_error', FALSE);
		
		$this->session->set_userdata('message_error', FALSE);
		$buttontype = $this->input->post('button2');
		$sendinquiry = $this->input->post('sendinquiry');
						
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
			$events = $this->Pb_mod_property->get_public_properties(1);
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
		
		$this->load->model('Pb_mod_property');
		$filepath = $this->Pb_mod_property->get_all_filepath(1);
		$data['events'] = $events;
		$data['amenities'] = $amenities;
		$data['count'] = $count;	
		$data['filepath'] = $filepath;
		$this->load->view('common/pb_hdr_header');
		$this->load->view('common/pb_hdr_carousel');
		$this->load->view('public/index', $data);;
		$this->load->view('common/pb_ftr_footer');
	}
	
	public function detail()
	{
		$detail_id = $this->uri->segment(3);
		
		$this->load->model('Pb_mod_property');
		$exist = $this->Pb_mod_property->view_properties($detail_id);
		if (!$exist ){
			$this->load->model('Pb_mod_property');
			$events = $this->Pb_mod_property->get_public_properties();
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
		
		
			$this->load->view('common/pb_hdr_header');
			$this->load->view('public/index', $data);
			$this->load->view('common/pb_ftr_footer');
		}else{		
			$amenities = $this->Pb_mod_property->get_amenities($detail_id);
			$filepath = $this->Pb_mod_property->get_property_filepath($detail_id);

			$data['property'] = $exist;
			$data['amenities'] = $amenities;
			$data['filepath'] = $filepath;
			$data['property'] = $exist;
			echo $filepath;
			$this->load->view('common/pb_hdr_header');
			$this->load->view('public/pb_bdy_detail',$data);
			$this->load->view('common/pb_ftr_footer');
		}
	}
}
