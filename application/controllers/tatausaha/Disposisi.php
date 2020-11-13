<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index($id)
	{
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		$tahun = date('y');
		if ($user['rank']=='Admin Bupati') {
			$data['surat_masuk'] = $this->UserModels->query('SELECT no_agenda, no_surat, tgl_surat, tgl_terima, asal_surat, perihal FROM t_surat WHERE no_agenda="'.$id.'" AND tujuan="BUPATI ALOR" AND tahun="'.$tahun.'"');
		} else if ($user['rank']=='Admin Wabup') {
			$data['surat_masuk'] = $this->UserModels->query('SELECT no_agenda, no_surat, tgl_surat, tgl_terima, asal_surat, perihal FROM t_surat WHERE no_agenda="'.$id.'" AND tujuan="WAKIL BUPATI ALOR" AND tahun="'.$tahun.'"');
		} else if ($user['rank']=='Admin Sekda') {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="Sekretaris Daerah" AND tahun="'.$tahun.'"');
		} else if ($user['rank']=='Admin Ass 1') {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="Asisten Pemerintah dan Kesra" AND tahun="'.$tahun.'"');
		} else if ($user['rank']=='Admin Ass 2') {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND tahun="'.$tahun.'"');
		} else if ($user['rank']=='Admin Ass 3') {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="ASISTEN ADMINISTRASI UMUM" AND tahun="'.$tahun.'"');
		} else {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="KABAG UMUM" AND tahun="'.$tahun.'"');
		}
		$this->load->view('tatausaha/disposisisurat',$data);
	}

	public function surat($id){
		$tahun = date('y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		if ($user['rank']=="Admin Bupati") {
			$data['surat_masuk'] = $this->UserModels->query('SELECT no_agenda, no_surat, tgl_surat, tgl_terima, asal_surat, perihal FROM t_surat WHERE no_agenda="'.$id.'" AND tujuan="BUPATI ALOR" AND tahun="'.$tahun.'"');
		} else {
			$data['surat_masuk'] = $this->UserModels->query('SELECT no_agenda, no_surat, tgl_surat, tgl_terima, asal_surat, perihal FROM t_surat WHERE no_agenda="'.$id.'" AND tujuan="WAKIL BUPATI ALOR" AND tahun="'.$tahun.'"');
		}
		$this->load->view('tatausaha/disposisisurat',$data);
	}

	public function add_new_disposisi(){
		$row = $_POST;
		$user = $this->session->userdata('logged_in');

		$no_agenda = $this->input->post('no_agenda');
		if ($user['rank']=="Admin Bupati") {
			$dari = "BUPATI ALOR";
		} else if ($user['rank']=="Admin Wabup") {
			$dari = "WAKIL BUPATI ALOR";
		} else if ($user['rank']=="Admin Sekda") {
			$dari = "Sekretaris Daerah";
		} else if ($user['rank']=="Admin Ass 1") {
			$dari = "Asisten Pemerintah dan Kesra";
		} else if ($user['rank']=="Admin Ass 2") {
			$dari = "ASISTEN PEREKONOMIAN DAN PEMBANGUNAN";
		} else if ($user['rank']=="Admin Ass 3") {
			$dari = "ASISTEN ADMINISTRASI UMUM";
		} else {
			$dari = "KABAG UMUM";
		}
		$teruskan = $this->input->post('teruskan');

		if ($row['perhatian_pil'] != '--') {
			$data['no_agenda'] = $no_agenda;
			$data['tgl_keluar'] = date('Y-m-d');
			$data['dari'] = $dari;
			$data['teruskan'] = $teruskan;
			$data['perhatian'] = $row['perhatian_pil'];
			$data['sifat'] = $row['sifat'];
			$data['isi_disposisi'] = $row['catatan'];
			$data['tahun'] = date('y');
			$data['status'] = 'Belum Dibaca';
			$data['status_disposisi'] = 'Belum Disposisi';
		} else {
			$data['no_agenda'] = $no_agenda;
			$data['tgl_keluar'] = date('Y-M-D');
			$data['dari'] = $dari;
			$data['teruskan'] = $teruskan;
			$data['perhatian'] = $row['perhatian_isi'];
			$data['sifat'] = $row['sifat'];
			$data['isi_disposisi'] = $row['catatan'];
			$data['tahun'] = date('y');
			$data['status'] = 'Belum Dibaca';
			$data['status_disposisi'] = 'Belum Disposisi';
		}
		$status['tgl_teruskan'] = date('y-m-d');
		$status['status'] = 'Dibaca';
		$this->UserModels->insert('t_suratkeluar',$data);
		$this->UserModels->editRecord('no_agenda',$no_agenda,'t_surat',$status);
		$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Surat Berhasil Didisposisi!!!</div>');
		redirect(base_url().'tatausaha/suratmasuk');
	}

	public function lihatdisposisi($id){
		$tahun = date('y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		if ($user['rank']=="Admin Bupati") {
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a JOIN t_suratkeluar b ON a.jabatan=b.dari LIMIT 1')->row();
		} else if ($user['rank']=="Admin Wabup") {
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a JOIN t_suratkeluar b ON a.jabatan=b.dari LIMIT 1')->row();
		} else if ($user['rank']=="Admin Sekda") {
			$data['disposisi'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="Sekretaris Daerah" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a JOIN t_suratkeluar b ON a.jabatan=b.dari LIMIT 1')->row();
		} else if ($user['rank']=="Admin Ass 1") {
			$data['disposisi'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="Asisten Pemerintah dan Kesra" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a JOIN t_suratkeluar b ON a.jabatan=b.dari LIMIT 1')->row();
		} else if ($user['rank']=="Admin Ass 2") {
			$data['disposisi'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a JOIN t_suratkeluar b ON a.jabatan=b.dari LIMIT 1')->row();
		} else if ($user['rank']=="Admin Ass 3") {
			$data['disposisi'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="ASISTEN ADMINISTRASI UMUM" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a JOIN t_suratkeluar b ON a.jabatan=b.dari LIMIT 1')->row();
		} else {
			$data['disposisi'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="KABAG UMUM" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a JOIN t_suratkeluar b ON a.jabatan=b.dari LIMIT 1')->row();
		}
		$this->load->view('tatausaha/lihatdisposisisurat',$data);
	}

	public function suratlain($id){
		$tahun = date('y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		if ($user['rank']=="Admin Sekda") {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="Sekretaris Daerah" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=="Admin Ass 1") {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="Asisten Pemerintah dan Kesra" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=="Admin Ass 2") {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=="Admin Ass 3") {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="ASISTEN ADMINISTRASI UMUM" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
		} else {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="KABAG UMUM" AND a.status="Belum Dibaca" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
		}
		$this->load->view('tatausaha/disposisisuratlain',$data);
	}

	public function disposisilain($id){
		$tahun = date('y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		if ($user['rank']=="Admin Sekda") {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_surat a WHERE a.no_agenda="'.$id.'" AND a.tujuan="Sekretaris Daerah" AND a.status="BELUM DIBACA" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=="Admin Ass 1") {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_surat a WHERE a.no_agenda="'.$id.'" AND a.tujuan="Asisten Pemerintah dan Kesra" AND a.status="BELUM DIBACA" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=="Admin Ass 2") {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_surat a WHERE a.no_agenda="'.$id.'" AND a.tujuan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND a.status="BELUM DIBACA" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=="Admin Ass 3") {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_surat a WHERE a.no_agenda="'.$id.'" AND a.tujuan="ASISTEN ADMINISTRASI UMUM" AND a.status="BELUM DIBACA" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
		} else {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_surat a WHERE a.no_agenda="'.$id.'" AND a.tujuan="KABAG UMUM" AND a.status="BELUM DIBACA" AND a.tahun="'.$tahun.'"');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
		}
		$this->load->view('tatausaha/disposisisuratlainlagi',$data);
	}

	public function add_new_disposisi_lain(){
		$row = $_POST;
		$user = $this->session->userdata('logged_in');

		$no_agenda = $this->input->post('no_agenda');
		if ($user['rank']=="Admin Bupati") {
			$dari = "BUPATI ALOR";
		} else if ($user['rank']=="Admin Wabup") {
			$dari = "WAKIL BUPATI ALOR";
		} else if ($user['rank']=="Admin Sekda") {
			$dari = "Sekretaris Daerah";
		} else if ($user['rank']=="Admin Ass 1") {
			$dari = "Asisten Pemerintah dan Kesra";
		} else if ($user['rank']=="Admin Ass 2") {
			$dari = "ASISTEN PEREKONOMIAN DAN PEMBANGUNAN";
		} else if ($user['rank']=="Admin Ass 3") {
			$dari = "ASISTEN ADMINISTRASI UMUM";
		} else {
			$dari = "KABAG UMUM";
		}
		$teruskan = $this->input->post('teruskan');

		if ($row['perhatian_pil'] != '--') {
			$data['no_agenda'] = $no_agenda;
			$data['tgl_keluar'] = date('Y-m-d');
			$data['dari'] = $dari;
			$data['teruskan'] = $row['teruskan'];
			$data['perhatian'] = $row['perhatian_pil'];
			$data['sifat'] = $row['sifat'];
			$data['isi_disposisi'] = $row['catatan'];
			$data['tahun'] = date('y');
			$data['status'] = 'Belum Dibaca';
			$data['status_disposisi'] = 'Belum Disposisi';
		} else {
			$data['no_agenda'] = $no_agenda;
			$data['tgl_keluar'] = date('Y-M-D');
			$data['dari'] = $dari;
			$data['teruskan'] = $row['teruskan'];
			$data['perhatian'] = $row['perhatian_isi'];
			$data['sifat'] = $row['sifat'];
			$data['isi_disposisi'] = $row['catatan'];
			$data['tahun'] = date('y');
			$data['status'] = 'Belum Dibaca';
			$data['status_disposisi'] = 'Belum Disposisi';
		}
		$teruskan = $dari;
		$status['tgl_keluar'] = date('y-m-d');
		$status['status'] = 'Dibaca';
		$status['status_disposisi'] = 'Sudah Disposisi';
		$this->UserModels->insert('t_suratkeluar',$data);
		$this->UserModels->editRecordLain('teruskan',$teruskan,'no_agenda',$no_agenda,'t_suratkeluar',$status);
		$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Surat Berhasil Di Disposisi!!!</div>');
		redirect(base_url().'tatausaha/disposisimasuk');
	}

	public function cetak($id){
		$tahun = date('y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		if ($user['rank']=="Admin Bupati") {
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a where a.jabatan="BUPATI ALOR" LIMIT 1')->row();
		} else if ($user['rank']=="Admin Wabup") {
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a where a.jabatan="WAKIL BUPATI ALOR" LIMIT 1')->row();
		} else if ($user['rank']=="Admin Sekda") {
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a where a.jabatan="Sekretaris Daerah" LIMIT 1')->row();
		} else if ($user['rank']=="Admin Ass 1") {
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a where a.jabatan="Asisten Pemerintah dan Kesra" LIMIT 1')->row();
		} else if ($user['rank']=="Admin Ass 2") {
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a where a.jabatan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" LIMIT 1')->row();
		} else if ($user['rank']=="Admin Ass 3") {
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a where a.jabatan="ASISTEN ADMINISTRASI UMUM" LIMIT 1')->row();
		} else {
			$data['nama'] = $this->UserModels->query('SELECT * FROM t_struktur a where a.jabatan="KABAG UMUM" LIMIT 1')->row();
		}
		$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_surat where no_agenda="'.$id.'" limit 1')->row();
		$this->load->view('tatausaha/printdisposisi',$data);
	}
}