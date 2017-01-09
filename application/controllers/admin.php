<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller {
	public function dashboard() {
	    $this->load->model('articlesModel','article');
		$articles = $this->article->getArticleList();
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('user_id')) {
			return redirect('login');			
		}
	}
	public function add_article() {		 
		$this->load->view('admin/add_article');
	}
	public function store_article() {
		//echo "success";
		$this->form_validation->set_rules('title', 'Article Title', 'required|alpha_dash');
		$this->form_validation->set_rules('body', 'Article Body','required');		
		if($this->form_validation->run()) {
			echo "success";
		}
		else {		
			$this->load->view('admin/add_article');	
		}
	}
	public function edit_article() {

	}
	public function delete_article() {

	}
}