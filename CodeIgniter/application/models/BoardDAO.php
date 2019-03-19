<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// DB에 connect해서 작업하는건 여기서 하는 것임

class BoardDAO extends CI_Model { 
    function __construct() {
        parent::__construct();
        
    }
    
    function listtt() {
        //echo "centerDAO listtt() 실행";
		
		$sql = "select * from board order by id desc";
		
		$query = $this->db->query($sql);
		
		return $query->result();
    }
	
	function write($dto) {
		
		$sql = "insert into board (title,content, cnt, regdate, upfile, pname) values ('$dto->title','$dto->content',-1,sysdate(),'$dto->upfile','$dto->pname')";
		echo $sql;
		$query = $this->db->query($sql);
		
		$sql = 'select max(id) as no from board';
		
		$query = $this->db->query($sql);
		
		return $query->row()->no;

	}
	
	function detail($id) {
		
		$sql = "select * from board where id=$id";
		
		$query = $this->db->query($sql);
		
		return $query->row();
    }
	
	function addCnt($id) {
		$sql = "update board set cnt = cnt+1 where id = $id";
		$query = $this->db->query($sql);
	}
	
	function modify($dto) {
		
		$sql = "update board set title='$dto->title',content='$dto->content' where id=$dto->id";
		
		//echo $sql;
        $this->db->query($sql);  
        
        return $this->db->affected_rows();
	}
	
	function delete($id) {
		$sql = "delete from board where id=$id";
		
		$this->db->query($sql);
	}
}