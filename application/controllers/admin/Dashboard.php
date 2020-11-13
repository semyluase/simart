<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$data['logged_in'] = $this->session->userdata('logged_in');
		$data['kantor'] = $this->SuperModels->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		$user = $this->session->userdata('logged_in');
		$data['total_surat'] = $this->UserModels->query('select * from t_surat where tujuan="'.$user['rank'].'" AND status="BELUM DIBACA"')->num_rows();
		$this->load->view('admin/dashboard',$data);
	}
}