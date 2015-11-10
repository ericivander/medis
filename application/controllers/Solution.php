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
		
		$idDokters = null;
		$idKotas = null;
		$dataMatrix = null;
		
		$this->load->model('tenaga_medis_model');
		$this->load->model('kab_kota_model');
		$this->load->model('assignment');
		$this->load->model('biaya_model');
		
		foreach($visDoctor as $key1 => $value1)
		{
			foreach($visCity as $key2 => $value2)
			{
				$idDokter = $this->tenaga_medis_model->get_id_by_name($key1)->id_tenaga_medis;
				$idDokters[$key1] = $idDokter;
				$idKota = $this->kab_kota_model->get_id_by_name($key2)->id_kota;
				$idKotas[$key2] = $idKota;
				$feasible = $this->assignment->getAssignment($idDokter, $idKota)->value;
				if($feasible)
				{
					$tmp = $this->biaya_model->getValue($idDokter, $idKota);
					if($tmp == null) $tmp = -1;
					else $tmp = $tmp->biaya;
					$dataMatrix[$idDokter][$idKota] = $tmp;
				}
				else
				{
					$dataMatrix[$idDokter][$idKota] = -1;
				}
			}
		}
		
		//print_r($visDoctor);
		//print_r($visCity);
		/*
		echo "Data Matrix";
		echo "<br/>";
		echo "<table>";
		foreach($idDokters as $idDokter)
		{
			echo "<tr>";
			foreach($idKotas as $idKota)
			{
				echo "<td>";
				echo $dataMatrix[$idDokter][$idKota];
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		*/
		
		$mins = null;
		$doctorCity = null;
		foreach($idDokters as $idDokter)
		{
			$mins[$idDokter] = 999999999;
			$doctorCity[$idDokter] = [];
			foreach($idKotas as $idKota)
			{
				$tmp = $dataMatrix[$idDokter][$idKota];
				if($tmp != (-1) && $mins[$idDokter] > $tmp)
				{
					$mins[$idDokter] = $tmp;
					$doctorCity[$idDokter] = [];
				}
				if($mins[$idDokter] == $tmp)
				{
					array_push($doctorCity[$idDokter], $idKota);
				}
			}
		}
		
		foreach($idDokters as $idDokter1)
		{
			foreach($idDokters as $idDokter2)
			{
				if($idDokter1 == $idDokter2) continue;
				foreach($doctorCity[$idDokter1] as $idx1 => $iter1)
				{
					foreach($doctorCity[$idDokter2] as $idx2 => $iter2)
					{
						if($iter1 == $iter2)
						{
							if(intval($dataMatrix[$idDokter1][$iter1]) < intval($dataMatrix[$idDokter2][$iter2]))
							{
								unset($doctorCity[$idDokter2][$idx2]);
							}
							else
							{
								unset($doctorCity[$idDokter1][$idx1]);
							}
						}
					}
				}
			}
		}
		/*
		print_r($mins);
		echo "<br/>";
		print_r($doctorCity);
		echo "<br/>";
		*/
		
		$data['idDokters'] = $idDokters;
		$data['idKotas'] = $idKotas;
		$data['dataMatrix'] = $dataMatrix;
		$data['doctorCity'] = $doctorCity;
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
