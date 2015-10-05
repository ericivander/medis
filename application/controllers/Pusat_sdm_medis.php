<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pusat_sdm_medis extends CI_Controller
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
		$this->load->model('psm_model');
		$data['pusat_sdm_medis'] = $this->psm_model->get();
		$this->load->view('pusat_sdm_medis', $data);
	}

	public function get_by_id($id)
	{
		$this->load->model('psm_model');
		$data = $this->psm_model->get_by_id($id);
		echo json_encode($data);

	}

	public function insert()
	{
		$this->load->model('psm_model');
		$nama = $this->input->post('nama');
		if($this->psm_model->get_id_by_name($nama) == null)
		{
			$data = array (
				'nama_psm' => $nama,
				'alamat_psm' => $this->input->post('alamat'),
				'jumlah_sdm' => $this->input->post('jumlah_sdm')
			);
			$this->psm_model->insert($data);
			$this->session->set_flashdata('insert', 'success');
		}
		else
		{
			$this->session->set_flashdata('insert', 'failed');
		}
		redirect('pusat_sdm_medis');
	}

	public function update()
	{
		$this->load->model('psm_model');
		$id = $this->input->post('key');
		$data = array(
			'nama_psm' => $this->input->post('nama'),
			'alamat_psm' => $this->input->post('alamat'),
			'jumlah_sdm' => $this->input->post('jumlah_sdm')
		);
		$this->psm_model->update($id, $data);
		$this->session->set_flashdata('update', 'success');
		redirect('pusat_sdm_medis');
	}

	public function delete()
	{
		$id = $this->input->post('key');
		$this->load->model('psm_model');
		$this->psm_model->delete($id);
		$this->session->set_flashdata('delete', 'success');
		redirect('pusat_sdm_medis');
	}
}