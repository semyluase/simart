<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperModels extends CI_Model {
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

	function getAllRecordsOrderBy($tbl_name,$order_by,$asc_desc){
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->order_by($order_by,$asc_desc);
		$result = $this->db->get();
		return $result;		
	}

	function getRecordSingle($select,$from,$col_name,$where){
		$this->db->select($select);
		$this->db->from($from);
		$this->db->where($col_name,$where);
		$result = $this->db->get();
		return $result;
	}

	function listing($recordperpage,$page,$tbl_name,$order_by,$asc_desc){
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->order_by($order_by,$asc_desc);
		$this->db->limit($recordperpage,$page);
		$result = $this->db->get();
		return $result;	
	}

	function query($data){
		$result = $this->db->query($data);
		return $result;
	}

	function insert($tb_name,$data){
		$this->db->insert($tb_name,$data);
	}

	function editRecord($col_name,$where,$tbl_name,$data){
		$this->db->where($col_name,$where);
		$this->db->update($tbl_name,$data);
	}
}