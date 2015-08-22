<?php
class Location_model extends CI_Model {
	function __construct(){

	}
	/**
	add 메서드
	[name, date, lon, lat] 데이터를 갖는 Array를 인자로 $data에 넘겨 받고,
	각 항복을 setting한 후 location이라는 테이블에 Insert한다.
	성공 시, AUTO_INCREMENT 값 Return
	*/
	function add($data) {
		//echo var_dump($data);
		$this->db->set('ino', $data['ino']);
		$this->db->set('date', $data['date']);
		$this->db->set('lon', $data['lon']);
		$this->db->set('lat', $data['lat']);
		$this->db->insert('LOCATION');
		$result = $this->db->insert_id(); // auto_increment value

		$json_data = null;
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
		return $json_data;
	}
}
?>