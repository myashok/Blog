<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {
	public function index() {
		$this->load->model('articlesModel','article');
		$this->load->library('pagination');
		$config = [  'base_url' => base_url('user/index'),
					 'per_page' => 5,
					 'total_rows' => $this->article->getAllRowCount(),
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
		$articles = $this->article->getAllArticleList($config['per_page'], $this->uri->segment(3));
		$this->load->view('public/article_list',compact('articles'));
	}
	public function search() {
		$this->load->model('articlesModel','article');
		$query = $this->input->post('query');
		$this->form_validation->set_rules('query', 'Query', 'required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		if($this->form_validation->run()) {
			$articles = $this->article->searchArticles($query);
			$this->load->view('public/search_list', compact('articles'));
		}
		else {
			$this->index();
		}
	 }
}