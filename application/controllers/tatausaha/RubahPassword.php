<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RubahPassword extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['logged_in'] = $this->session->userdata('logged_in');
		$user = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		if ($user['rank']=='Admin Bupati') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="BUPATI ALOR" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=='Admin Wabup') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="WAKIL BUPATI ALOR" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=='Admin Sekda') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=='Admin Ass 1') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=='Admin Ass 2') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=='Admin Ass 3') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
		} else {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
		}
		$this->load->view('tatausaha/r_pass',$data);
	}

	function change_successfully(){
		$id = $this->input->post('id');

		$pwlamaisi = md5($this->input->post('pwlama'));
		$pwasli = $this->UserModels->getRecordWhere('password','tb_login','id',$id)->row();
		$pwbaru = md5($this->input->post('pwbaru'));
		$confirmpw = md5($this->input->post('konfirmpw'));

		if ($pwlamaisi == $pwasli->password) {
			if ($pwbaru == $confirmpw) {
				$data['password'] = $pwbaru;

				$this->UserModels->editRecord('id',$id,'tb_login',$data);

				$this->session->set_flashdata('change_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Password Berhasil Diubah!!!</div>');
				redirect(base_url().'tatausaha/rubahpassword');

			} else {
				$this->session->set_flashdata('change_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Password Gagal Diubah!!!<br>Password Baru & Konfirmasi Password Tidak Cocok!!!</div>');
				redirect(base_url().'tatausaha/rubahpassword');
			}
		} else {
			$this->session->set_flashdata('change_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Password Gagal Diubah!!!<br>Password Lama Anda Salah!!!</div>');
			redirect(base_url().'tatausaha/rubahpassword');
		}
	}
}