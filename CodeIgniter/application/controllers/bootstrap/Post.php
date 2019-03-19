<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardDTO {
    public $title;
    public $content;
	public $upfile;
}

class Post extends CI_Controller {
	
	public $filePath = './imgup/';
	
	function __construct() {
		parent::__construct();
		
		$this->load->database();
		$this->load->model('BoardDAO');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session'); 
		$this->load->helper('alert');  
        $this->load->helper('form');  
	} 
	
	public function _remap($mmm){
        
	$this->load->view('bootstrap/top');
		$this->load->view('bootstrap/nav');
	$this->{"{$mmm}"}(); // mmm이라는 메서드를 실행
	$this->load->view('bootstrap/footer');
        
	}
	
	public function index() {
		
		$res['dd'] = $this->BoardDAO->listtt();
		$this->load->view('bootstrap/post',$res);
	}
	
	public function test() {
		$this->load->view('bootstrap/test');
	}
	
	public function insert() {
		
		if($_POST) {
			$dto = new BoardDTO();
			$dto->title = $this->input->post('title');
			$dto->content = $this->input->post('content');
			$dto->pname = $this->session->userdata('pname');
			// $dto->upfile = $this->input->post('upfile');

			$config['upload_path'] = $this->filePath;
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';

			$this->load->library('upload',$config);
			
			if($this->upload->do_upload('upfile')) {
			//echo "성공";
			
			$fileData = $this->upload->data();
			$dto->upfile = $fileData['file_name'];
			
			} else {
				echo "파일 업로드 실패";
			}
			
			$id = $this->BoardDAO->write($dto);
			redirect("bootstrap/Post/detail/$id");
			
		} else {
			$this->load->view('bootstrap/Post');
		}
		
	}
	
	public function detail() {
		$id = $this->uri->segment(4);
		//echo $id;
		$this->BoardDAO->addCnt($id);
		$res['dd'] = $this->BoardDAO->detail($id);
		$this->load->view('bootstrap/detail',$res);
	}
	
	public function modify() {
		
		if($_POST) {
			$dto = new BoardDTO();
            $dto->id = $this->input->post('id');
            $dto->title = $this->input->post('title');
            $dto->content = $this->input->post('content');
            
            $this->BoardDAO->modify($dto);
			
            alert('수정되었습니다','../detail/'.$dto->id);
		} else {
		$id = $this->uri->segment(4);
		$res['dd'] = $this->BoardDAO->detail($id);
		$this->load->view('bootstrap/modify',$res);
		}
	}
	
	public function delete() {
		$id = $this->uri->segment(4);
		//echo $id;
		$this->BoardDAO->delete($id);
		
		alert('삭제되었습니다','../../Post');
	}
}
