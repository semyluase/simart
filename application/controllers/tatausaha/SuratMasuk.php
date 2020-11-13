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
		$mypaging['base_url'] = base_url().'tatausaha/suratmasuk/index/';
		if ($user['rank'] == 'Admin Bupati') {
			$mypaging['total_rows'] = $this->TataUsahaModels->query("SELECT * FROM t_surat where tujuan='BUPATI ALOR'")->num_rows();
		} else if($user['rank']=='Admin Wabup') {
			$mypaging['total_rows'] = $this->TataUsahaModels->query("SELECT * FROM t_surat where tujuan='WAKIL BUPATI ALOR'")->num_rows();
		} else if($user['rank']=='Admin Sekda') {
			$mypaging['total_rows'] = $this->TataUsahaModels->query("SELECT * FROM t_surat where tujuan='Sekretaris Daerah'")->num_rows();
		} else if($user['rank']=='Admin Ass 1') {
			$mypaging['total_rows'] = $this->TataUsahaModels->query("SELECT * FROM t_surat where tujuan='Asisten Pemerintah dan Kesra'")->num_rows();
		} else if($user['rank']=='Admin Ass 2') {
			$mypaging['total_rows'] = $this->TataUsahaModels->query("SELECT * FROM t_surat where tujuan='ASISTEN PEREKONOMIAN DAN PEMBANGUNAN'")->num_rows();
		} else if($user['rank']=='Admin Ass 3') {
			$mypaging['total_rows'] = $this->TataUsahaModels->query("SELECT * FROM t_surat where tujuan='ASISTEN ADMINISTRASI UMUM'")->num_rows();
		} else {
			$mypaging['total_rows'] = $this->TataUsahaModels->query("SELECT * FROM t_surat where tujuan='KABAG. UMUM'")->num_rows();
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
		$user = $this->session->userdata['logged_in'];
		if ($user['rank']=='Admin Bupati') {
			$data['suratmasukbupati'] =  $this->UserModels->listingsurat($recordperpage,$p,'t_surat','tgl_terima','ASC','status','Belum Dibaca','tujuan','BUPATI ALOR');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="BUPATI ALOR" AND status="Belum Dibaca"')->num_rows();
		} else if ($user['rank']=='Admin Wabup') {
			$data['suratmasukbupati'] =  $this->UserModels->listingsurat($recordperpage,$p,'t_surat','tgl_terima','ASC','status','Belum Dibaca','tujuan','WAKIL BUPATI ALOR');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="WAKIL BUPATI ALOR" AND status="Belum Dibaca"')->num_rows();
		} else if($user['rank']=='Admin Sekda') {
			$data['suratmasukuser'] =  $this->UserModels->listingsurat($recordperpage,$p,'t_surat','tgl_terima','ASC','status','Belum Dibaca','tujuan','Sekretaris Daerah');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
		} else if($user['rank']=='Admin Ass 1') {
			$data['suratmasukuser'] =  $this->UserModels->listingsurat($recordperpage,$p,'t_surat','tgl_terima','ASC','status','Belum Dibaca','tujuan','Asisten Pemerintah dan Kesra');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
		} else if($user['rank']=='Admin Ass 2') {
			$data['suratmasukuser'] =  $this->UserModels->listingsurat($recordperpage,$p,'t_surat','tgl_terima','ASC','status','Belum Dibaca','tujuan','ASISTEN PEREKONOMIAN DAN PEMBANGUNAN');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
		} else if($user['rank']=='Admin Ass 3') {
			$data['suratmasukuser'] =  $this->UserModels->listingsurat($recordperpage,$p,'t_surat','tgl_terima','ASC','status','Belum Dibaca','tujuan','ASISTEN ADMINISTRASI UMUM');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
		} else {
			$data['suratmasukuser'] =  $this->UserModels->listingsurat($recordperpage,$p,'t_surat','tgl_terima','ASC','status','Belum Dibaca','tujuan','KABAG UMUM');
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
		}
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('tatausaha/srtmasuk',$data);
	}

	function detail($id){
		$user = $this->session->userdata('logged_in');
		$data['surat'] = $this->UserModels->getRecordSingle('*','t_surat','no_agenda',$id);
		if ($user['rank']=='Admin Bupati') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="BUPATI ALOR" AND status="BELUM DIBACA"')->num_rows();
		} else {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="WAKIL BUPATI ALOR" AND status="BELUM DIBACA"')->num_rows();
		}
		$data['gambar'] = $this->UserModels->getRecordWhere('*','t_gambar','no_agenda',$id);
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('tatausaha/detailsuratbupati',$data);
	}

	function detailkeluar($id){
		$user = $this->session->userdata['logged_in'];
		if($user['rank']=='Admin Sekda') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Sekretaris Daerah" AND status="Belum Dibaca"')->num_rows();
		} else if($user['rank']=='Admin Ass 1') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="Asisten Pemerintah dan Kesra" AND status="Belum Dibaca"')->num_rows();
		} else if($user['rank']=='Admin Ass 2') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN" AND status="Belum Dibaca"')->num_rows();
		} else if($user['rank']=='Admin Ass 3') {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="ASISTEN ADMINISTRASI UMUM" AND status="Belum Dibaca"')->num_rows();
		} else {
			$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
			$data['total_disposisi'] = $this->UserModels->query('select * from t_suratkeluar where teruskan="KABAG UMUM" AND status="Belum Dibaca"')->num_rows();
		}
		$data['surat'] = $this->UserModels->getRecordSingle('*','t_surat','no_agenda',$id);
		$data['disposisi'] = $this->UserModels->query('SELECT * from t_suratkeluar JOIN t_surat ON t_suratkeluar.no_agenda = t_surat.no_agenda WHERE t_suratkeluar.no_agenda="'.$id.'" AND t_suratkeluar.teruskan="'.$user['rank'].'" AND t_suratkeluar.status="Belum Dibaca"');
		$data['gambar'] = $this->UserModels->getRecordWhere('*','t_gambar','no_agenda',$id);
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->UserModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('tatausaha/detailsuratbuatlain',$data);
	}
}