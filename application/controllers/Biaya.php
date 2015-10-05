<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya extends CI_Controller
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
		$this->load->model('biaya_model');
		$data['biaya'] = $this->biaya_model->get();
		$this->load->model('tenaga_medis_model');
		$data['tenaga_medis'] = $this->tenaga_medis_model->get_min();
		$this->load->model('kab_kota_model');
		$data['kab_kota'] = $this->kab_kota_model->get_min();
		$this->load->view('biaya', $data);
	}

	public function get_by_id($id)
	{
		$this->load->model('biaya_model');
		$data = $this->biaya_model->get_by_id($id);
		echo json_encode($data);
	}

	public function insert()
	{
		$this->load->model('biaya_model');
		$id_tenaga_medis = $this->input->post('id_tenaga_medis');
		$id_kota = $this->input->post('id_kota');
		if($this->biaya_model->get_id($id_tenaga_medis, $id_kota) == null)
		{
			$data = array(
				'id_tenaga_medis' => $id_tenaga_medis,
				'id_kota' => $id_kota,
				'biaya' => $this->input->post('biaya')
			);
			$this->biaya_model->insert($data);
			$this->session->set_flashdata('insert', 'success');
		}
		else
		{
			$this->session->set_flashdata('insert', 'failed');
		}		
		redirect('biaya');
	}

	public function update()
	{
		$this->load->model('biaya_model');
		$id = $this->input->post('key');
		$biaya = array(
			'id_tenaga_medis' => $this->input->post('id_tenaga_medis'),
			'id_kota' => $this->input->post('id_kota'),
			'biaya' => $this->input->post('biaya')
		);
		$this->biaya_model->update($id, $biaya);
		$this->session->set_flashdata('update', 'success');
		redirect('biaya');
	}

	public function delete()
	{
		$id = $this->input->post('key');
		$this->load->model('biaya_model');
		$this->biaya_model->delete($id);
		$this->session->set_flashdata('delete', 'success');
		redirect('biaya');
	}
}