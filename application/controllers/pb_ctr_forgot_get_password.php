<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pb_ctr_forgot_get_password extends CI_Controller
{
public function index($rs=FALSE)
  {
    $this->load->database();
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
  
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]|max_length[20]|matches[passconf]|sha1');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
	
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
	
	if ($this->form_validation->run() == FALSE)
     {
        echo form_open();
		$this->load->view('common/pb_hdr_header');
		$this->load->view('common/forgot/gp_form');
		$this->load->view('common/pb_ftr_footer');
    }
   else
    {
        $query=$this->db->get_where('tbl_users', array('rs' => $rs), 1);
        if ($query->num_rows() == 0)
		{
			show_error('Sorry!!! Invalid Request!');
		}  
		else
		{
		$data = array(
            'user_password' => $this->input->post('password'),
            'rs' => ''
		);
        $where=$this->db->where('rs', $rs);
        $where->update('tbl_users',$data);
     
      //echo "Congratulations!";
	  $this->load->view('common/pb_hdr_header');
	  $this->load->view('common/forgot/congrats');
	  $this->load->view('common/pb_ftr_footer');
      }
   
  }

 }
     
}