<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CariSurat extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('admin/cari',$data);
	}

	public function search(){
		$mode = $this->input->post('mode');
		$kata = strtoupper($this->input->post('katakunci'));


		if ($mode=='Asal Surat') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_surat WHERE asal_surat LIKE "%'.$kata.'%"');
		} else if ($mode=='Tujuan Surat') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_surat WHERE tujuan LIKE "%'.$kata.'%"');
		}

		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('admin/dapatsurat',$data);
	}

	public function detail($id){
		$data['surat'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'"');
		$data['no'] = $id;
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('admin/dapatsuratdetail',$data);
	}
}