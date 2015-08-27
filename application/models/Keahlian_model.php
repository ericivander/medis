<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keahlian_model extends CI_Model
{
	public function get()
	{
		$this->db->select('keahlian.id_keahlian, keahlian.nama_keahlian');
		$this->db->from('keahlian');
		$this->db->order_by('keahlian.nama_keahlian', 'asc');
		$query = $this->db->get();

		return $query;
	}

	public function get_id_by_name($nama_keahlian)
	{
		$this->db->select('id_keahlian');
		$this->db->from('keahlian');
		$this->db->where('nama_keahlian', $nama_keahlian);
		return $this->db->get()->row();
	}

	public function insert($nama_keahlian)
	{
		$data = array(
			'nama_keahlian' => $nama_keahlian
		);
		$this->db->insert('keahlian', $data);
	}

	public function delete($id_keahlian)
	{
		$this->db->where('id_keahlian', $id_keahlian);
		$this->db->delete('memerlukan');
		
		$this->db->where('id_keahlian', $id_keahlian);
		$this->db->delete('memiliki');
		
		$this->db->where('id_keahlian', $id_keahlian);
		$this->db->delete('keahlian');		
	}
}