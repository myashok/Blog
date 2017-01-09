<?php
class articlesModel extends CI_Model {
	public function getArticleList() {
		$user_id = $this->session->userdata('user_id');
		$q = $this->db->select(['title','id'])
					  ->from('articles')
					  ->where('user_id',$user_id)
					  ->get();
	    return $q->result();
	}
	public function insertArticle($array) {
	    return $this->db->insert('articles', $array);
	}
	public function findArticle($articleid) {
		$q = $this->db->select()
		 		  ->from('articles')
		 		  ->where('id',$articleid)
		 		  ->get();
		return $q->result_Array();
	}
	public function updateArticle($articleid) {
		return $this->db->from('articles')
						->where('id', $articleid)
						->delete();
	}
}