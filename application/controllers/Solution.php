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
		$this->INF = 10001;
		$this->idDokters = null;
		$this->idKotas = null;
		$this->dataMatrix = null;
		$this->next = null;
		$this->cityAssigned = null;
		$this->current = null;
		$this->firstID = -1;
		$this->globalMin = $this->INF * $this->INF;
	}
	
	public function solve($idx, $dist)
	{
		if($idx == -1)
		{
			if($dist < $this->globalMin)
			{
				$this->globalMin = $dist;
				for($i = $this->firstID; $i != (-1); $i = $this->next[$i])
				{
					$this->cityAssigned[$i] = $this->current[$i];
				}
			}
			return;
		}
		foreach($this->idKotas as $i)
		{
			$flag = true;
			for($j = $this->firstID; $j != $idx; $j = $this->next[$j])
			{
				if($this->current[$j] == $i) $flag = false;
			}
			if($flag)
			{
				$tmp = 0;
				if($this->dataMatrix[$idx][$i] == -1)
				{
					$tmp = $this->INF;
					$this->current[$idx] = -1;
				}
				else
				{
					$tmp = $this->dataMatrix[$idx][$i];
					$this->current[$idx] = $i;
				}
				$this->solve($this->next[$idx], $dist + $tmp);
			}
		}
		return;
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
		
		$this->globalMin = $this->INF * $this->INF;
		$this->solve($this->firstID, 0);
		
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
