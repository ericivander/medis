<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kab_kota_model extends CI_Model
{
	public function get()
	{
		$this->db->select('kab_kota.id_kota, kab_kota.nama_kota, bencana.nama_bencana');
		$this->db->from('kab_kota, bencana, rawan_akan');
		$this->db->where('kab_kota.id_kota = rawan_akan.id_kota and bencana.id_bencana = rawan_akan.id_bencana');
		$this->db->order_by('kab_kota.nama_kota, bencana.nama_bencana', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function get_by_id($id)
	{
		$this->db->from('kab_kota');
		$this->db->where('id_kota', $id);
		$data = $this->db->get();

		return $data->result();
	}

	public function get_detil_by_id($id)
	{
		$this->db->select('rawan_akan.id_bencana');
		$this->db->from('rawan_akan');
		$this->db->where('rawan_akan.id_kota', $id);
		$data = $this->db->get();

		return $data->result();
	}

	public function getById($id)
	{
		$this->db->select('kab_kota.nama_kota');
		$this->db->from('kab_kota');
		$this->db->where('kab_kota.id_kota', $id);
		$query = $this->db->get()->row();
		return $query;
	}

	public function get_min()
	{
		$query = $this->db->get('kab_kota');
		return $query;
	}

	public function get_id_by_name($nama_kota)
	{
		$this->db->select('id_kota');
		$this->db->from('kab_kota');
		$this->db->where('nama_kota', $nama_kota);
		return $this->db->get()->row();
	}
	
	public function getAllID()
	{
		$this->db->select('id_kota as id');
		$this->db->from('kab_kota');
		$data = $this->db->get();

		return $data->result();
	}
	
	public function getXCon()
	{
		$this->db->select('id_kota as id_k, id_bencana as id_b');
		$this->db->from('rawan_akan');
		
		$data = $this->db->get();
		return $data->result();
	}
	
	public function getNama($id)
	{
		$this->db->select('nama_kota as nama');
		$this->db->from('kab_kota');
		$this->db->where('id_kota', $id);
		
		$data = $this->db->get();
		return $data->row();
	}

	public function insert($data)
	{
		$this->db->insert('kab_kota', $data);
	}

	public function insert_bencana($data)
	{
		$this->db->insert('rawan_akan', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_kota', $id);
		$this->db->update('kab_kota', $data);

		$this->db->where('id_kota', $id);
		$this->db->delete('rawan_akan');	
	}

	public function delete($id)
	{
		$this->db->where('id_kota', $id);
		$this->db->delete('biaya');
		
		$this->db->where('id_kota', $id);
		$this->db->delete('rawan_akan');
		
		$this->db->where('id_kota', $id);
		$this->db->delete('kab_kota');
	}
}