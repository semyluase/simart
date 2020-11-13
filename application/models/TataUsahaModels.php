<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TataUsahaModels extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function listing($recordperpage,$page,$tbl_name,$order_by,$asc_desc){
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->order_by($order_by,$asc_desc);
		$this->db->limit($recordperpage,$page);
		$result = $this->db->get();
		return $result;	
	}

	function listingsurat($recordperpage,$page,$tbl_name,$order_by,$asc_desc,$col_name,$where){
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->order_by($order_by,$asc_desc);
		$this->db->where($col_name,$where);
		$this->db->limit($recordperpage,$page);
		$result = $this->db->get();
		return $result;	
	}
	function listingsuratkeluar($recordperpage,$page,$tbl_name,$order_by,$asc_desc,$col_name,$where,$col_name1,$where1){
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->order_by($order_by,$asc_desc);
		$this->db->where($col_name,$where);
		$this->db->where($col_name1,$where1);
		$this->db->limit($recordperpage,$page);
		$result = $this->db->get();
		return $result;	
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

	function query($data){
		$result = $this->db->query($data);
		return $result;
	}

	function insert($tb_name,$data){
		$this->db->insert($tb_name,$data);
	}

	function editRecordDisposisi($col_name,$where,$col_name1,$where1,$col_name2,$where2,$tbl_name,$data){
		$this->db->where($col_name,$where);
		$this->db->where($col_name1,$where1);
		$this->db->where($col_name2,$where2);
		$this->db->update($tbl_name,$data);
	}

	function editRecord($col_name,$where,$tbl_name,$data){
		$this->db->where($col_name,$where);
		$this->db->update($tbl_name,$data);
	}
}