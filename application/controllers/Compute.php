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
		$this->DoctorID = null;
		$this->JobID = null;
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
		$iTemp = 1;
		//getDokter();
		$this->nDoctor = $iTemp;
	}
	
	private function getJob()
	{
		$iTemp = 1;
		//getKeahlian();
		$this->nJob = $iTemp;
	}
	
	private function getCondition()
	{
		
	}
	
	private function constructGraph()
	{
		//getKeahlianDokter();
		$this->Capacity['Job']['Doctor'] = 1;
	}
	
	public function main()
	{
		$this->getDoctor();
		$this->getJob();
		$this->getCondition();
		
		$this->constructGraph();
	}
}
