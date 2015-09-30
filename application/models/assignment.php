<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment extends CI_Model
{
	public function get()
	{
		$this->db->select('tenaga_medis.id_tenaga_medis as id_t, kab_kota.id_kota as id_k, assignment.assignment as value');
		$this->db->from('assignment, tenaga_medis, kab_kota');
		$this->db->where('tenaga_medis.id_tenaga_medis = assignment.id_tenaga_medis and kab_kota.id_kota = assignment.id_kota');
		$data = $this->db->get();

		return $data->result();
	}

	public function insert($id_tenaga_medis, $id_kota, $assignment)
	{
		$data = array(
			'id_tenaga_medis' => $id_tenaga_medis,
			'id_kota' => $id_kota,
			'assignment' => $assignment
		);
		$this->db->insert('assignment', $data);
	}

	public function delete()
	{
		$this->db->where('assignment is not null');
		$this->db->delete('assignment');
	}
}