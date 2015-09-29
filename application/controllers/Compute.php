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
		$this->Capacity = null;
		
		$this->nDoctor = 0;
		$this->nJob = 0;
	}

	public function index()
	{
		$this->load->view('master/header');
		$this->load->view('assignment/index');
		$this->load->view('master/footer');
	}
	
	private function getDoctor()
	{
		$iTemp = 0;
		$this->load->model('tenaga_medis_model');
		$this->Doctor = $this->tenaga_medis_model->getAllID();
		echo "Dokter : ";
		echo "<br/>";
		foreach($this->Doctor as $row)
		{
			echo $row->id;
			echo "<br/>";
			$iTemp++;
		}
		$this->nDoctor = $iTemp;
	}
	
	private function getJob()
	{
		$iTemp = 0;
		$this->load->model('keahlian_model');
		$this->Job = $this->keahlian_model->getAllID();
		echo "Keahlian : ";
		echo "<br/>";
		foreach($this->Job as $row)
		{
			echo $row->id;
			echo "<br/>";
			$iTemp++;
		}
		$this->nJob = $iTemp;
	}
	
	private function getCondition()
	{
		//kab_kota -> rawan_akan -> bencana -> memerlukan -> keahlian
	}
	
	private function constructGraph()
	{
		//getKeahlianDokter();
		//$this->Capacity['Job']['Doctor'] = 1;
	}
	
	public function main()
	{
		$this->getDoctor();
		$this->getJob();
		$this->getCondition();
		
		$this->constructGraph();
	}
}
