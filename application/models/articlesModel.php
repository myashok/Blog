<?php
class articlesModel extends CI_Model {
	public function getArticleList() {
		$user_id = $this->session->userdata('user_id');
		$q = $this->db->select('title')
					  ->from('articles')
					  ->where('user_id',$user_id)
					  ->get();
	    return $q->result();
	}
}