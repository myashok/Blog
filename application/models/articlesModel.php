<?php
class articlesModel extends CI_Model {
	public function getArticleList($limit, $offset) {
		$user_id = $this->session->userdata('user_id');
		$q = $this->db->select()
					  ->from('articles')
					  ->where('user_id',$user_id)
					  ->limit($limit, $offset)
					  ->order_by('created_at','desc')
					  ->get();
	    return $q->result();
	}
	public function getRowCount() {
		$user_id = $this->session->userdata('user_id');
		$q = $this->db->select()
					  ->from('articles')
					  ->where('user_id',$user_id)
					  ->get();
	    return $q->num_rows();
	}
		public function getAllArticleList($limit, $offset) {		
		$q = $this->db->select()
					  ->from('articles')					  
					  ->limit($limit, $offset)
					  ->order_by('created_at','desc')
					  ->get();
	    return $q->result();
	}
	public function getAllRowCount() {
		$user_id = $this->session->userdata('user_id');
		$q = $this->db->select()
					  ->from('articles')					  
					  ->get();
	    return $q->num_rows();
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
	public function deleteArticle($articleid) {
		return $this->db->from('articles')
						->where('id', $articleid)
						->delete();
	}

	public function modifyArticle($articleid) {
		return $this->db->from('articles')
						->where('id', $articleid)
						->delete();
	}
	public function searchArticles($query, $limit, $offset) {
		$q = $this->db->select()
					  ->from('articles')
					  ->like('title',$query)
					  ->limit($limit, $offset)
					  ->order_by('created_at','desc')
					  ->get();
		return $q->result();
	}
	public function searchRowCount($query) {
		$q = $this->db->select()
					  ->from('articles')
					  ->like('title',$query)
					  ->get();
		return $q->num_rows();
	}
	public function find($articleid) {
		$q = $this->db->select()
					  ->from('articles')
					  ->where('id',$articleid)
					  ->get();
		return $q->result()[0];
	}
}