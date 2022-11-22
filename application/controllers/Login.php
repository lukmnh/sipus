<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_login');
	}
	public function index()
	{
		$this->load->view('V_login');
	}

	public function auth()
	{
		$user = $this->input->post('nomor_induk');
		$pass = $this->input->post('password');
		$this->M_login->auth($user, $pass);
	}

	public function logout()
	{
		$this->session->unset_userdata('nomor_induk');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible">
                Anda Telah Logout!
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>');
		redirect('Login');
	}
}
