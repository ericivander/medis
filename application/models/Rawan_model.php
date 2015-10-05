<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rawan_model extends CI_Model
{
	public function getByIdKota($id)
	{
		$this->db->select('rawan_akan.id_bencana');
		$this->db->from('rawan_akan');
		$this->db->where('rawan_akan.id_kota', $id);
		$query = $this->db->get();
		return $query;
	}
}