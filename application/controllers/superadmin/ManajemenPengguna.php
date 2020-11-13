<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenPengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}

	function index($p=0){
		$recordperpage = 6;
		$mypaging['base_url'] = base_url().'superadmin/manajemenpengguna/index/';
		$mypaging['total_rows'] = $this->SuperModels->query('select * from tb_login')->num_rows();
		$mypaging['per_page'] = $recordperpage;
		$mypaging['uri_segment'] = 4;
		$mypaging['first_link'] = 'First';
        $mypaging['first_tag_open'] = '<li>';
        $mypaging['first_tag_close'] = '</li>';
        $mypaging['last_link'] = 'Last';
        $mypaging['last_tag_open'] = '<li>';
        $mypaging['last_tag_close'] = '</li>';
        $mypaging['full_tag_open'] = '<ul class="pagination">';
        $mypaging['full_tag_close'] = '</ul>';
        $mypaging['cur_tag_open'] = '<li class="active"><a href = "javascript: void(0)">';
        $mypaging['cur_tag_close'] = '</a></li>';
        $mypaging['num_tag_open'] = '<li>';
        $mypaging['num_tag_close'] = '</li>';
        $mypaging['prev_link'] = '&laquo;';
        $mypaging['prev_tag_open'] = '<li>';
        $mypaging['prev_tag_close'] = '</li>';
        $mypaging['next_link'] = '&raquo;';
        $mypaging['next_tag_open'] = '<li>';
        $mypaging['next_tag_close'] = '</li>';	

		$this->pagination->initialize($mypaging);
		$data['pagi'] = $this->pagination->create_links();
		$data['user'] =  $this->SuperModels->listing($recordperpage,$p,'tb_login','id','ASC');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/manuser',$data);
	}

	function add_new(){
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/tmbuser',$data);
	}

	function add_new_successfully(){
		$row = $_POST;		

		if ($row['level'] == 'Super Admin' || $row['level'] == 'Asisten Super Admin') {
			$data = array(
			'username' => $row['username'],
			'password' => md5($row['username']),
			'nama' => $row['nama'],
			'nip' => $row['nip'],
			'rank' => $row['level']
			);

			$user = $row['username'];
			$cari = $this->SuperModels->getRecordSingle('*','tb_login','username',$user);

			if ($cari->num_rows() > 0) {
				$this->session->set_flashdata('add_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Username : '.$row['username'].' Telah Terdaftar <br> Lihat Daftar Pengguna Untuk Memastikannya!!!</div>');
				redirect(base_url().'superadmin/manajemenpengguna/add_new');
			} else {
				$this->SuperModels->insert('tb_login',$data);

				$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Pengguna Berhasil Ditambahkan!!!</div>');
				redirect(base_url().'superadmin/manajemenpengguna/add_new');
			}
			
		} else {
			$data = array(
			'username' => $row['username'],
			'password' => md5($row['password']),
			'nama' => $row['nama'],
			'nip' => $row['nip'],
			'rank' => $row['level']
			);

			$user = $row['nip'];
			$cari = $this->SuperModels->getRecordSingle('*','tb_login','username',$user);

			if ($cari->num_rows() > 0) {
				$this->session->set_flashdata('add_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Username : '.$row['nip'].' Telah Terdaftar <br> Lihat Daftar Pengguna Untuk Memastikannya!!!</div>');
				redirect(base_url().'superadmin/manajemenpengguna/add_new');
			} else {
				$this->SuperModels->insert('tb_login',$data);

				$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Pengguna Berhasil Ditambahkan!!!</div>');
				redirect(base_url().'superadmin/manajemenpengguna/add_new');
			}
		}
	}

	function edit($id){
		$data['user'] = $this->SuperModels->getRecordSingle('*','tb_login','id',$id);
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/editusr',$data);
	}

	function edit_new_successfully(){
		$row = $_POST;

		$id = $this->input->post('id');
		$ambilpass = $this->SuperModels->getRecordWhere('password','tb_login','id',$id)->row();
		$password = $this->input->post('password');

		if ($password == null) {
			$data = array(
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'nip' => $this->input->post('nip'),
			'rank' => $this->input->post('level')
			);

			$this->SuperModels->editRecord('id',$id,'tb_login',$data);

			$this->session->set_flashdata('edit_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Pengguna Berhasil Diubah!!!</div>');
			redirect(base_url().'superadmin/manajemenpengguna');
		} else {
			$data = array(
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'nip' => $this->input->post('nip'),
			'rank' => $this->input->post('level'),
			'password' => md5($this->input->post('password'))
			);

			$this->SuperModels->editRecord('id',$id,'tb_login',$data);

			$this->session->set_flashdata('edit_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Pengguna Berhasil Diubah!!!</div>');
			redirect(base_url().'superadmin/manajemenpengguna');
		}
	}
}