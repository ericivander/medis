<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga_medis extends CI_Controller
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
		$this->load->model('tenaga_medis_model');
		$data['tenaga_medis'] = $this->tenaga_medis_model->get();
		$this->load->model('keahlian_model');
		$data['keahlian'] = $this->keahlian_model->get();
		$this->load->view('tenaga_medis', $data);
	}

	public function get_by_id($id)
	{
		$this->load->model('tenaga_medis_model');
		$data = $this->tenaga_medis_model->get_by_id($id);
		echo json_encode($data);
	}

	public function get_detil_by_id($id)
	{
		$this->load->model('tenaga_medis_model');
		$data = $this->tenaga_medis_model->get_detil_by_id($id);
		echo json_encode($data);
	}

	public function insert()
	{
		$this->load->model('tenaga_medis_model');
		$nama = $this->input->post('nama');
		if($this->tenaga_medis_model->get_id_by_name($nama) == null)
		{
			$tenaga_medis = array(
				'nama_tenaga_medis' => $nama
			);
			$this->tenaga_medis_model->insert($tenaga_medis);

			$id = $this->tenaga_medis_model->get_id_by_name($nama)->id_tenaga_medis;
			$keahlian_raw = $this->input->post('keahlian');
			if(is_array($keahlian_raw))
			{
				foreach($keahlian_raw as $k)
				{
					$keahlian = array(
						'id_tenaga_medis' => $id,
						'id_keahlian' => $k
					);
					$this->db->insert('memiliki', $keahlian);
				}
			}
			else
			{
				$keahlian = array(
					'id_tenaga_medis' => $id,
					'id_keahlian' => $keahlian_raw
				);
				$this->db->insert('memiliki', $keahlian);
			}
			$this->session->set_flashdata('insert', 'success');
		}
		else
		{
			$this->session->set_flashdata('insert', 'failed');
		}
		redirect('tenaga_medis');
	}

	public function update()
	{
		$this->load->model('tenaga_medis_model');
		$id = $this->input->post('key');
		$nama = $this->input->post('nama');
		$keahlian_raw = $this->input->post('keahlian');

		$tenaga_medis = array(
			'nama_tenaga_medis' => $nama
		);
		$this->tenaga_medis_model->update($id, $tenaga_medis);

		if(is_array($keahlian_raw))
		{
			foreach($keahlian_raw as $k)
			{
				$keahlian = array(
					'id_tenaga_medis' => $id,
					'id_keahlian' => $k
				);
				$this->db->insert('memiliki', $keahlian);
			}
		}
		else
		{
			$keahlian = array(
				'id_tenaga_medis' => $id,
				'id_keahlian' => $keahlian_raw
			);
			$this->db->insert('memiliki', $keahlian);
		}

		$this->session->set_flashdata('update', 'success');
		redirect('tenaga_medis');
	}

	public function delete()
	{
		$id = $this->input->post('key');
		$this->load->model('tenaga_medis_model');
		$this->tenaga_medis_model->delete($id);
		$this->session->set_flashdata('delete', 'success');
		redirect('tenaga_medis');
	}
}