<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}

	function index($p=0){
		$recordperpage = 10;
		$mypaging['base_url'] = base_url().'admin/disposisi/index/';
		$mypaging['total_rows'] = $this->AdminModels->query("SELECT * FROM t_suratkeluar")->num_rows();
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
		$tahun = date('y');
		$data['suratkeluar'] =  $this->AdminModels->listingsuratkeluar($recordperpage,$p,'t_suratkeluar','tgl_keluar','ASC','tahun',$tahun,'status_disposisi','Belum Disposisi');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('admin/disposisi',$data);
	}

	public function add_new($id){
		$data['logged_in'] = $this->session->userdata('logged_in');
		$tahun = date('y');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$data['surat'] = $this->AdminModels->getRecordWhere('*','t_surat','no_agenda',$id);
		$data['gambar'] = $this->AdminModels->query('SELECT * FROM t_gambar WHERE no_agenda="'.$id.'"');
		$data['surat_masuk'] = $this->UserModels->query('SELECT no_agenda, no_surat, tgl_surat, tgl_terima, asal_surat, perihal FROM t_surat WHERE no_agenda="'.$id.'" AND tahun="'.$tahun.'"');
		$this->load->view('admin/tmbhdisposisi',$data);
	}

	public function add_new_disposisi(){
		$row = $_POST;
		$user = $this->session->userdata('logged_in');

		$no_agenda = $this->input->post('no_agenda');
		$dari = $this->input->post('dari');
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
			$data['status'] = 'Belum Print';
			$data['status_disposisi'] = 'Belum Disposisi';
		}
		$status['tgl_teruskan'] = date('y-m-d');
		$status['status'] = 'Dibaca';
		$status['status_dis'] = 'Sudah Disposisi';
		$this->AdminModels->insert('t_suratkeluar',$data);
		$this->AdminModels->editRecord('no_agenda',$no_agenda,'t_surat',$status);
		$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Surat Berhasil Didisposisi!!!</div>');
		redirect(base_url().'admin/srtmasuk');
	}

	public function add_disposisi_lain(){
		$tahun = date('y');
		$id = $this->input->post('id');
		$no_agenda = $this->input->post('no_agenda');
		$dari = $this->input->post('dari');
		$teruskan = $this->input->post('teruskan');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->AdminModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$data['surat_masuk'] = $this->AdminModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$no_agenda.'" AND a.dari="'.$dari.'"');
		$this->load->view('admin/disposisisuratlain',$data);
	}

	public function add_new_disposisi_lain(){
		$row = $_POST;
		$user = $this->session->userdata('logged_in');

		$no_agenda = $this->input->post('no_agenda');
		$dari = $this->input->post('dari');
		$teruskan = $this->input->post('teruskan');
		$disdari = $this->input->post('disdari');
		$disuntuk = $this->input->post('disuntuk');

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
		$status['tgl_keluar'] = date('y-m-d');
		$status['status'] = 'Dibaca';
		$status['status_disposisi'] = 'Sudah Disposisi';
		$this->AdminModels->insert('t_suratkeluar',$data);
		$this->AdminModels->editRecordDisposisi('no_agenda',$no_agenda,'dari',$disdari,'teruskan',$disuntuk,'t_suratkeluar',$status);
		$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Surat Berhasil Didisposisi!!!</div>');
		redirect(base_url().'admin/disposisi');
	}
}