<?php
class Location_model extends CI_Model {
	function __construct(){

	}
	/**
	addLocation method
	[name, date, lon, lat] 데이터를 갖는 Array를 인자로 $data에 넘겨 받고,
	각 항복을 setting한 후 location이라는 테이블에 Insert한다.
	성공 시 1, 실패, 존재하지 않는 일련번호 일 때 0
	*/
	function addLocation($data) {

		/* 존재하는 디바이스인지 먼저 validation */
		$this->load->model('Usercheck_model');
		$device = $this->Usercheck_model->searchDevice($data['ino']);

		$json_data = null;
		if ($device['result'] == 0) {
			$json_data = array(
				'result' => 0
			);
		}
		else {
			$this->db->set('ino', $data['ino']);
			$this->db->set('date', $data['date']);
			$this->db->set('lon', $data['lon']);
			$this->db->set('lat', $data['lat']);
			$this->db->insert('LOCATION');
			$result = $this->db->insert_id(); // auto_increment value

			//성공시 auto_increment 값, 실패시 null
			if ( $result != NULL ) {
				$json_data = array(
					'result' => 1
				);
			}  else {
				$json_data = array(
					'result' => 0
				);
			}
		}
		return $json_data;
	}
	/**
	getLocations method
	일련번호가 ino인 위치데이터들을 가져와서 return
	*/
	function getLocations($ino){
		$query="SELECT * FROM LOCATION WHERE INO='$ino'";
		$loc_data=$this->db->query($query)->result_array();
		return $loc_data;
	}
}
?>