<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Search extends CI_Controller {
 	function __construct() {
		parent::__construct();
		$this->load->database();
		$this ->load -> model('search_model');
	 }

	public function search_loc_data($ino){
		$get_loc_data=$this->search_model->gets($ino);
		 echo json_encode($get_loc_data)."<br/><br/>";
	}
}
?>