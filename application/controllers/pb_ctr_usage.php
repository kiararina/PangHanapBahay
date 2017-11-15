<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Controller class:  	phb_usage
Description:		Displays the Terms and Conditions Page

*/

class Pb_ctr_usage extends CI_Controller {

	public function index()
	{
		$this->load->view('common/pb_hdr_header');
		$this->load->view('common/pb_bdy_terms'); 
		$this->load->view('common/pb_ftr_footer');

	}
}
