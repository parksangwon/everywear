<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Emerg extends CI_Controller {
 	function __construct() {
		parent::__construct();
		$this->load->database();
		$this ->load -> model('emerg_model');
 }

/**
getinfo는 비상시를 알리는 flag(0-정상 or 1-비정상 의 값을 갖는다.)와 IoT의 일련번호 정보(ino)를
매개변수로 받아 비상(flag=1)이면  위치정보와 일련번호를 등록한 ID들을 찾아 출력한다.
만약, flag=0이면 정상데이터로 위치정보를 DB에 저장한다.
*/
  public function getinfo($flag, $ino){

    if($flag==1){
  		$loc_data=$this->emerg_model->getdata($flag,$ino);
         $get_id_data=$this->emerg_model->groupcheck($ino);

  	      // var_export($data);
        echo json_encode ($loc_data)."<br/><br/>";
        echo json_encode($get_id_data)."<br/><br/>";
  	}
    else{

      echo "flag=$flag 정상데이터임<br/>";
    }



  }
  

// IoT에서 datetime을 넘겨줄 때...
public function getinfo2($flag, $ino, $datetime){
  if($flag==1){
      $this->load->model('emerg_model');
      $data=$this->emerg_model->getdata1($flag,$ino,$datetime);
  } else{
   
    echo "flag=$flag 정상데이터임<br/>";
  }
}




}

?>