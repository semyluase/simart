<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RubahPassword extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$data['total_surat'] = $this->AdminModels->query('select * from t_suratkeluar where status_print="Belum Print"')->num_rows();
		$this->load->view('admin/r_pass',$data);
	}

	function change_successfully(){
		$id = $this->input->post('id');

		$pwlamaisi = md5($this->input->post('pwlama'));
		$pwasli = $this->AdminModels->getRecordWhere('password','tb_login','id',$id)->row();
		$pwbaru = md5($this->input->post('pwbaru'));
		$confirmpw = md5($this->input->post('konfirmpw'));

		if ($pwlamaisi == $pwasli->password) {
			if ($pwbaru == $confirmpw) {
				$data['password'] = $pwbaru;

				$this->AdminModels->editRecord('id',$id,'tb_login',$data);

				$this->session->set_flashdata('change_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Password Berhasil Diubah!!!</div>');
				redirect(base_url().'admin/rubahpassword');

			} else {
				$this->session->set_flashdata('change_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Password Gagal Diubah!!!<br>Password Baru & Konfirmasi Password Tidak Cocok!!!</div>');
				redirect(base_url().'admin/rubahpassword');
			}
		} else {
			$this->session->set_flashdata('change_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Password Gagal Diubah!!!<br>Password Lama Anda Salah!!!</div>');
			redirect(base_url().'admin/rubahpassword');
		}
	}
}