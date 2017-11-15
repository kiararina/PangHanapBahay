<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Controller class:  	phb_about
Description:		Displays the "About Page'

*/

class Pb_ctr_about extends CI_Controller {

	public function index()
	{
		$this->load->view('common/pb_hdr_header');
		$this->load->view('common/pb_bdy_about'); 
		$this->load->view('common/pb_ftr_footer');

	}
}
