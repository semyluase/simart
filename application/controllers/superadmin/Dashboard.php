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
		$this->load->view('superadmin/dashboard',$data);
	}
}