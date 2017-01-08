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
}