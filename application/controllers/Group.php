<?php if ( ! defined('BASEPATH')) exit('No direct script access aloowed');
class Group  extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Group_model');
	}

	/**
	tempIno메소드는 링크로부터 ino를 받아서 Group_model의 add메소드로 ino를 넘겨준다.

	link : http://(serverIP)/index.php/Group/tempIno?ino=(ino)
	*/
	function tempIno(){
		$ino = $this->input->get('ino');
		$temp_ino=$this->Group_model->add($ino);

		if($temp_ino ==TRUE){
			$json_data=array(
				'result'=>1
			);
		}else{
			$json_data = array(
				'result'=>0
			);
		}
		echo json_encode($json_data);

	}

/**
match메소드는 링크로부터 ino를 가지고 와서 json타입으로 반환한다.

*/
	function match(){
		$ino=$this->input->get('ino');
		$result=$this->Group_model->match($ino);

		if ($result['result'] == 1) {
			$json_data=array(
				'result'=>1
			);
		} else{
			$json_data = array(
				'result' =>0
			);
		}

		echo json_encode($json_data);
	}
	/**
	 register메소드는 ino, uname, id, pname, relat, op 매개변수를 넘겨받아
	 model의 match메소드로 ino를 넘겨서 ino가 존재하는지를 체크한다.
	 그 결과가 존재하면 result=>1이면 registerParty메소드로 ino, uname, id, pname, relat, op 변수를
	 넘겨서  그룹을 등록한다.

	link : http://(serverIP)/index.php/Group/register?ino=(ino)&uname=(uname)&id=(id)&pname=(pname)&relat=(relat)&op=(op)
	*/
	function register(){
		$ino   = $this->input->get('ino');
		$uname = $this->input->get('uname');
		$id    = $this->input->get('id');
		$pname = $this->input->get('pname');
		$relat = $this->input->get('relat');
		$op    = $this->input->get('op');

		$ino_data=$this->Group_model->match($ino);
		/**
		$ino_dataa는 추후에 수정예정
		*/
		
		if($ino_data['result'] == 1){
			$register_data=$this->Group_model->registerParty($ino,$uname,$id,$pname,$relat,$op);
			$json_data=array(
				'result'=>1);

		} else{
			$json_data = array(
				'result' =>0
			);
			
		}		

		echo json_encode($json_data);
	}

	/**
	그룹 리스트 반환 메서드(id)
	params: id
	return: pname[]
	*/
	function getGroups() {
		$id = $this->input->get('id');
		if ( 0 != strcmp($id, '') ) {
			$result = $this->Group_model->getGroupList($id);
			echo $this->urldecodeArr(json_encode($result));
		}
	}

	/**
	해당 그룹에 해당하는 기기 리스트 반환 메서드(id, pname)
	params: id, pname
	return: (ino, relat)[]
	*/
	function getDevices() {
		$id = $this->input->get('id');
		$pname = $this->input->get('pname');
		if ( 0 != strcmp($id, '') && 0 != strcmp($pname, '') )	{
			$result = $this->Group_model->getDeviceList($id, $pname);
			echo $this->urldecodeArr(json_encode($result));
		}
	}

	/**
	다차원배열 urldecodeing 메서드
	params: array $data
	*/
	private function urldecodeArr($data) {
		$new_data = array();
		if(is_array($data)) {
			foreach($data AS $k => $v) {
				if(is_array($v)) {
					$new_data[$k] = $this->urlencodeArr($v);
				} else {
					$new_data[$k] = rawurldecode($v);
				}
			}
		} else {
			$new_data = rawurldecode($data);
		}
		return $new_data;
	}
}
?>