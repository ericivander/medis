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

	public function getById($id)
	{
		$this->db->select('bencana.nama_bencana');
		$this->db->from('bencana');
		$this->db->where('bencana.id_bencana', $id);
		$query = $this->db->get()->row();
		return $query;
	}

	public function getMemerlukanById($id)
	{
		$this->db->select('memerlukan.id_keahlian');
		$this->db->from('memerlukan');
		$this->db->where('memerlukan.id_bencana', $id);
		$query = $this->db->get();
		return $query;
	}
	
	public function getKeahlianByBencana($id)
	{
		$this->db->select('memerlukan.id_keahlian');
		$this->db->from('memerlukan');
		$this->db->where('memerlukan.id_bencana', $id);
		
		$data = $this->db->get();
		return $data->result();
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

	public function insert($nama_bencana, $keahlian)
	{
		$data = array(
			'nama_bencana' => $nama_bencana
		);
		$this->db->insert('bencana', $data);

		$id_bencana = $this->get_id_by_name($nama_bencana)->id_bencana;
		if(is_array($keahlian))
		{
			foreach($keahlian as $k)
			{
				$data = array(
					'id_bencana' => $id_bencana,
					'id_keahlian' => $k
				);
				$this->db->insert('memerlukan', $data);
			}
		}
		else
		{
			$data = array(
				'id_bencana' => $id_bencana,
				'id_keahlian' => $k
			);
			$this->db->insert('memerlukan', $data);
		}
	}

	public function update($id_bencana, $nama_bencana, $keahlian)
	{
		$data = array('nama_bencana' => $nama_bencana);
		$this->db->where('id_bencana', $id_bencana);
		$this->db->update('bencana', $data); 

		$this->db->where('id_bencana', $id_bencana);
		$this->db->delete('memerlukan');

		if(is_array($keahlian))
		{
			foreach($keahlian as $k)
			{
				$data = array(
					'id_bencana' => $id_bencana,
					'id_keahlian' => $k
				);
				$this->db->insert('memerlukan', $data);
			}
		}
		else
		{
			$data = array(
				'id_bencana' => $id_bencana,
				'id_keahlian' => $k
			);
			$this->db->insert('memerlukan', $data);
		}
	}

	public function delete($id_bencana)
	{
		$this->db->where('id_bencana', $id_bencana);
		$this->db->delete('memerlukan');
		
		$this->db->where('id_bencana', $id_bencana);
		$this->db->delete('rawan_akan');
		
		$this->db->where('id_bencana', $id_bencana);
		$this->db->delete('bencana');		
	}
}