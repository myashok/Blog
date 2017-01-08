<?php
class LoginModel extends CI_Model {
public function valid_login($username, $password) {
	$q = $this->db->where(['uname'=>$username,'pass'=>$password])
				  ->get('users');	
     if ($q->num_rows()) {
     	return $q->row()->id;
     }
     return false;
 }
}