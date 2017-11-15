<?php
class Pb_ctr_update extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('pb_mod_admin');
		//$this->load->library('form_validation');
    }  
    
	public function update()
    {
        $id = $this->session->userdata('id'); 
		$oldpersona = $this->session->userdata('user_persona'); 
		  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
				
    
                $data_to_store = array(
                    
					'user_first_name' => $this->input->post('f_first_name'),
					'user_middle_name' => $this->input->post('f_middle_name'),
					'user_last_name' => $this->input->post('f_last_name'),
					'user_email_addr' => $this->input->post('email'),
					'user_affiliation' => $this->input->post('f_affiliation'),
					'user_persona' => $this->input->post('credential'),
					);
				
					
					
            //  print_r ($data_to_store);
			//	exit;
				
				//if the insert has returned true then we show the flash message
               $newpersona = $this->input->post('credential');
			   
			   if($oldpersona==1 AND $newpersona==2){
			  
			  
			   }elseif ($oldpersona==2 AND $newpersona==1){
			  
			   			   
			   }elseif ($oldpersona==3 AND $newpersona==1){
			  
			   			   
			   }elseif ($oldpersona==3 AND $newpersona==2){
			   
			   }else{
			   
				if($this->pb_mod_admin->update_users($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
               redirect('pb_ctr_change_profile');
			}	
           

        }
			 $data['user'] = $this->pb_mod_admin->get_user_by_id($id);
        
			//load the view
			$this->load->view('common/pb_hdr_header');
			$this->load->view('common/user/profile',$data);
			$this->load->view('common/pb_ftr_footer');  

    }
}