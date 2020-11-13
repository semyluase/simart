<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		if ($user['rank']=="Admin Bupati") {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="BUPATI ALOR" AND status="BELUM DIBACA"')->num_rows();
		} else if ($user['rank']=="Admin Wabup") {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="WAKIL BUPATI ALOR" AND status="BELUM DIBACA"')->num_rows();
		} else if ($user['rank']=="Admin Sekda") {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Sekretaris Daerah" AND status="BELUM DIBACA"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=="Admin Ass 1") {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Asisten Pemerintah dan Kesra" AND status="BELUM DIBACA"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Asisten Adm. Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=="Admin Ass 2") {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="BELUM DIBACA"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
		}else if ($user['rank']=="Admin Ass 3") {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN ADMINISTRASI UMUM" AND status="BELUM DIBACA"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
		} else {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="KABAG. UMUM" AND status="BELUM DIBACA"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="KABAG. UMUM" AND status="Belum Dibaca"')->num_rows();
		}
		$this->load->view('tatausaha/dashboard',$data);
	}
}