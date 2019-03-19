<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controll extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		
		$this->load->library('session');  
        // $this->load->library('calendar');
    }
	
	public function _remap($mmm){
        
        $this->load->view('bootstrap/top');
		$this->load->view('bootstrap/nav');
        $this->{"{$mmm}"}(); // mmm이라는 메서드를 실행
        $this->load->view('bootstrap/footer');
        
    }
	
	public function index(){ 

		$this->load->view('bootstrap/index');
	}	
}