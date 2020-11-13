<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}

	function index($p=0){
		$recordperpage = 10;
		$mypaging['base_url'] = base_url().'superadmin/suratmasuk/index/';
		$mypaging['total_rows'] = $this->SuperModels->query("SELECT * FROM t_surat")->num_rows();
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
		$data['suratmasuk'] =  $this->SuperModels->listing($recordperpage,$p,'t_surat','no_agenda','ASC');
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/lhtsrtmasuk',$data);
	}

	function print(){
		$tgl_start = $this->input->post('tgl_start');
		$tgl_end = $this->input->post('tgl_end');

		$data['tgl_start'] = $tgl_start;
		$data['tgl_end'] = $tgl_end;
		$data['suratmasuk'] = $this->SuperModels->query("SELECT * FROM t_surat WHERE tgl_teruskan >= '".$tgl_start."' AND tgl_teruskan <= '".$tgl_end."' ORDER BY no_agenda ASC");
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$this->load->view('superadmin/ctksrtmasuk',$data);
	}
}