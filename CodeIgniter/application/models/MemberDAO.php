<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberDAO extends CI_Model { 
    function __construct() {
        parent::__construct();
    }

	function join($dto) {
		
		$sql = "insert into member (pid, pw1, email, tel, pname) values ('$dto->pid','$dto->pw1','$dto->email','$dto->tel','$dto->pname')";
		// echo $sql;
		$query = $this->db->query($sql);
		
		$sql = "select * from member order by id desc limit 1";
		
		$query = $this->db->query($sql);
		
		return $query->row();

	}
	
	public function loginChk($mem){
        $query = "select * from member where pid ='".$mem->pid."' and pw1 = '".$mem->pw1."'";
        //echo $query;
        $result = $this->db->query($query);
        
		if ($result->num_rows() > 0) {
            return $result -> row();
        } else {
            return FALSE;
        }
 
    }
	
}