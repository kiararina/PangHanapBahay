<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
Controller class:  	phb_about
Description:		Displays the "About Page'

*/

class Pb_ctr_404 extends CI_Controller {

	public function index()
	{
		$this->load->view('common/pb_hdr_header');
		$this->load->view('common/pb_bdy_404'); 
		$this->load->view('common/pb_ftr_footer');

	}
}
