<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Redirect');		
	}	

	public function index()
	{		
		$this->redirect->backToLogin();
		$session = $this->session->userdata('logged_in');
		$data = array(
				'data' => $session
			);
		// die(var_dump($data));
		$this->load->view('view_dashboard1',$data);
		$this->session->set_userdata('referred_from', current_url());
	}
}
