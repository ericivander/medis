<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya_model extends CI_Model
{
	public function get()
	{
		$this->db->select('biaya.id_biaya, tenaga_medis.nama_tenaga_medis, kab_kota.nama_kota, biaya.biaya');
		$this->db->from('biaya, tenaga_medis, kab_kota');
		$this->db->where('biaya.id_tenaga_medis = tenaga_medis.id_tenaga_medis and biaya.id_kota = kab_kota.id_kota');
		$this->db->order_by('tenaga_medis.nama_tenaga_medis, kab_kota.nama_kota', 'asc');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_by_id($id)
	{
		$this->db->from('biaya');
		$this->db->where('id_biaya', $id);
		$data = $this->db->get();

		return $data->result();
	}

	public function get_id($id_tenaga_medis, $id_kota)
	{
		$this->db->select('id_biaya');
		$this->db->from('biaya');
		$this->db->where('id_tenaga_medis', $id_tenaga_medis);
		$this->db->where('id_kota', $id_kota);
		return $this->db->get()->row();
	}
	
	public function getValue($id_tenaga_medis, $id_kota)
	{
		$this->db->select('biaya');
		$this->db->from('biaya');
		$this->db->where('id_tenaga_medis', $id_tenaga_medis);
		$this->db->where('id_kota', $id_kota);
		$data = $this->db->get();
		return $data->row();
	}

	public function insert($data)
	{
		$this->db->insert('biaya', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_biaya', $id);
		$this->db->update('biaya', $data);
	}

	public function delete($id_biaya)
	{
		$this->db->where('id_biaya', $id_biaya);
		$this->db->delete('biaya');		
	}
}