<?php
class Geofence_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	/** geofence_Table�� IoTĨ���κ��� ino�� ����.
	�⺻���� ������ DB�� everywear���� service�� ������
	geofence ���̺��� �ش� ino�� �����͸� ��ȯ�Ѵ�.*/
public function geofence_Table($ino){
	$change_DB="use service";
	$this->db->query($change_DB);
	$query="select * from geofence where ino='$ino'";
	$geofence_data=$this->db->query($query)->result_array();
	return $geofence_data;
}
}
?>	