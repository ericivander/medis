<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bencana extends CI_Controller
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
		$data['bencana'] = $this->bencana_model->get();
		$this->load->model('keahlian_model');
		$data['keahlian'] = $this->keahlian_model->get();
		$this->load->view('bencana', $data);
	}

	public function get_by_id($id)
	{
		$this->load->model('bencana_model');
		$data = $this->bencana_model->get_by_id($id);
		echo json_encode($data);
	}

	public function get_detil_by_id($id)
	{
		$this->load->model('bencana_model');
		$data = $this->bencana_model->get_detil_by_id($id);
		echo json_encode($data);
	}

	public function insert()
	{
		$this->load->model('bencana_model');
		$nama = $this->input->post('nama');
		if($this->bencana_model->get_id_by_name($nama) == null)
		{
			$bencana = array(
				'nama_bencana' => $nama
			);
			$this->bencana_model->insert($bencana);

			$id = $this->bencana_model->get_id_by_name($nama)->id_bencana;
			$keahlian_raw = $this->input->post('keahlian');
			if(is_array($keahlian_raw))
			{
				foreach($keahlian_raw as $k)
				{
					$keahlian = array(
						'id_bencana' => $id,
						'id_keahlian' => $k
					);
					$this->bencana_model->insert_keahlian($keahlian);
				}
			}
			else
			{
				$keahlian = array(
					'id_bencana' => $id,
					'id_keahlian' => $keahlian_raw
				);
				$this->bencana_model->insert_keahlian($keahlian);
			}
			$this->session->set_flashdata('insert', 'success');
		}
		else
		{
			$this->session->set_flashdata('insert', 'failed');
		}
		redirect('bencana');
	}

	public function update()
	{
		$this->load->model('bencana_model');
		$id = $this->input->post('key');
		$nama = $this->input->post('nama');
		$keahlian_raw = $this->input->post('keahlian');

		$bencana = array(
			'nama_bencana' => $nama
		);
		$this->bencana_model->update($id, $bencana);

		if(is_array($keahlian_raw))
		{
			foreach($keahlian_raw as $k)
			{
				$keahlian = array(
					'id_bencana' => $id,
					'id_keahlian' => $k
				);
				$this->bencana_model->insert_keahlian($keahlian);
			}
		}
		else
		{
			$keahlian = array(
				'id_bencana' => $id,
				'id_keahlian' => $keahlian_raw
			);
			$this->bencana_model->insert_keahlian($keahlian);
		}

		$this->session->set_flashdata('update', 'success');
		redirect('bencana');
	}

	public function delete()
	{
		$id = $this->input->post('key');
		$this->load->model('bencana_model');
		$this->bencana_model->delete($id);
		$this->session->set_flashdata('delete', 'success');
		redirect('bencana');
	}
}