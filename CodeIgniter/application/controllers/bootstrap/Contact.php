<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class memberVO {
    public $pid;
    public $pw1;
	public $email;
	public $tel;
	public $pname;
}

class Contact extends CI_Controller { 
    function __construct() {
        parent::__construct();
		
		$this->load->database();
		$this->load->model('MemberDAO');
        $this->load->library('form_validation');
		$this->load->helper('alert');
		$this->load->helper('url');    
        $this->load->helper('form');  
        $this->load->library('session');  
    }
	
	public function _remap($mmm){
        
        $this->load->view('bootstrap/top');
		$this->load->view('bootstrap/nav');
        $this->{"{$mmm}"}(); // mmm이라는 메서드를 실행
        $this->load->view('bootstrap/footer');
        
    }
    
    public function tel_validation($tel) {
        if(!preg_match('/^\d{2,3}-\d{3,4}-\d{4}$/' , $tel)) {
            return false;
        } else {
            return true;
        }
    }
    
    public function pname_validation($vv) {
        if(!preg_match('/^[가-힣]{6,12}$/', $vv)) {
            return false;
        }else {
            return true;
        }
    }
    
    public function index() {
        
        $this->form_validation->set_message('required','%s 내용이 없습니다');
        $this->form_validation->set_message('alpha_numeric','%s는 영문과 숫자만 사용 가능합니다');
        
        $this->form_validation->set_rules('pid','아이디','required|alpha_numeric');
        $this->form_validation->set_rules('pw1','비밀번호','required');
		
        if($this->form_validation->run()) {
			
			$res = new MemberVO();
			
			$res->pid = $this->input->post('pid',TRUE);
        	$res->pw1 = $this->input->post('pw1',TRUE);
			
			$result = $this->MemberDAO->loginChk($res);			
			
			if ($result) {
				$res = array (
					'pname'=>$result->pname,
					'logged_in'=>TRUE
				);
            	// $res->pname =  $result->pname;
            	// $res->logged_in = TRUE;
              	$this->session->set_userdata($res);

                alert('로그인 되었습니다.', '../bootstrap/Controll/index');
                exit;
 
            } else {
                alert('아이디나 비밀번호를 확인해 주세요.', 'Contact');
                exit;
            }
			
            $this->load->view('bootstrap/index');
        } else {
            $this->load->view('bootstrap/contact');
        }
    }
	
	public function logout() {
        $this -> session -> sess_destroy();
        alert('로그아웃 되었습니다.', '../Controll/index');
        exit;
    }
	
     public function join(){
        
        // form 화면 form_error에 뿌려줄 메세지 
        $this->form_validation->set_message('required','%s 내용이 없습니다');
        $this->form_validation->set_message('alpha_numeric','%s는 영문과 숫자만 사용 가능합니다');
        $this->form_validation->set_message('matches','%s 가 일치하지 않습니다');
        $this->form_validation->set_message('valid_email','%s 형식이 잘못되었습니다.');
        $this->form_validation->set_message('tel_validation','%s 형식은 ###-####-#### 입니다.');
        $this->form_validation->set_message('pname_validation','%s은 한글 2~4자만 가능합니다.');
        
        
        // ** 룰 정하기 **
        
        $this->form_validation->set_rules('pid','아이디','required|alpha_numeric'); 
        $this->form_validation->set_rules('pw1','비밀번호','required');
        $this->form_validation->set_rules('pw2','비밀번호','required|matches[pw1]');
        $this->form_validation->set_rules('email','이메일','required|valid_email');
        $this->form_validation->set_rules('tel','전화번호','callback_tel_validation');
        $this->form_validation->set_rules('pname','닉네임','callback_pname_validation');
		
        // ** 유효성 검사하기 **
        
        if($_POST && $this->form_validation->run()) {
			
			$dto = new memberVO();
			$dto->pid = $this->input->post('pid');
			$dto->pw1 = $this->input->post('pw1');
			$dto->email = $this->input->post('email');
			$dto->tel = $this->input->post('tel');
			$dto->pname = $this->input->post('pname');
			
			$res['loginfo'] = $this->MemberDAO->join($dto);
			
            $this->load->view('bootstrap/mypage',$res);
        }else {    
            $this->load->view('bootstrap/join');
        }
    }
	
	
}