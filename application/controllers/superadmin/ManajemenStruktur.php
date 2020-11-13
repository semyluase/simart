<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenStruktur extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['user'] =  $this->SuperModels->listing("","",'t_struktur','id','ASC');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/manstruk',$data);
	}

	function add_new(){
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/tmbhStruktur',$data);
	}

	function add_new_successfully(){
		$row = $_POST;		

		$data = array(
		'nama' => $row['nama'],
		'nip' => $row['nip'],
		'jabatan' => $row['jabatan']
		);
	
		$this->SuperModels->insert('t_struktur',$data);

		$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Struktur Berhasil Ditambahkan!!!</div>');
		redirect(base_url().'superadmin/manajemenstruktur/add_new');
	}

	function edit($id){
		$data['user'] = $this->SuperModels->getRecordSingle('*','t_struktur','id',$id);
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/edtstuk',$data);
	}

	function edit_new_successfully(){
		$row = $_POST;

		$id = $this->input->post('id');
		
		$data['jabatan'] = $this->input->post('jabatan');
		
		$data = array(
			'nama' => $this->input->post('nama'),
			'nip' => $this->input->post('nip')
		);

		$this->SuperModels->editRecord('id',$id,'t_struktur',$data);

		$this->session->set_flashdata('edit_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Struktur Berhasil Diubah!!!</div>');
		redirect(base_url().'superadmin/manajemenstruktur');
	}
}