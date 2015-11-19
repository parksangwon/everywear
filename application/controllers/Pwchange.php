<?php if ( ! defined('BASEPATH')) exit('No direct script access aloowed');
class Pwchange  extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Pwchange_model');
	}


/**
check 메소드는 링크로부터 id와 기존의 pw를 받아와서 
check_model로 id와 pw를 매개변수로 전달한다.
이후 result로 돌려받은 값이 1이면 DB의 데이터와 링크로 받은 pw가 같다는 것을 의미하기때문에
id와 변경할 비밀번호 change_pw 변수를 change메서드로 넘긴다.
만약 result의 값이 0이면 DB의 pw와 링크를 통해 받은 pw값이 다름을 의미함.
result로 0을 어플에 반환한다.
*/
	function check(){
		$id=$this->input->get('id', true);
		$pw=$this->input->get('pw', true);
		$newPw=$this->input->get('newPw', true);


		$result = array('result' => 0);
		if ( strcmp($id, '') != 0 && strcmp($pw, '') != 0 && strcmp($newPw, '') != 0 ) {
			$updateResult=$this->Pwchange_model->check($id,$pw);
			if( $updateResult ){
				$result = $this->change($id, $newPw);
			}
		}
		echo json_encode($result);
	}
/**
 change 메소드는 check메서드로부터 id와 newPw를 매개변수로 넘겨받아서
 비밀번호를 변경하기 위해서 model로 넘기는 역할을 한다. 
*/
	private function change($id,$newPw){
		
		$result=$this->Pwchange_model->change($id,$newPw);

		return $result;

	}	

}






?>
