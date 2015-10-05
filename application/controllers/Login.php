<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index ()
	{
		if ($this->session->has_userdata('logged_in'))
		{
			redirect ('beranda');
		}
		else
		{
			$this->load->view ('login');
		}
	}

	public function verify_login ()
	{
		$username = $this->input->post ('username');
		$password = $this->input->post ('password');

		$this->load->model ('akun_model');
		$privilege = $this->akun_model->login ($username, $password);
		
		if($privilege != 'failed')
   		{
   			$data = array(
     			'username' => $username,
     			'logged_in' => TRUE,
     			'privilege' => $privilege
     		);
     		$this->session->set_userdata($data);

     		redirect ('beranda');
   		}
   		else
   		{
   			$this->session->set_flashdata('login', 'gagal');
   			redirect ('login');
   		}
	}

	public function ganti_password ()
	{
		$this->load->model('akun_model');

		$password_baru = $this->input->post('password_baru');
		$ulangi_password_baru = $this->input->post('ulangi_password_baru');
		if ($password_baru != $ulangi_password_baru)
		{
			$this->session->set_flashdata('ganti_password', 'password_baru_gagal');
			redirect ($this->input->post ('url'));
		}

		$username = $this->session->userdata('username');
		$password_lama = $this->input->post ('password_lama');
		$result = $this->akun_model->login ($username, $password_lama);

		if($result == false)
		{
			$this->session->set_flashdata('ganti_password', 'password_lama_salah');
			redirect ($this->input->post ('url'));
		}
		else
		{
			$this->load->model('akun_model');
			$id_akun = $this->session->userdata('id_akun');
			$this->akun_model->ganti_password ($id_akun, $password_baru);
			$this->session->set_flashdata('ganti_password', 'sukses');
			redirect ($this->input->post ('url'));
		}
	}

	public function logout ()
	{
		$this->session->sess_destroy();
		redirect ('login');
	}
}
