<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('BoardDAO');
		$this->load->helper('url');
		$this->load->library('session'); 
	} 
	
	public function index() {
		$this->load->view('bootstrap/test');
	}
	
	public function insert() {
		if($_POST) {
			echo "靹标车";
			// $dto = new BoardDTO();
			// $dto->title = $this->input->post('title');
			// $dto->content = $this->input->post('content');
			// $dto->upfile = $this->input->post('upfile');
			
			// $id = $this->BoardDAO->write($dto);
			
			// redirect("bootstrap/detail/$id");

			
		} else {
			echo "鞁ろ尐";
			//redirect("bootstrap/post");
		} 		
	}
}
