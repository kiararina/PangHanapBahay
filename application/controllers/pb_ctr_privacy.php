<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Controller class:  	phb_privacy
Description:		Displays the Privacy Policy Page

*/

class Pb_ctr_privacy extends CI_Controller {

	public function index()
	{
		$this->load->view('common/pb_hdr_header');
		$this->load->view('common/pb_bdy_privacy'); 
		$this->load->view('common/pb_ftr_footer');

	}
}
