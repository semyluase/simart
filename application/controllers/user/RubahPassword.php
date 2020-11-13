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
		if ($user['rank']=='BUPATI ALOR' || $user['rank']=='WAKIL BUPATI ALOR') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="'.$user['rank'].'" AND status="Belum Dibaca"')->num_rows();
		} else {
			$data['total_surat'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="'.$user['rank'].'" AND status="Belum Dibaca"')->num_rows();
		}
		$this->load->view('user/r_pass',$data);
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
				redirect(base_url().'user/rubahpassword');

			} else {
				$this->session->set_flashdata('change_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Password Gagal Diubah!!!<br>Password Baru & Konfirmasi Password Tidak Cocok!!!</div>');
				redirect(base_url().'user/rubahpassword');
			}
		} else {
			$this->session->set_flashdata('change_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Password Gagal Diubah!!!<br>Password Lama Anda Salah!!!</div>');
			redirect(base_url().'user/rubahpassword');
		}
	}
}