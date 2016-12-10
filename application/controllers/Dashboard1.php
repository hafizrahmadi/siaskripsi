<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller {

	public function index()
	{		
		$session = $this->session->userdata('logged_in');
		$data = array(
				'data' => $session
			);
		// die(var_dump($data));
		$this->load->view('view_dashboard1',$data);
	}
}
