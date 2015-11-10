<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga_medis_model extends CI_Model
{
	public function get()
	{
		$this->db->select('tenaga_medis.id_tenaga_medis, tenaga_medis.nama_tenaga_medis, keahlian.nama_keahlian');
		$this->db->from('tenaga_medis, memiliki, keahlian');
		$this->db->where('tenaga_medis.id_tenaga_medis = memiliki.id_tenaga_medis and keahlian.id_keahlian = memiliki.id_keahlian');
		$this->db->order_by('tenaga_medis.nama_tenaga_medis, keahlian.nama_keahlian', 'asc');
		$query = $this->db->get();

		return $query;
	}

	public function get_by_id($id)
	{
		$this->db->from('tenaga_medis');
		$this->db->where('id_tenaga_medis', $id);
		$data = $this->db->get();

		return $data->result();
	}

	public function get_detil_by_id($id)
	{
		$this->db->select('memiliki.id_keahlian');
		$this->db->from('memiliki');
		$this->db->where('memiliki.id_tenaga_medis', $id);
		$data = $this->db->get();

		return $data->result();
	}

	public function get_min()
	{
		$query = $this->db->get('tenaga_medis');
		return $query;
	}

	public function get_id_by_name($nama)
	{
		$this->db->select('id_tenaga_medis');
		$this->db->from('tenaga_medis');
		$this->db->where('nama_tenaga_medis', $nama);
		return $this->db->get()->row();
	}
	
	public function getAllID()
	{
		$this->db->select('id_tenaga_medis as id');
		$this->db->from('tenaga_medis');
		$data = $this->db->get();

		return $data->result();
	}
	
	public function getXJob()
	{
		$this->db->select('tenaga_medis.id_tenaga_medis as id_d, keahlian.id_keahlian as id_k');
		$this->db->from('tenaga_medis, memiliki, keahlian');
		$this->db->where('tenaga_medis.id_tenaga_medis = memiliki.id_tenaga_medis and keahlian.id_keahlian = memiliki.id_keahlian');
		$data = $this->db->get();

		return $data->result();
	}
	
	public function getNama($id)
	{
		$this->db->select('nama_tenaga_medis as nama');
		$this->db->from('tenaga_medis');
		$this->db->where('id_tenaga_medis', $id);
		
		$data = $this->db->get();
		return $data->row();
	}
	
	public function getIDandName()
	{
		$this->db->select('id_tenaga_medis as id, nama_tenaga_medis as nama');
		$this->db->from('tenaga_medis');
		$data = $this->db->get();

		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('tenaga_medis', $data);
	}

	public function insert_keahlian($data)
	{
		$this->db->insert('memiliki', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_tenaga_medis', $id);
		$this->db->update('tenaga_medis', $data);

		$this->db->where('id_tenaga_medis', $id);
		$this->db->delete('memiliki');	
	}

	public function delete($id_tenaga_medis)
	{
		$this->db->where('id_tenaga_medis', $id_tenaga_medis);
		$this->db->delete('memiliki');
		
		$this->db->where('id_tenaga_medis', $id_tenaga_medis);
		$this->db->delete('biaya');
		
		$this->db->where('id_tenaga_medis', $id_tenaga_medis);
		$this->db->delete('tenaga_medis');
	}
}