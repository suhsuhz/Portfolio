<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends CI_Controller {
	function __construct() {
        parent::__construct();
		
        $this->load->library('session');  
    }
}
