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
		$this->form_validation->set_rules('title', 'Article Title', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('body', 'Article Body','required');		
		if($this->form_validation->run()) {
			unset($_POST['submit']);
			$post = $this->input->post();			
			$this->load->model('articlesModel','article');
			if ($this->article->insertArticle($post)) {
				$this->session->set_flashdata('feedback','Article Added Successfully');
				$this->session->set_flashdata('success','alert-success');
			} else {
				$this->session->set_flashdata('feedback','Article Failed to Add, Please Try Again');
				$this->session->set_flashdata('success','alert-danger');
			}
			return redirect('admin/dashboard');
		}
		else {		
			$this->load->view('admin/add_article');	
		}
	}
	public function edit_article($articleid) {
		$this->load->model('articlesModel','article');		
		$articles =  $this->article->findArticle($articleid);		
		$this->load->view('admin/edit_article',['articles'=>$articles[0]]);
	}
	public function delete_article($articleid) {
		 $this->load->model('articlesModel','article');
		 if($this->article->updateArticle($articleid)) {
		 	$this->session->set_flashdata('feedback','Article Deleted Successfully');
		 	$this->session->set_flashdata('success','alert-success');
		 }
		 else {
				$this->session->set_flashdata('feedback','Article Failed to delete, Please Try Again');
				$this->session->set_flashdata('success','alert-danger');
			}
			return redirect('admin/dashboard');

		 
	}
}