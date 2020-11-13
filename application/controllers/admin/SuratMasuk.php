<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}

	function index($p=0){
		$recordperpage = 10;
		$mypaging['base_url'] = base_url().'admin/suratmasuk/index/';
		$mypaging['total_rows'] = $this->AdminModels->query("SELECT * FROM t_surat")->num_rows();
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
		$data['suratmasuk'] =  $this->AdminModels->query('SELECT * FROM t_surat');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('admin/srtmasuk',$data);
	}

	function add_new(){
		$tahun = date('Y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$data['no_agenda'] = $this->AdminModels->query('SELECT * FROM t_agenda where tahun="'.$tahun.'" limit 1')->row();
		if ($data['no_agenda']==null) {
			$agenda['tahun'] = date('Y');
			$agenda['no_agenda'] = 0;
			$this->AdminModels->insert('t_agenda',$agenda);
			$data['no_agenda'] = $this->AdminModels->query('SELECT * FROM t_agenda where tahun="'.$tahun.'" limit 1')->row();
			$this->load->view('admin/tmbhsuratmasuk',$data);
		} else {
			$this->load->view('admin/tmbhsuratmasuk',$data);
		}
	}

	function add_new_successfully(){
		$files = $_FILES['filesurat'];
		$dir = './suratmasuk/';
		$number_of_files = sizeof($_FILES['filesurat']['tmp_name']);

		$no_agenda = $this->input->post('no_agenda');
		$row = $_POST;

		$data['no_agenda'] = $no_agenda;
		$data['no_surat'] = $row['nosurat'];
		$data['tgl_surat'] = $row['tgl_surat'];
		$data['tgl_terima'] = date('y-m-d');
		$data['tujuan'] = $row['tjn_surat'];
		$data['asal_surat'] = $row['asalsurat'];
		$data['perihal'] = $row['perihalsurat'];
		$data['isi_ringkas'] = $row['isisurat'];
		$data['tahun'] = date('y');
		$data['status'] = 'BELUM DIBACA';
		$data['status_dis'] = 'BELUM DIDISPOSISI';
		$tahun = date('Y');
		$agenda['no_agenda'] = $no_agenda;

		$this->AdminModels->insert('t_surat',$data);
		$this->AdminModels->editRecord('tahun',$tahun,'t_agenda',$agenda);

		$config['upload_path'] = $dir;
		$config['allowed_types'] = 'gif|png|jpg|jpeg|doc|docx|pdf|xls|xlsx';
		$this->load->library('upload',$config);

		for ($i=0; $i < $number_of_files; $i++) { 
			$_FILES['filesurat']['name'] = $files['name'][$i];
			$_FILES['filesurat']['type'] = $files['type'][$i];
			$_FILES['filesurat']['tmp_name'] = $files['tmp_name'][$i];
			$_FILES['filesurat']['error'] = $files['error'][$i];
			$_FILES['filesurat']['size'] = $files['size'][$i];
			$this->upload->initialize($config);
			if ($this->upload->do_upload('filesurat')) {
				$pic['no_agenda'] = $no_agenda;
				$pic['file'] = $files['name'][$i];
				$this->AdminModels->insert('t_gambar',$pic);
			}
		}

		$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Surat Berhasil Ditambahkan!!!</div>');
		redirect(base_url().'admin/suratmasuk');
	}
	
	public function edit($id){
		$tahun = date('Y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$data['surat_masuk'] = $this->AdminModels->getRecordSingle('*','t_surat','id',$id);
		$this->load->view('admin/editsuratmasuk',$data);
	}
	
	function edit_new_successfully(){
		$no_agenda = $this->input->post('no_agenda');
		$id = $this->input->post('id');
		$row = $_POST;

		$data['no_agenda'] = $no_agenda;
		$data['no_surat'] = $row['nosurat'];
		$data['tgl_surat'] = $row['tgl_surat'];
		$data['tgl_terima'] = date('y-m-d');
		$data['tujuan'] = $row['tjn_surat'];
		$data['asal_surat'] = $row['asalsurat'];
		$data['perihal'] = $row['perihalsurat'];
		$data['isi_ringkas'] = $row['isisurat'];
		$data['tahun'] = date('y');
		$data['status'] = 'BELUM DIBACA';
		$data['status_dis'] = 'BELUM DIDISPOSISI';
		$tahun = date('y');

		$this->AdminModels->editRecordSurat('tahun',$tahun,'no_agenda',$no_agenda,'id',$id,'t_surat',$data);
		
		$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Surat Berhasil Diubah!!!</div>');
		redirect(base_url().'admin/suratmasuk');
	}
}