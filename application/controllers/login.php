<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller {
	public function index() {		
		$this->load->view('public/admin_login');
	}
	public function admin_login() {
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha');
		$this->form_validation->set_rules('password', 'Password','required');
		$this->form_validation->set_error_delimiters('<p class="text-danger" margin-top="3px">','</p>');
		if($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('loginModel');			
			if ($login_id = $this->loginModel->valid_login($username, $password)) {				
				$this->session->set_userdata('user_id',$login_id);
				return redirect('admin/dashboard','refresh');
			}
			else {
				echo "No record Found";
			}
		}
		else{
			$this->load->view('public/admin_login');
		}
	}
}