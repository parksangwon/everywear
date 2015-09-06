<?php
class Pwchange_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

/**
check메소드는 controller로 부터 넘겨받은 매개변수 id와 pw로
DB에 저장된 pw와 링크를 통해 받은 pw가 같은지를 체크하는 메소드이다.
DB에 저장된 pw와 매개변수로 받은 pw가 같으면 1을 반환한다. (아니면 0을 반환)
*/
	function check($id,$pw){
		$query="SELECT pw FROM APPUSER WHERE id='$id'";
		$query_result= $this->db ->query($query)->row();

		$result = false;
		if ( 0 == strcmp($query_result->pw, $pw) ) {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}

/**
model의 change 메소드는 id와 변경할 비밀번호 change_pw를 넘겨받고
DB에 저장된 비밀번호를 변경한 후,
변경이 성공적으로 이루어지면 (query_result==true) result의 값을 1, 아니면 0을 반환
*/
	function change($id,$newPw){
		$query="UPDATE APPUSER SET pw='$newPw' WHERE id='$id'";
		$query_result=$this->db->query($query);
	

		$json_data=null;
		if($query_result==TRUE){

			$json_data=array(
				'result'=>1
			);
		}else{
			$json_data=array(
				'result'=>0
			);
		}

		return $json_data;
	}

	


}



?>