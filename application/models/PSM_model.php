<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PSM_model extends CI_Model
{
	public function get()
	{
		$this->db->from('pusat_sdm_medis');
		$this->db->order_by('nama_psm', 'asc');
		$query = $this->db->get();

		return $query;
	}

	public function get_id_by_name($nama_psm)
	{
		$this->db->select('id_psm');
		$this->db->from('pusat_sdm_medis');
		$this->db->where('nama_psm', $nama_psm);
		return $this->db->get()->row();
	}

	public function insert($data)
	{
		$this->db->insert('pusat_sdm_medis', $data);
	}

	public function delete($id_psm)
	{
		$this->db->where('id_psm', $id_psm);
		$this->db->delete('tenaga_medis');

		$this->db->where('id_psm', $id_psm);
		$this->db->delete('pusat_sdm_medis');
	}
}