<?php
class Group_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	/**
	add메소드는 넘겨받은 ino를 가지고 temp테이블에 일시적으로 ino데이터와 datetime을 입력한다.
	이때 datetime은 DB에 데이터 삽입시 자동 생성되어 저장된다.
	*/
	function add($ino){
		$query="INSERT into TEMP(temp_ino) VALUE('$ino')";
		$result = $this->db->query($query);
		return $result;
	}
	

	/**
	match 메소드는 넘겨받은 ino가 temp테이블에 존재하는지 여부를 판단하여 결과를 리턴한다.
	*/
	function match($ino){
		$ino_query="SELECT temp_ino FROM TEMP WHERE temp_ino='$ino'";
		$ino_result= $this->db ->query($ino_query)->row();

		$json_data = null;
		if($ino_result !=NULL){
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

	/**
		registerParty메소드는 넘겨받는 나머지 데이터를 가지고
		ino & uname을 가지고 iot 테이블에 iot user 데이터를 등록하고,
		id, pname, relat,op 데이터를 가지고 party 테이블에 그룹정보를 등록한다.
		또한, 그룹이 등록되고 나면 temp테이블에서 ino정보를 삭제한다.
	*/
	function registerParty($ino,$uname,$id,$pname,$relat,$op){
		$add_iot="INSERT INTO IOT VALUES('$ino','$uname')";
		$register_query="INSERT INTO PARTY VALUES('$ino','$id','$pname','$relat','$op')";
		
		$ino_result= $this->db ->query($add_iot);
		$result=$this->db->query($register_query);

		$delete_temp_ino_query="DELETE FROM TEMP WHERE temp_ino='$ino'";
		$delete_result=$this->db->query($delete_temp_ino_query);


		if($result==TRUE){
			$json_data = array(
				'result' =>1
			);
			
		}else{
			$json_data = array(
				'result' =>0
			);

		}
		return $json_data;
	}


}
?>