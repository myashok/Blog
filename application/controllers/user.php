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
					 'full_tag_close'  => "</ul>",
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
	public function search() {		;
		$query = $this->input->post('query');
		$this->form_validation->set_rules('query', 'Query', 'required|alpha_numeric_spaces');
		$this->form_validation->set_error_delimiters('<p class="text-danger" style="padding-top:10px; font-size:16px; font-weight:bold;">','</p>');
		if($this->form_validation->run()) {
			return redirect("user/search_results/$query");
		}
		else 
			$this->index();		
	 }
	 public function search_results($query) {
	 			$this->load->model('articlesModel','article');
	 			$this->load->library('pagination');
	 			$config = [  'base_url'        => base_url("user/search_results/$query"),
	 						 'per_page'        => 5,
	 						 'total_rows'      => $this->article->searchRowCount($query),
	 						 'full_tag_open'   => "<ul class='pagination footer'>",
	 						 'full_tag_close'  => "</ul>",
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
	 						 'last_Link' 	   => "Last",
	 						 'uri_segment'	   => 4
	 						
	 		    ];
	 			$this->pagination->initialize($config);
	 			$articles = $this->article->searchArticles($query, $config['per_page'], $this->uri->segment(4));
	 			$this->load->view('public/search_list',compact('articles'));
	 }
	 public function article($articleid) {	 	
	 	$this->load->model('articlesModel','articles');
	 	$articles = $this->articles->find($articleid);	 	
	 	$this->load->view('public/user_article',compact('articles'));
	 }
}