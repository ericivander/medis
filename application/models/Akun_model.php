<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_model extends CI_Model
{
	public function login ($username, $password)
	{
		$this->db->select('privilege');
   		$this->db->from('akun');
   		$this->db->where('username', $username);
   		$this->db->where('password', $password);
 
		$query = $this->db->get();
		 
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		    return $row->privilege;
		}
		else
		{
		    return 'failed';
		}
	}
}