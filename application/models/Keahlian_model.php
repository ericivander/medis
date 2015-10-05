<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keahlian_model extends CI_Model
{
	public function get()
	{
		$this->db->select('id_keahlian, nama_keahlian');
		$this->db->from('keahlian');
		$this->db->order_by('nama_keahlian', 'asc');
		$data = $this->db->get();

		return $data;
	}

	public function get_by_id($id_keahlian)
	{
		$this->db->from('keahlian');
		$this->db->where('id_keahlian', $id_keahlian);
		$data = $this->db->get();

		return $data->result();
	}

	public function get_id_by_name($nama_keahlian)
	{
		$this->db->select('id_keahlian');
		$this->db->from('keahlian');
		$this->db->where('nama_keahlian', $nama_keahlian);
		return $this->db->get()->row();
	}
	
	public function getAllID()
	{
		$this->db->select('id_keahlian as id');
		$this->db->from('keahlian');
		$data = $this->db->get();

		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('keahlian', $data);
	}

	public function update($id_keahlian, $nama_keahlian)
	{
		$data = array(
			'nama_keahlian' => $nama_keahlian
		);
		$this->db->where('id_keahlian', $id_keahlian);
		$this->db->update('keahlian', $data);
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