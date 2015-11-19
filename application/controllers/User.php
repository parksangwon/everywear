<?php if ( ! defined('BASEPATH')) exit('No direct script access aloowed');
class User  extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('User_model');
	}

	/**
	validId method
	id와 일치하는 id가 있는지 확인. 존재하면 1, 존재하지 않으면 0
	link : http://(serverIP)/index.php/User/checkDevice?ino=(ino)
	*/
	function validId() {
		$id = $this->input->get('id', true);
		$result = $this->User_model->isExsist($id);
		$result = $this->toArray($result);
		echo json_encode($result);
	}
	
	/**
	checkId method
	id와 pw를 입력받고 DB에서 조회한다. 일치하면 1과 이름, 존재하지 않거나 일치하지 않으면 0
	link : http://(serverIP)/index.php/User/checkId?id=(id)&pw=(pw)
	*/
	function checkId() {
		$id = $this->input->get('id', true);
		$pw = $this->input->get('pw', true);
		$result=$this->User_model->searchUser($id,$pw);
		echo urldecode( json_encode( $result ) );
	}
	/**
	checkDevice method
	ino와 일치하는 디바이스를 조회한다. 일치하면 1, 존재하지 않으면 0
	link : http://(serverIP)/index.php/User/checkDevice?ino=(ino)
	*/
	function checkDevice() {
		$ino = $this->input->get('ino', true);
		$result = $this->User_model->searchDevice($ino);
		echo json_encode($result);
	}

	/**
	register mehtod
	회원가입 메서드
	성공하면 1 실패하면 0

	link : http://(serverIP)/index.php/User/register?id=(id)&pw=(pw)&name=(name)&email=(email)&sex=(sex)
	*/
	function register() {
		$id = $this->input->get('id', true);
		$pw = $this->input->get('pw', true);
		$name = urldecode( $this->input->get('name', true) );
		$email = $this->input->get('email', true);
		$sex = $this->input->get('sex', true);

		$result = array("result" => false);
		if ( strcmp("", $id)!=0 && strcmp("", $pw)!=0 && strcmp("", $name)!=0 && strcmp("", $email)!=0 && strcmp("", $sex)!=0 ) {
			$result = $this->User_model->addUser(array(
				'id'	  => $id,
				'pw'	  => $pw,
				'name' => $name,
				'email' => $email,
				'sex'	  => $sex
			));
		}
		echo json_encode($result);
	}

	// 개인정보 조회
	function checkInfo() {
		$id = urldecode( $this->input->get('id', true) );

		$result = array('result'=>0);
		if ( strcmp("", $id) != 0 ) {
			$result = $this->User_model->lookForUser($id);
		}
		echo urldecode(json_encode($result));
	}
}
?>
