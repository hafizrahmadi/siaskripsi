<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_User','',true);
	}

	public function index()
	{
		// var_dump($this->session->userdata('logged_in'));
		$this->load->view('form_login');
	}
        
	public function login()
	{
		$this->form_validation->set_error_delimiters('<div class="text-red">','</div>');
		$this->form_validation->set_rules('username', 'Username', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('trim'=>'','required'=>'Kolom {field} harus diisi.'));
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('form_login');
		}else{
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			$result = $this->M_User->login($username,$password);
			if ($result!=FALSE) {
				$session_data = array(
					'username' => $result[0]['username'],
					'id_user' => $result[0]['id_user'],
					'level' => $result[0]['level']
					);
				$this->session->set_userdata('logged_in',$session_data);
				$session = $this->session->userdata('logged_in');
				if ($session['level']==1) {
					redirect('dashboard1');
				}else{					
					redirect('dashboard2');
				}
				
			}else{
				$data = array('error_message'=>'Username atau password salah');
				$this->load->view('form_login',$data);
			}			
		}
        
	}
        
        public function logout()
	{
		$this->session->unset_userdata('logged_in');
			echo "<script>alert('Anda telah ter-logout')</script>";			
                redirect('auth');
	}
}
