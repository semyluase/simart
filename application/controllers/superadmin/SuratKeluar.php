<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['suratkeluar'] = $this->SuperModels->getAllRecordsOrderBy('t_suratkeluar','id','ASC');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/srtkeluar',$data);
	}

	function ambil_surat_keluar(){
		$tgl_start = $this->input->post('tgl_start');
		$tgl_end = $this->input->post('tgl_end');

		$total_row		= $this->SuperModels->query("SELECT * FROM t_suratkeluar WHERE tgl_catat >= '".$tgl_start."' AND tgl_catat <= '".$tgl_end."'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		$akhir	= $per_page;
		
		$data['pagi']	= _page($total_row, $per_page, 4, base_url()."superadmin/suratkeluar/p");
		$data['tgl_start'] = $tgl_start;
		$data['tgl_end'] = $tgl_end;
		$data['suratkeluar'] = $this->SuperModels->query("SELECT * FROM t_suratkeluar INNER JOIN t_pen ON t_suratkeluar.id_penerima=t_pen.id_penerima WHERE tgl_catat >= '".$tgl_start."' AND tgl_catat <= '".$tgl_end."' ORDER BY id ASC");
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/lhtsrtkeluar',$data);
	}

	function print(){
		$tgl_start = $this->input->post('tgl_start');
		$tgl_end = $this->input->post('tgl_end');

		$data['tgl_start'] = $tgl_start;
		$data['tgl_end'] = $tgl_end;
		$data['suratkeluar'] = $this->SuperModels->query("SELECT * FROM t_suratkeluar INNER JOIN t_pen ON t_suratkeluar.id_penerima=t_pen.id_penerima WHERE tgl_catat >= '".$tgl_start."' AND tgl_catat <= '".$tgl_end."' ORDER BY id ASC");
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/ctksrtkeluar',$data);
	}
}