<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bencana_model extends CI_Model
{
	public function get()
	{
		$this->db->select('bencana.id_bencana, bencana.nama_bencana, keahlian.nama_keahlian');
		$this->db->from('bencana, memerlukan, keahlian');
		$this->db->where('bencana.id_bencana = memerlukan.id_bencana and keahlian.id_keahlian = memerlukan.id_keahlian');
		$this->db->order_by('bencana.nama_bencana, keahlian.nama_keahlian', 'asc');
		$query = $this->db->get();

		return $query;
	}

	public function get_by_id($id)
	{
		$this->db->from('bencana');
		$this->db->where('bencana.id_bencana', $id);
		$data = $this->db->get();

		return $data->result();
	}

	public function get_detil_by_id($id)
	{
		$this->db->select('memerlukan.id_keahlian');
		$this->db->from('memerlukan');
		$this->db->where('memerlukan.id_bencana', $id);
		$data = $this->db->get();

		return $data->result();
	}

	public function getMemerlukanById($id)
	{
		$this->db->select('memerlukan.id_keahlian');
		$this->db->from('memerlukan');
		$this->db->where('memerlukan.id_bencana', $id);
		$query = $this->db->get();
		return $query;
	}

	public function get_min()
	{
		$query = $this->db->get('bencana');
		return $query;
	}

	public function get_id_by_name($nama_bencana)
	{
		$this->db->select('id_bencana');
		$this->db->from('bencana');
		$this->db->where('nama_bencana', $nama_bencana);
		return $this->db->get()->row();
	}
	
	public function getAllID()
	{
		$this->db->select('id_bencana as id');
		$this->db->from('bencana');
		$data = $this->db->get();

		return $data->result();
	}
	
	public function getXJob()
	{
		$this->db->select('id_bencana as id_b, id_keahlian as id_k');
		$this->db->from('memerlukan');
		
		$data = $this->db->get();
		return $data->result();
	}

	public function insert($data)
	{
		$this->db->insert('bencana', $data);
	}

	public function insert_keahlian($data)
	{
		$this->db->insert('memerlukan', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_bencana', $id);
		$this->db->update('bencana', $data);

		$this->db->where('id_bencana', $id);
		$this->db->delete('memerlukan');	
	}

	public function delete($id)
	{
		$this->db->where('id_bencana', $id);
		$this->db->delete('memerlukan');
		
		$this->db->where('id_bencana', $id);
		$this->db->delete('rawan_akan');
		
		$this->db->where('id_bencana', $id);
		$this->db->delete('bencana');		
	}
}