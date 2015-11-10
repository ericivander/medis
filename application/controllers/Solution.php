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
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('footer');
	}
}
