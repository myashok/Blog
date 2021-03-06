<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('user_id')) {
			return redirect('login');			
		}
		 $this->load->model('articlesModel','article');
	}
	public function dashboard() {
		$this->load->library('pagination');
		$config = [  'base_url' => base_url('admin/dashboard'),
					 'per_page' => 5,
					 'total_rows' => $this->article->getRowCount(),
					 'full_tag_open'   => "<ul class='pagination footer'>",
					 'full_tag_close'   => "</ul>",
					 'first_tag_open'  => "<li>",
					 'first_tag_close' => "</li>",
					 'last_tag_open'   => "<li>",
					 'last_tag_close'  => "</li>",
					 'prev_tag_open'   => "<li>",
					 'prev_tag_close'  => "</li>",
					 'next_tag_open'   => "<li>",
					 'next_tag_close'  => "</li>",
					 'num_tag_open'	   => "<li>",
					 'num_tag_close'   => "</li>",
					 'cur_tag_open'	   => "<li class='active'><a>",
					 'cur_tag_close'   => "</li></a>",
					 'first_link'	   => "First",
					 'last_Link' 	   => "Last"
					
	    ];
		$this->pagination->initialize($config);
		$articles = $this->article->getArticleList($config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}
	
	public function add_article() {		 
		$this->load->view('admin/add_article');
	}
	public function store_article() {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		$this->form_validation->set_rules('title', 'Article Title', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('body', 'Article Body','required');
		if(isset($_POST['edit'])) {
				$var = 'Edit';
				$articleid = $_POST['id'];
		}

		if($this->form_validation->run() && $this->upload->do_upload('userfile')) {			
			if(isset($_POST['edit'])) {
				$var = 'Edit';
				unset($_POST['edit']);
				$articleid = $this->article->deleteArticle($_POST['id']);
				unset($_POST['id']);	
			}
			else 
				$var = 'Add';	
			unset($_POST['submit']);
			$post = $this->input->post();
			$data = $this->upload->data();
			$post['filepath'] = base_url("uploads/".$data['file_name']);						
			if ($this->article->insertArticle($post)) {
				$this->session->set_flashdata('feedback',"Article {$var}ed Successfully");
				$this->session->set_flashdata('success','alert-success');
			} else {
				$this->session->set_flashdata('feedback',"Article Failed to {$var}, Please Try Again");
				$this->session->set_flashdata('success','alert-danger');
			}
			return redirect('admin/dashboard');
		}
		else {
			$upload_error =   $this->upload->display_errors();
			if(isset($var) && $var == 'Edit')	{
				$articles =  $this->article->findArticle($articleid);		
				$this->load->view('admin/edit_article',['articles'=>$articles[0], 'upload_error'=> $upload_error]);		
			}	
			else $this->load->view('admin/add_article',compact('upload_error'));	
		}
	}
	public function edit_article($articleid) {		
		$articles =  $this->article->findArticle($articleid);		
		$this->load->view('admin/edit_article',['articles'=>$articles[0]]);		
	}	
	public function delete_article($articleid) {
		 if($this->article->deleteArticle($articleid)) {
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