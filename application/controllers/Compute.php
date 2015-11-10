<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compute extends CI_Controller
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
		$this->Doctor = null;
		$this->Job = null;
		$this->City = null;
		$this->Con = null;
		$this->DoctorXJob = null;
		$this->CityXCon = null;
		$this->ConXJob = null;
		$this->DoctorXCity = null;
		
		$this->nDoctor = 0;
		$this->nJob = 0;
		$this->nCity = 0;
		$this->nCon = 0;
	}
	
	private function getDoctor()
	{
		//$iTemp = 0;
		$this->load->model('tenaga_medis_model');
		$this->Doctor = $this->tenaga_medis_model->getAllID();
		/*
		echo "Doctor : ";
		echo "<br/>";
		foreach($this->Doctor as $row)
		{
			echo $row->id;
			echo "<br/>";
			$iTemp++;
		}
		$this->nDoctor = $iTemp;
		*/
	}
	
	private function getJob()
	{
		//$iTemp = 0;
		$this->load->model('keahlian_model');
		$this->Job = $this->keahlian_model->getAllID();
		/*
		echo "Job : ";
		echo "<br/>";
		foreach($this->Job as $row)
		{
			echo $row->id;
			echo "<br/>";
			$iTemp++;
		}
		$this->nJob = $iTemp;
		*/
	}
	
	private function getCity()
	{
		//$iTemp = 0;
		$this->load->model('kab_kota_model');
		$this->City = $this->kab_kota_model->getAllID();
		/*
		echo "City : ";
		echo "<br/>";
		foreach($this->City as $row)
		{
			echo $row->id;
			echo "<br/>";
			$iTemp++;
		}
		$this->nCity = $iTemp;
		*/
	}
	
	private function getCon()
	{
		//$iTemp = 0;
		$this->load->model('bencana_model');
		$this->Con = $this->bencana_model->getAllID();
		/*
		echo "Condition : ";
		echo "<br/>";
		foreach($this->Con as $row)
		{
			echo $row->id;
			echo "<br/>";
			$iTemp++;
		}
		$this->nCon = $iTemp;
		*/
	}
	
	private function getDoctorXJob()
	{
		foreach($this->Doctor as $row)
		{
			foreach($this->Job as $col)
			{
				$this->DoctorXJob[$row->id][$col->id] = 0;
			}
		}
		$this->load->model('tenaga_medis_model');
		$data = $this->tenaga_medis_model->getXJob();
		foreach($data as $row)
		{
			$this->DoctorXJob[$row->id_d][$row->id_k] = 1;
		}
		/*
		echo "Doctor X Job : ";
		echo "<br/>";
		echo "<table>";
		foreach($this->Doctor as $row)
		{
			echo "<tr>";
			foreach($this->Job as $col)
			{
				echo "<td>";
				echo $this->DoctorXJob[$row->id][$col->id];
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		*/
	}
	
	private function getCityXCon()
	{
		foreach($this->City as $row)
		{
			foreach($this->Con as $col)
			{
				$this->CityXCon[$row->id][$col->id] = 0;
			}
		}
		$this->load->model('kab_kota_model');
		$data = $this->kab_kota_model->getXCon();
		foreach($data as $row)
		{
			$this->CityXCon[$row->id_k][$row->id_b] = 1;
		}
		/*
		echo "City X Condition : ";
		echo "<br/>";
		echo "<table>";
		foreach($this->City as $row)
		{
			echo "<tr>";
			foreach($this->Con as $col)
			{
				echo "<td>";
				echo $this->CityXCon[$row->id][$col->id];
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		*/
	}
	
	private function getConXJob()
	{
		foreach($this->Con as $row)
		{
			foreach($this->Job as $col)
			{
				$this->ConXJob[$row->id][$col->id] = 0;
			}
		}
		$this->load->model('bencana_model');
		$data = $this->bencana_model->getXJob();
		foreach($data as $row)
		{
			$this->ConXJob[$row->id_b][$row->id_k] = 1;
		}
		/*
		echo "Condition X Job : ";
		echo "<br/>";
		echo "<table>";
		foreach($this->Con as $row)
		{
			echo "<tr>";
			foreach($this->Job as $col)
			{
				echo "<td>";
				echo $this->ConXJob[$row->id][$col->id];
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		*/
	}
	
	private function getDoctorXCity()
	{
		foreach($this->Doctor as $row)
		{
			foreach($this->City as $col)
			{
				$this->DoctorXCity[$row->id][$col->id] = 0;
			}
		}
		foreach($this->Doctor as $a)
		{
			foreach($this->City as $b)
			{
				$flagop = false;
				foreach($this->Con as $c)
				{
					$flag = false;
					if($this->CityXCon[$b->id][$c->id])
					{
						$flag = true;
						foreach($this->Job as $d)
						{
							if($this->ConXJob[$c->id][$d->id])
							{
								//echo $c->id.' '.$d->id.' '.$this->DoctorXJob[$a->id][$d->id];
								//echo "<br/>";
								if(!$this->DoctorXJob[$a->id][$d->id]) $flag = false;
							}
						}
					}
					if($flag) $flagop = true;
				}
				if($flagop) $this->DoctorXCity[$a->id][$b->id] = 1;
			}
		}
		/*
		echo "Doctor X City : ";
		echo "<br/>";
		echo "<table>";
		foreach($this->Doctor as $row)
		{
			echo "<tr>";
			foreach($this->City as $col)
			{
				echo "<td>";
				echo $this->DoctorXCity[$row->id][$col->id];
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		*/
	}
	
	private function delete()
	{
		$this->load->model('assignment');
		$this->assignment->delete();
	}
	
	private function save()
	{
		$this->load->model('assignment');
		foreach($this->Doctor as $row)
		{
			foreach($this->City as $col)
			{
				$tmp = $this->DoctorXCity[$row->id][$col->id];
				$this->assignment->insert($row->id, $col->id, $tmp);
			}
		}
	}
	
	public function index()
	{
		$this->getDoctor();
		$this->getCity();
		foreach($this->Doctor as $row)
		{
			foreach($this->City as $col)
			{
				$this->DoctorXCity[$row->id][$col->id] = 999;
			}
		}
		
		$this->load->model('assignment');
		$this->load->model('biaya_model');
		$assignment = $this->assignment->get();
		foreach($assignment as $row)
		{
			if($row->value)
			{
				$value = $this->biaya_model->getValue($row->id_t, $row->id_k);
				if($value == NULL) $value = 999;
				else $value = $value->biaya;
				$this->DoctorXCity[$row->id_t][$row->id_k] = $value;
			}
		}
		
		$data['assignment'] = $this->DoctorXCity;
		
		$this->load->model('tenaga_medis_model');
		foreach($this->Doctor as $row)
		{
			$id = $row->id;
			$row->id = $this->tenaga_medis_model->getNama($id)->nama;
		}
		$data['doctor'] = $this->Doctor;
		
		$this->load->model('kab_kota_model');
		foreach($this->City as $row)
		{
			$id = $row->id;
			$row->id = $this->kab_kota_model->getNama($id)->nama;
		}
		$data['city'] = $this->City;
		
		$this->load->view('header');
		$this->load->view('feasible', $data);
		$this->load->view('footer');
	}
	
	public function main()
	{
		$this->getDoctor();
		$this->getJob();
		$this->getCity();
		$this->getCon();
		
		$this->getDoctorXJob();
		$this->getCityXCon();
		$this->getConXJob();
		$this->getDoctorXCity();
		
		$this->delete();
		$this->save();
		
		redirect('compute');
	}
}
