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

	public function get_pemetaan()
	{
		$this->db->select('tenaga_medis.nama_tenaga_medis, kab_kota.nama_kota, biaya.biaya');
		$this->db->from('tenaga_medis, kab_kota, biaya');
		$this->db->where('tenaga_medis.id_tenaga_medis = biaya.id_tenaga_medis and tenaga_medis.id_kota = kab_kota.id_kota and tenaga_medis.id_kota = biaya.id_kota');
		$query = $this->db->get();

		return $query;
	}

	public function get_min()
	{
		$query = $this->db->get('tenaga_medis');
		return $query;
	}

	public function get_id_by_name($nama_tenaga_medis)
	{
		$this->db->select('id_tenaga_medis');
		$this->db->from('tenaga_medis');
		$this->db->where('nama_tenaga_medis', $nama_tenaga_medis);
		return $this->db->get()->row();
	}

	public function insert($nama_tenaga_medis, $keahlian)
	{
		$data = array(
			'nama_tenaga_medis' => $nama_tenaga_medis
		);
		$this->db->insert('tenaga_medis', $data);

		$id_tenaga_medis = $this->get_id_by_name($nama_tenaga_medis)->id_tenaga_medis;
		if(is_array($keahlian))
		{
			foreach($keahlian as $k)
			{
				$data = array(
					'id_tenaga_medis' => $id_tenaga_medis,
					'id_keahlian' => $k
				);
				$this->db->insert('memiliki', $data);
			}
		}
		else
		{
			$data = array(
				'id_tenaga_medis' => $id_tenaga_medis,
				'id_keahlian' => $k
			);
			$this->db->insert('memiliki', $data);
		}
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