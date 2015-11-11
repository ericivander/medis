<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solution extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		/*
		if (!$this->session->userdata('logged_in'))
		{
	 		redirect ('login');
		}
		*/
		$this->INF = 999999999;
		$this->idDokters = null;
		$this->idKotas = null;
		$this->dataMatrix = null;
		$this->next = null;
		$this->cityAssigned = null;
		$this->last = null;
		$this->current = null;
		$this->firstID = -1;
	}
	
	public function hungarian()
	{
		
	}
	
	public function solve($idx)
	{
		if($idx == -1) return 0;
		$mins = $this->INF;
		$ans = 0;
		foreach($this->idKotas as $i)
		{
			$flag = true;
			for($j = $this->firstID; $j != $idx; $j = $this->next[$j])
			{
				if($this->last[$j] == $i) $flag = false;
			}
			if($flag)
			{
				if($this->dataMatrix[$idx][$i] != -1)
				{
					$this->last[$idx] = $i;
					$ans = $this->dataMatrix[$idx][$i];
				}
				else
				{
					$this->last[$idx] = -1;
				}
				$ans += $this->solve($this->next[$idx]);
				if($ans < $mins)
				{
					$mins = $ans;
					if($this->dataMatrix[$idx][$i] != -1) $this->current[$idx] = $i;
					if($idx == $this->firstID)
					{
						foreach($this->idDokters as $j)
						{
							$this->cityAssigned[$j] = $this->current[$j];
						}
					}
				}
			}
		}
		return $mins;
	}
	
	public function main()
	{
		$visDoctor = json_decode($this->input->post('visDoctor'));
		$visCity = json_decode($this->input->post('visCity'));
		
		foreach($visDoctor as $key => $value)
		{
			if($value != 1) unset($visDoctor->$key);
		}
		
		foreach($visCity as $key => $value)
		{
			if($value != 1) unset($visCity->$key);
		}
		
		$this->idDokters = null;
		$this->idKotas = null;
		$this->dataMatrix = null;
		$this->next = null;
		$this->cityAssigned = null;
		$this->last = null;
		$this->current = null;
		
		$this->load->model('tenaga_medis_model');
		$this->load->model('kab_kota_model');
		$this->load->model('assignment');
		$this->load->model('biaya_model');
		
		$this->firstID = -1;
		$before = -1;
		foreach($visDoctor as $key1 => $value1)
		{
			$idDokter = $this->tenaga_medis_model->get_id_by_name($key1)->id_tenaga_medis;
			$this->idDokters[$key1] = $idDokter;
			if($this->firstID == (-1)) $this->firstID = $idDokter;
			else $this->next[$before] = $idDokter;
			$this->cityAssigned[$idDokter] = -1;
			$this->last[$idDokter] = -1;
			$this->current[$idDokter] = -1;
			foreach($visCity as $key2 => $value2)
			{
				$idKota = $this->kab_kota_model->get_id_by_name($key2)->id_kota;
				$this->idKotas[$key2] = $idKota;
				$feasible = $this->assignment->getAssignment($idDokter, $idKota)->value;
				if($feasible)
				{
					$tmp = $this->biaya_model->getValue($idDokter, $idKota);
					if($tmp == null) $tmp = -1;
					else $tmp = $tmp->biaya;
					$this->dataMatrix[$idDokter][$idKota] = $tmp;
				}
				else
				{
					$this->dataMatrix[$idDokter][$idKota] = -1;
				}
			}
			$before = $idDokter;
		}
		$this->next[$before] = -1;
		
		$this->solve($this->firstID);
		
		$data['idDokters'] = $this->idDokters;
		$data['idKotas'] = $this->idKotas;
		$data['dataMatrix'] = $this->dataMatrix;
		$data['cityAssigned'] = $this->cityAssigned;
		$data['vDoctor'] = $visDoctor;
		$data['vCity'] = $visCity;
		
		$this->load->view('header');
		$this->load->view('result', $data);
		$this->load->view('footer');
	}
	
	public function index()
	{
		$this->load->model('tenaga_medis_model');
		$data['doctor'] = $this->tenaga_medis_model->getIDandName();
		
		$this->load->model('kab_kota_model');
		$data['city'] = $this->kab_kota_model->getIDandName();
		
		$this->load->view('header');
		$this->load->view('penugasan', $data);
		$this->load->view('footer');
	}
}
