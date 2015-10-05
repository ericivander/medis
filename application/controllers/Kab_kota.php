<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kab_kota extends CI_Controller
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
		$this->load->model('bencana_model');
		$data['bencana'] = $this->bencana_model->get_min();
		$this->load->model('kab_kota_model');
		$data['kab_kota'] = $this->kab_kota_model->get();
		$this->load->view('kab_kota', $data);
	}

	public function get_by_id($id)
	{
		$this->load->model('kab_kota_model');
		$data = $this->kab_kota_model->get_by_id($id);
		echo json_encode($data);
	}

	public function get_detil_by_id($id)
	{
		$this->load->model('kab_kota_model');
		$data = $this->kab_kota_model->get_detil_by_id($id);
		echo json_encode($data);
	}

	public function insert()
	{
		$this->load->model('kab_kota_model');
		$nama = $this->input->post('nama');
		if($this->kab_kota_model->get_id_by_name($nama) == null)
		{
			$kab_kota = array(
				'nama_kota' => $nama
			);
			$this->kab_kota_model->insert($kab_kota);
			
			$id_kota = $this->kab_kota_model->get_id_by_name($nama)->id_kota;
			$bencana_raw = $this->input->post('bencana');
			if(is_array($bencana_raw))
			{
				foreach($bencana_raw as $b)
				{
					$bencana = array(
						'id_kota' => $id_kota,
						'id_bencana' => $b
					);
					$this->kab_kota_model->insert_bencana($bencana);
				}
			}
			else
			{
				$bencana = array(
					'id_kota' => $id_kota,
					'id_bencana' => $bencana_raw
				);
				$this->kab_kota_model->insert_bencana($bencana);
			}
			$this->session->set_flashdata('insert', 'success');
		}
		else
		{
			$this->session->set_flashdata('insert', 'failed');
		}
		redirect('kab_kota');
	}

	public function update()
	{
		$this->load->model('kab_kota_model');
		$id = $this->input->post('key');
		$nama = $this->input->post('nama');
		$bencana_raw = $this->input->post('bencana');

		$kab_kota = array(
			'nama_kota' => $nama
		);
		$this->kab_kota_model->update($id, $kab_kota);

		if(is_array($bencana_raw))
		{
			foreach($bencana_raw as $b)
			{
				$bencana = array(
					'id_kota' => $id,
					'id_bencana' => $b
				);
				$this->kab_kota_model->insert_bencana($bencana);
			}
		}
		else
		{
			$bencana = array(
				'id_kota' => $id,
				'id_bencana' => $bencana_raw
			);
			$this->kab_kota_model->insert_bencana($bencana);
		}

		$this->session->set_flashdata('update', 'success');
		redirect('kab_kota');
	}

	public function delete()
	{
		$id = $this->input->post('key');
		$this->load->model('kab_kota_model');
		
		$this->kab_kota_model->delete($id);
		
		$this->session->set_flashdata('delete', 'success');
		redirect('kab_kota');
	}
}