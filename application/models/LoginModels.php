<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModels extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	
	function getRecordWhere($select,$from,$col_name,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->where($col_name,$where);

		$result = $this->db->get();
		return $result;
	}
}