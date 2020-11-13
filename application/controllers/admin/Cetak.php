<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('admin/caricetak',$data);
	}
	
	public function cari(){
		$tujuan = $this->input->post('tujuan');
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = date('Y-m-d');
		
		$data['tujuan'] = $tujuan;
		$data['tgl_awal'] = $tgl_awal;
		$data['tgl_akhir'] = $tgl_akhir;


		if ($tujuan=='BUPATI ALOR') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else if ($tujuan=='WAKIL BUPATI ALOR') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else if ($tujuan=='Sekretaris Daerah') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else if ($tujuan=='Asisten Pemerintah dan Kesra') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else if ($tujuan=='ASISTEN PEREKONOMIAN DAN PEMBANGUNAN') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		}

		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('admin/dapatcetakdetail',$data);
	}
	
	public function simpan(){
		$tujuan = $this->input->post('tujuan');
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');


		if ($tujuan=='BUPATI ALOR') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else if ($tujuan=='WAKIL BUPATI ALOR') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else if ($tujuan=='Sekretaris Daerah') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else if ($tujuan=='Asisten Pemerintah dan Kesra') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else if ($tujuan=='ASISTEN PEREKONOMIAN DAN PEMBANGUNAN') {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		} else {
			$data['suratmasuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE b.tgl_terima >= '.$tgl_awal.' OR b.tgl_terima <= '.$tgl_akhir.' and b.tujuan="'.$tujuan.'"');
		}

		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('admin/printagenda',$data);
	}
}