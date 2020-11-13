<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}

	function index($p=0){
		$user = $this->session->userdata('logged_in');
		$recordperpage = 10;
		$mypaging['base_url'] = base_url().'user/suratmasuk/index/';
		if ($user['rank'] == 'BUPATI ALOR') {
			$mypaging['total_rows'] = $this->UserModels->query("SELECT * FROM t_surat")->num_rows();
		} else {
			$mypaging['total_rows'] = $this->UserModels->query("SELECT * FROM t_suratkeluar where teruskan='".$user['rank']."'")->num_rows();
		}
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
		$data['suratmasukbupati'] =  $this->UserModels->listing($recordperpage,$p,'t_surat','tgl_terima','ASC','status','Belum Dibaca');
		$user = $this->session->userdata['logged_in'];
		$data['suratmasukuser'] =  $this->UserModels->listingsurat($recordperpage,$p,'t_suratkeluar','tgl_keluar','ASC','status','Belum Dibaca','teruskan',$user['rank']);
		if ($user['rank']=='BUPATI ALOR' || $user['rank']=='WAKIL BUPATI ALOR') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="'.$user['rank'].'" AND status="Belum Dibaca"')->num_rows();
		} else {
			$data['total_surat'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="'.$user['rank'].'" AND status="Belum Dibaca"')->num_rows();
		}
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('user/srtmasuk',$data);
	}

	function detail($id){
		$user = $this->session->userdata('logged_in');
		$data['surat'] = $this->UserModels->getRecordSingle('*','t_surat','no_agenda',$id);
		if ($user['rank']=='BUPATI ALOR') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="'.$user['rank'].'" AND status="BELUM DIBACA"')->num_rows();
		} else {
			$data['total_surat'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="'.$user['rank'].'" AND status="BELUM DIBACA"')->num_rows();
		}
		$data['gambar'] = $this->UserModels->getRecordWhere('*','t_gambar','no_agenda',$id);
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('user/detailsuratbupati',$data);
	}

	function detailkeluar($id){
		$user = $this->session->userdata('logged_in');
		$data['surat'] = $this->UserModels->getRecordSingle('*','t_surat','no_agenda',$id);
		$data['disposisi'] = $this->UserModels->query('SELECT * from t_suratkeluar JOIN t_surat ON t_suratkeluar.no_agenda = t_surat.no_agenda WHERE t_suratkeluar.no_agenda="'.$id.'" AND t_suratkeluar.teruskan="'.$user['rank'].'" AND t_suratkeluar.status="Belum Dibaca"');
		$data['total_surat'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="'.$user['rank'].'" AND status="BELUM DIBACA"')->num_rows();
		$data['gambar'] = $this->UserModels->getRecordWhere('*','t_gambar','no_agenda',$id);
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('user/detailsuratlain',$data);
	}
}