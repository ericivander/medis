<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keahlian extends CI_Controller
{
	public function __construct ()
	{
		parent::__construct ();
		if (!$this->session->userdata('logged_in') && $this->session->userdata('privilege') != 'administrator')
		{
			redirect ('beranda');
		}
	}	
	
	public function index()
	{
		$this->load->model('keahlian_model');
		$data['keahlian'] = $this->keahlian_model->get();
		$this->load->view('keahlian', $data);
	}

	public function get_by_id($id)
	{
		$this->load->model('keahlian_model');
		$data = $this->keahlian_model->get_by_id($id);
		echo json_encode($data);

	}

	public function insert()
	{
		$this->load->model('keahlian_model');
		$nama = $this->input->post('nama');
		if($this->keahlian_model->get_id_by_name($nama) == null)
		{
			$data = array(
				'nama_keahlian' => $nama
			);
			$this->keahlian_model->insert($data);
			$this->session->set_flashdata('insert', 'success');
		}
		else
		{
			$this->session->set_flashdata('insert', 'failed');
		}
		redirect('keahlian');
	}

	public function update()
	{
		$this->load->model('keahlian_model');
		$id = $this->input->post('key');
		$nama = $this->input->post('nama');
		$this->keahlian_model->update($id, $nama);
		$this->session->set_flashdata('update', 'success');
		redirect('keahlian');
	}

	public function delete()
	{
		$id = $this->input->post('key');
		$this->load->model('keahlian_model');
		$this->keahlian_model->delete($id);
		$this->session->set_flashdata('delete', 'success');
		redirect('keahlian');
	}
}