<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {
	public function index() {
		$this->load->view('public/article_list');
	}
}