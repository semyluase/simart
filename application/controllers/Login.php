<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('login');
	}

	function do_login(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
			);

		$query = $this->LoginModels->getRecordWhere('*','tb_login','username',$data['username']);

		$row = $query->row();

		if ($query->num_rows()>0) {
			if ($data['password'] == $row->password) {
				$sess_array = array(
					'id' =>$row->id,
					'username' =>$row->username,
					'nip' => $row->nip,
					'name' =>$row->nama,
					'rank' =>$row->rank);
				$this->session->set_userdata('logged_in',$sess_array);
				if ($sess_array['rank'] == 'Super Admin' || $sess_array['rank'] == 'Asisten Super Admin') {
					redirect(base_url().'superadmin/dashboard');
				} elseif ($sess_array['rank'] == 'Admin') {
					redirect(base_url().'admin/dashboard');
				} elseif ($sess_array['rank'] == 'Admin Bupati' || $sess_array['rank'] == 'Admin Wabup' || $sess_array['rank'] == 'Admin Sekda' || $sess_array['rank'] == 'Admin Ass 1' || $sess_array['rank'] == 'Admin Ass 2' || $sess_array['rank'] == 'Admin Ass 3' || $sess_array['rank'] == 'Admin Kabag Umum') {
					redirect(base_url().'tatausaha/dashboard');
				} else {
					redirect(base_url().'user/dashboard');
				}
			} else {
				$this->session->set_flashdata('login_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error: </span> Password Salah!!!</div>');
				redirect(base_url().'login');
			}
			
		} else {
			$this->session->set_flashdata('login_error','<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Username Salah!!!</div>');
				redirect(base_url().'login');
		}
		
	}

	function logout(){
		$this->session->unset_userdata('logged_in');
		redirect(base_url().'login');
	}
}