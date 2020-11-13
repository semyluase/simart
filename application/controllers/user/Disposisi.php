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
		if ($user['rank']=='BUPATI ALOR') {
			$data['surat_masuk'] = $this->UserModels->query('SELECT no_agenda, no_surat, tgl_surat, tgl_terima, asal_surat, perihal FROM t_surat WHERE no_agenda="'.$id.'" AND tujuan="'.$user['rank'].'" AND tahun="'$tahun'"');
		} else {
			$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="'.$user['rank'].'" AND tahun="'$tahun'"');
		}
		$this->load->view('user/disposisisurat',$data);
	}

	public function surat($id){
		$tahun = date('y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		$data['surat_masuk'] = $this->UserModels->query('SELECT no_agenda, no_surat, tgl_surat, tgl_terima, asal_surat, perihal FROM t_surat WHERE no_agenda="'.$id.'" AND tujuan="'.$user['rank'].'" AND tahun="'$tahun'"');
		$this->load->view('user/disposisisurat',$data);
	}

	public function add_new_disposisi(){
		$row = $_POST;
		$user = $this->session->userdata('logged_in');

		$no_agenda = $this->input->post('no_agenda');
		$dari = $user['rank'];
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
			$data['status_print'] = 'Belum Print';
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
		}
		$status['tgl_teruskan'] = date('y-m-d');
		$status['status'] = 'Dibaca';
		$this->UserModels->insert('t_suratkeluar',$data);
		$this->UserModels->editRecord('no_agenda',$no_agenda,'t_surat',$status);
		$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Surat Berhasil Didisposisi!!!</div>');
		redirect(base_url().'user/suratmasuk');
	}

	public function lihatdisposisi($id){
		$tahun = date('y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		$data['disposisi'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="'.$user['rank'].'" AND a.status="Belum Dibaca" AND a.tahun="'$tahun'"');
		$data['nama'] = $this->UserModels->query('SELECT * FROM tb_login a JOIN t_suratkeluar b ON a.rank=b.dari LIMIT 1')->row();
		$this->load->view('user/lihatdisposisisurat',$data);
	}

	public function suratlain($id){
		$tahun = date('y');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		$data['surat_masuk'] = $this->UserModels->query('SELECT * FROM t_suratkeluar a JOIN t_surat b ON a.no_agenda=b.no_agenda WHERE a.no_agenda="'.$id.'" AND a.teruskan="'.$user['rank'].'" AND a.status="Belum Dibaca" a.tahun="'.$tahun.'"');
		$this->load->view('user/disposisisuratlain',$data);
	}

	public function add_new_disposisi_lain(){
		$row = $_POST;
		$user = $this->session->userdata('logged_in');

		$no_agenda = $this->input->post('no_agenda');
		$dari = $user['rank'];
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
		}
		$status['tgl_keluar'] = date('y-m-d');
		$status['status'] = 'Dibaca';
		$this->UserModels->insert('t_suratkeluar',$data);
		$this->UserModels->editRecord('no_agenda',$no_agenda,'t_suratkeluar',$status);
		$this->session->set_flashdata('add_error','<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Surat Berhasil Didisposisi!!!</div>');
		redirect(base_url().'user/suratmasuk');
	}
}