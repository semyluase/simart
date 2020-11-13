<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstansiPengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/instkantor',$data);
	}

	function edit_successfully(){
		$id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
		$data['alamat'] = $this->input->post('alamat');
		$data['kepala'] = $this->input->post('pimpinan');
		$data['nip_kepala'] = $this->input->post('nip');
		$data['notlpn'] = $this->input->post('notlpn');
		$data['kab'] = $this->input->post('kelkab');

		$config['upload_path'] 		= './asset/img/';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '5000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('logo')) {
			$up_data = $this->upload->data();
			$data['logo'] = $up_data['file_name'];

			$this->SuperModels->editRecord('id',$id,'tr_instansi',$data);

			$this->session->set_flashdata('edit_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Data Instansi Berhasil Diubah!!!</div>');
			redirect(base_url().'superadmin/instansipengguna');

		} else {
			$this->SuperModels->editRecord('id',$id,'tr_instansi',$data);

			$this->session->set_flashdata('edit_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Data Instansi Berhasil Diubah!!!</div>');
			redirect(base_url().'superadmin/instansipengguna');
		}
		
	}
}